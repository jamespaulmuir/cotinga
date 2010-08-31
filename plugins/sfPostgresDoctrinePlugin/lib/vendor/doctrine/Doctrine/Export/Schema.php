<?php
/*
 * $Id: Schema.php 1838 2007-06-26 00:58:21Z nicobn $
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the LGPL. For more information, see
 * <http://www.doctrine-project.org>.
 */

/**
 * Doctrine_Export_Schema
 *
 * Used for exporting a schema to a yaml file
 *
 * @package     sfPostgresDoctrinePlugin
 * @subpackage  Export
 * @link        www.doctrine-project.org
 * @license     http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @version     $Revision: 1838 $
 * @author      Nicolas Bérard-Nault <nicobn@gmail.com>
 * @author      Jonathan H. Wage <jwage@mac.com>
 */
class Doctrine_Export_Schema {
    /**
     * buildSchema
     *
     * Build schema array that can be dumped to file
     *
     * @param string $directory  The directory of models to build the schema from
     * @param array $models      The array of model names to build the schema for
     * @param integer $modelLoading The model loading strategy to use to load the models from the passed directory
     * @return void
     */
    public function buildSchema($directory = null, $models = array(), $modelLoading = null) {
        if ($directory !== null) {
            $loadedModels = Doctrine_Core::filterInvalidModels(Doctrine_Core::loadModels($directory, $modelLoading));
        } else {
            $loadedModels = Doctrine_Core::getLoadedModels();
        }

        $array = array();

        $parent = new ReflectionClass('Doctrine_Record');

        $sql = array();
        $fks = array();

        $behaviors = array();

        foreach (sfProjectConfiguration::getActive()->getPluginPaths() as $path) {
            if (strpos($path, 'sfPostgresDoctrinePlugin') !== false) {
                $behaviors = sfYaml::load(sfConfig::get('sf_config_dir').DIRECTORY_SEPARATOR.'plugins/sfPostgresDoctrinePlugin'.DIRECTORY_SEPARATOR.'behaviors.yml');
                break;
            }
        }



        // we iterate through the diff of previously declared classes
        // and currently declared classes
        foreach ($loadedModels as $className) {

            if (!empty($models) && !in_array($className, $models)) {
                continue;
            }

            $recordTable = Doctrine_Core::getTable($className);

            $data = $recordTable->getExportableFormat();

            $table = array();
            $table['connection'] = $recordTable->getConnection()->getName();
            $remove = array('ptype', 'ntype', 'alltypes');
            // Fix explicit length in schema, concat it to type in this format: type(length)

            $columns = array_keys($data['columns']);
            $tb = array();
            foreach ((array) $behaviors as $name => $behavior) {
                $i = false;
                if (isset($behavior['tableName'])) {
                    if (is_array($behavior['tableName'])) {
                        if (in_array($data['tableName'], $behavior['tableName'])) {
                            $i = true;
                        } else {
                            foreach ($behavior['tableName'] as $tName) {
                                if (preg_match("/^".str_replace(array(".", "*"), array("\\.", ".+?"), $tName)."$/i", $data['tableName'], $m)) {
                                    $i = true;
                                    break;
                                }
                            }
                        }
                    } else if ($behavior['tableName'] == 'all' || $behavior['tableName'] == $data['tableName'] || preg_match("/^".str_replace(array(".", "*"), array("\\.", ".+?"), $behavior['tableName'])."$/i", $data['tableName'], $m)) {
                        $i = true;
                    }

                    if ($i && isset($behavior['exclusions'])) {
                        if (is_array($behavior['exclusions'])) {
                            foreach ($behavior['exclusions'] as $tName) {
                                if (preg_match("/^".str_replace(array(".", "*"), array("\\.", ".*?"), $tName)."$/i", $data['tableName'], $m)) {
                                    $i = false;
                                    break;
                                }
                            }
                        } else if (preg_match("/^".str_replace(array(".", "*"), array("\\.", ".*?"), $behavior['exclusions'])."$/i", $data['tableName'], $m)) {
                            $i = false;
                        }
                    }

                    $cantHave = array();
                    $mustHave = array();

                    if ($i) {
                        if (isset($behavior['condition']) && count($behavior['condition']) > 0 && isset($behavior['condition']['columns'])) {
                            if (is_array($behavior['condition']['columns'])) {
                                if (count($behavior['condition']['columns']) > 0) {

                                    foreach ($behavior['condition']['columns'] as $column) {
                                        if (preg_match('/^!/i', $column, $m)) {

                                            $cantHave[] = str_replace("!", "", $column);
                                        } else {
                                            $mustHave[] = $column;
                                        }
                                    }

                                    $isOK = true;

                                    if (count($mustHave > 0)) {
                                    	if (count(array_intersect($columns, $mustHave)) != count($mustHave)) {
                                        	$isOK = false;
                                    	}
                                    }

                                    if ($isOK && count($cantHave > 0)) {
                                    	if (count(array_intersect($columns, $cantHave)) > 0) {
                                        	$isOK = false;
                                    	}
                                    }

                                    if ($isOK) {
                                        if (array_key_exists('params', $behavior)) {
                                            if (is_array($behavior['params']) && count($behavior['params']) > 0) {
                                            	$tb[$name] = isset($behavior['params']['all']) ? $behavior['params']['all'] : array();

                                            	foreach ($behavior['params'] as $tName => $p)	{

                                            		if ($tName != 'all'
                                            				&& ($data['tableName'] == $tName
                                            					|| preg_match("/^".str_replace(array(".", "*"), array("\\.", ".*?"), $tName)."$/i", $data['tableName'], $m))) {

                                            			$tb[$name] = $this->arrayMerge($tb[$name], $p);
                                            		}
                                            	}
                                            } else {
                                                $tb[$name] = array();
                                            }

                                            foreach ($mustHave as $col) {
                                                unset($data['columns'][$col]);
                                            }
                                        }
                                    }
                                }
                            } else if ($behavior['condition']['columns'] != '') {
                            	if (preg_match('/^\!/i', $behavior['condition']['columns'], $m)) {
                                    $cantHave[] = str_replace("!", "", $behavior['condition']['columns']);
                                } else {
                                    $mustHave[] = $behavior['condition']['columns'];
                                }

                                $isOK = true;

                                if (count($mustHave > 0)) {
                                	if (count(array_intersect($columns, $mustHave)) != count($mustHave)) {
                                      	$isOK = false;
                                   	}
                                }

                                if ($isOK && count($cantHave > 0)) {
                                 	if (count(array_intersect($columns, $cantHave)) > 0) {
                                       	$isOK = false;
                                   	}
                                }

                                if ($isOK) {
                                	if (is_array($behavior['params']) && count($behavior['params']) > 0) {
                                        $tb[$name] = isset($behavior['params']['all']) ? $behavior['params']['all'] : array();

                                        foreach ($behavior['params'] as $tName => $p)	{
                                          	if ($tName != 'all'
                                           			&& ($data['tableName'] == $tName
                                           				|| preg_match("/^".str_replace(array(".", "*"), array("\\.", ".*?"), $tName)."$/i", $data['tableName'], $m))) {
                                           		$tb[$name] = $this->arrayMerge($tb[$name], $p);
                                           	}
                                        }
                                    } else {
                                        $tb[$name] = array();
                                    }

                                    foreach ($mustHave as $col) {
                                        unset($data['columns'][$col]);
                                    }
                                }

                            } else {
                                $i = false;
                            }
                        } else {
                            if (array_key_exists('params', $behavior)) {

                                if (is_array($behavior['params']) && count($behavior['params']) > 0) {
                                	$tb[$name] = isset($behavior['params']['all']) ? $behavior['params']['all'] : array();

                                    foreach ($behavior['params'] as $tName => $p)	{
                                        //if ($name == 'Callback') echo $tName.'--'.$data['tableName'].'--'.preg_match("/^".str_replace(array(".", "*"), array("\\.", ".*?"), $tName)."$/i", $data['tableName'], $m)."\n";
                                       	if ($tName != 'all'
                                       			&& ($data['tableName'] == $tName
                                       				|| preg_match("/^".str_replace(array(".", "*"), array("\\.", ".*?"), $tName)."$/i", $data['tableName'], $m))) {
                                       		$tb[$name] = $this->arrayMerge($tb[$name], $p);

                                       	}
                                    }

                                    //$tb[$name] = array_merge(isset($behavior['params']['all']) ? $behavior['params']['all'] : array(), isset($behavior['params'][$data['tableName']]) ? $behavior['params'][$data['tableName']] : array());
                                } else {
                                    $tb[$name] = array();
                                }
                            } else {
                                $tb[$name] = array();
                            }
                        }
                    }
                }
            }
            if (count($tb) > 0) {
                $table['actAs'] = $tb;
            }

            foreach ($data['columns'] AS $name => $column) {
                if (isset($column['length']) && $column['length'] && isset($column['scale']) && $column['scale']) {
                    $data['columns'][$name]['type'] = $column['type'].'('.$column['length'].', '.$column['scale'].')';
                    unset($data['columns'][$name]['length'], $data['columns'][$name]['scale']);
                } else {
                    $data['columns'][$name]['type'] = $column['type'].'('.$column['length'].')';
                    unset($data['columns'][$name]['length']);
                }
                // Strip out schema information which is not necessary to be dumped to the yaml schema file
                foreach ($remove as $value) {
                    if (isset($data['columns'][$name][$value])) {
                        unset($data['columns'][$name][$value]);
                    }
                }

                // If type is the only property of the column then lets abbreviate the syntax
                // columns: { name: string(255) }
                if (count($data['columns'][$name]) === 1 && isset($data['columns'][$name]['type'])) {
                    $type = $data['columns'][$name]['type'];
                    unset($data['columns'][$name]);
                    $data['columns'][$name] = $type;
                }
            }
            $table['tableName'] = $data['tableName'];
            if (count($data['columns']) > 0) {
                $table['columns'] = $data['columns'];
            }

            $e = explode('.', $table['tableName']);
            if (2 == count($e)) {
                $table['package'] = ucfirst($e[0]).'.'.'Entities';
            }

            if (get_parent_class($className) != $className && strpos($className, 'Base') === false) {
                if (strpos(get_parent_class($className), 'Base') === false) {
                    if (get_parent_class($className) != "Doctrine_Record") {
                        $table['inheritance'] = array('extends' => get_parent_class($className));
                        foreach ($table['columns'] as $key => $val) {
                            if (true == $val['primary']) {
                                unset($table['columns'][$key]);
                            }
                        }
                    }
                } else {
                    if (get_parent_class(get_parent_class($className)) != get_parent_class($className) && get_parent_class(get_parent_class($className)) != "Doctrine_Record") {
                        $table['inheritance'] = array('extends' => get_parent_class(get_parent_class($className)));
                        foreach ($table['columns'] as $key => $val) {
                            if (1 == $val['primary']) {
                                unset($table['columns'][$key]);
                            }
                        }
                    }
                }
            }

            $relations = $recordTable->getRelations();

            // unset inherited relation
            $keys = array_keys($relations);
            if (get_parent_class($className) != 'Doctrine_Record' && get_parent_class($className) != $className) {
                if (strpos(get_parent_class($className), 'Base') === false) {

                    $keys = array_diff(array_keys($relations), array_keys(Doctrine_Core::getTable(get_parent_class($className))->getRelations()));

                } else if (get_parent_class(get_parent_class($className)) != 'Doctrine_Record' && get_parent_class(get_parent_class($className)) != get_parent_class($className) && strpos(get_parent_class(get_parent_class($className)), 'Base') === false) {
                    $keys = array_diff(array_keys($relations), array_keys(Doctrine_Core::getTable(get_parent_class(get_parent_class($className)))->getRelations()));

                }
            }

            foreach ($relations as $key => $relation) {
                if (in_array($key, $keys)) {
                    $relationData = $relation->toArray();

                    $relationKey = $relationData['alias'];

                    if (isset($relationData['refTable']) && $relationData['refTable']) {
                        $table['relations'][$relationKey]['refClass'] = $relationData['refTable']->getComponentName();
                    }

                    if (isset($relationData['class']) && $relationData['class'] && $relation['class'] != $relationKey) {
                        $table['relations'][$relationKey]['class'] = $relationData['class'];
                    }

                    $table['relations'][$relationKey]['local'] = $relationData['local'];
                    $table['relations'][$relationKey]['foreign'] = $relationData['foreign'];

                    if ($relationData['type'] === Doctrine_Relation::ONE) {
                        $table['relations'][$relationKey]['type'] = 'one';
                    } else if ($relationData['type'] === Doctrine_Relation::MANY) {
                        $table['relations'][$relationKey]['type'] = 'many';
                    } else {
                        $table['relations'][$relationKey]['type'] = 'one';
                    }
                }
            }

            $array[$className] = $table;
        }

        return $array;
    }

    /**
     * exportSchema
     *
     * @param  string $schema
     * @param  string $directory
     * @param string $string of data in the specified format
     * @param integer $modelLoading The model loading strategy to use to load the models from the passed directory
     * @return void
     */
    public function exportSchema($schema, $format = 'yml', $directory = null, $models = array(), $modelLoading = null) {
        $array = $this->buildSchema($directory, $models, null);

        if (is_dir($schema)) {
            $schema = $schema.DIRECTORY_SEPARATOR.'schema.'.$format;
        }

        return Doctrine_Parser::dump($array, $format, $schema);
    }

    public function arrayMerge($array1, $array2) {
        foreach($array2 as $key => $value) {
 			if (is_array($value) && isset($array1[$key])) {
     					$array1[$key] = $this->arrayMerge($array1[$key], $array2[$key]);

 			} else {
 				$array1[$key] = $array2[$key];
 			}
 		}

 		return $array1;
    }
}
