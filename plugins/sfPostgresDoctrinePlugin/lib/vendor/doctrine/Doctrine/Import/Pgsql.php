<?php
/*
 *  $Id: Pgsql.php 7490 2010-03-29 19:53:27Z jwage $
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
 * @package     sfPostgresDoctrinePlugin
 * @subpackage  Import
 * @license     http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @author      Konsta Vesterinen <kvesteri@cc.hut.fi>
 * @author      Paul Cooper <pgc@ucecom.com>
 * @author      Lukas Smith <smith@pooteeweet.org> (PEAR MDB2 library)
 * @version     $Revision: 7490 $
 * @link        www.doctrine-project.org
 * @since       1.0
 */
class Doctrine_Import_Pgsql extends Doctrine_Import
{

    protected $sql = array(
                        'listDatabases' => 'SELECT datname FROM pg_database',
                        'listFunctions' => "SELECT
                                                d.nspname || '.' || proname
                                            FROM
                                                pg_proc pr,
                                                pg_type tp,
                                                pg_namespace d
                                            WHERE
                                                tp.oid = pr.prorettype
                                                AND d.oid = pr.pronamespace
                                                AND pr.proisagg = FALSE
                                                AND tp.typname <> 'trigger'
                                                AND pr.pronamespace IN
                                                    (SELECT oid FROM pg_namespace s
                                                 WHERE s.nspname NOT LIKE 'pg_%' AND s.nspname != 'information_schema')",
                        'listSequences' => "SELECT
                                                d.nspname || '.' || regexp_replace(relname, '_seq$', '')
                                            FROM
                                                pg_class, pg_namespace d
                                            WHERE relkind = 'S' AND d.oid = relnamespace AND relnamespace IN
                                                (SELECT oid FROM pg_namespace s
                                                 WHERE s.nspname NOT LIKE 'pg_%' AND s.nspname != 'information_schema')",
                        'listTables'    => "SELECT
                                                d.nspname || '.' || c.relname AS table_name
                                            FROM pg_class c, pg_user u, pg_namespace d
                                            WHERE c.relowner = u.usesysid
                                                AND c.relkind = 'r'
                                                AND c.relname !~ '^(pg_|sql_)'
                                                AND has_schema_privilege(d.nspname, 'USAGE') AND d.nspname !~ '^pg_' AND d.nspname != 'information_schema'
												AND d.oid = c.relnamespace
                                            UNION
                                            SELECT c.relname AS table_name
                                            FROM pg_class c, pg_namespace d
                                            WHERE c.relkind = 'r'
                                                AND NOT EXISTS (SELECT 1 FROM pg_user WHERE usesysid = c.relowner)
                                                AND c.relname !~ '^pg_'
                                                AND has_schema_privilege(d.nspname, 'USAGE') AND d.nspname !~ '^pg_' AND d.nspname != 'information_schema'
												AND d.oid = c.relnamespace",
    					'listViewsAsTables'    => "SELECT
                                                d.nspname || '.' || c.relname AS table_name
                                            FROM pg_class c, pg_user u, pg_namespace d
                                            WHERE c.relowner = u.usesysid
                                                AND c.relkind = 'v'
                                                AND c.relname !~ '^(pg_|sql_)'
                                                AND has_schema_privilege(d.nspname, 'USAGE') AND d.nspname !~ '^pg_' AND d.nspname != 'information_schema'
												AND d.oid = c.relnamespace
                                            UNION
                                            SELECT c.relname AS table_name
                                            FROM pg_class c, pg_namespace d
                                            WHERE c.relkind = 'v'
                                                AND NOT EXISTS (SELECT 1 FROM pg_user WHERE usesysid = c.relowner)
                                                AND c.relname !~ '^pg_'
                                                AND has_schema_privilege(d.nspname, 'USAGE') AND d.nspname !~ '^pg_' AND d.nspname != 'information_schema'
												AND d.oid = c.relnamespace",
    					'listInherits'    => "SELECT cn.nspname || '.' || cc.relname AS child_table_name,
											         pn.nspname || '.' || pc.relname AS parent_table_name
											FROM pg_inherits i
											LEFT JOIN pg_catalog.pg_class cc ON cc.oid = i.inhrelid
											LEFT JOIN pg_catalog.pg_class pc ON pc.oid = i.inhparent
											LEFT JOIN pg_catalog.pg_namespace cn ON cn.oid = cc.relnamespace
											LEFT JOIN pg_catalog.pg_namespace pn ON pn.oid = pc.relnamespace
											WHERE '%s' = cn.nspname || '.' || cc.relname",
                        'listViews'     => "SELECT schemaname || '.' || viewname FROM pg_views as viewname",
                        'listUsers'     => 'SELECT usename FROM pg_user',
                        'listTableConstraints' => "SELECT
                                                        relname
                                                   FROM
                                                        pg_class
                                                   WHERE oid IN (
                                                        SELECT indexrelid
                                                        FROM pg_index, pg_class, pg_namespace d
                                                        WHERE pg_class.relname = %s AND d.nspname = %s AND d.oid = pg_class.relnamespace
                                                            AND pg_class.oid = pg_index.indrelid
                                                            AND (indisunique = 't' OR indisprimary = 't')
                                                        )",
                        'listTableIndexes'     => "SELECT
                                                        relname
                                                   FROM
                                                        pg_class
                                                   WHERE oid IN (
                                                        SELECT indexrelid
                                                        FROM pg_index, pg_class, pg_namespace d
                                                        WHERE pg_class.relname = %s AND d.nspname = %s AND d.oid = c.relnamespace
                                                            AND pg_class.oid=pg_index.indrelid
                                                            AND indisunique != 't'
                                                            AND indisprimary != 't'
                                                        )",
    					'isView'     => "SELECT schemaname || '.' || viewname as view FROM pg_catalog.pg_views WHERE schemaname = '%s' AND viewname = '%s'",
                        'listTableColumns'     => "SELECT
                                                        a.attnum,
                                                        a.attname AS field,
                                                        t.typname AS type,
                                                        format_type(a.atttypid, a.atttypmod) AS complete_type,
                                                        a.attnotnull AS isnotnull,
                                                        (SELECT 't'
                                                          FROM pg_index
                                                          WHERE (c.oid = pg_index.indrelid
                                                          AND a.attnum = ANY (pg_index.indkey)
                                                          AND pg_index.indisprimary = 't')
                                                        ) AS pri,
                                                        (SELECT pg_attrdef.adsrc
                                                          FROM pg_attrdef
                                                          WHERE c.oid = pg_attrdef.adrelid
                                                          AND pg_attrdef.adnum=a.attnum
                                                        ) AS default,
                                                        (SELECT CASE WHEN t.typtype = 'e' THEN
                                                          t.oid
                                                          ELSE
                                                          0
                                                          END
                                                        ) AS enumid
                                                  FROM pg_attribute a, pg_class c, pg_type t, pg_namespace d
                                                  WHERE c.relname = '%s' AND d.nspname = '%s' AND d.oid = c.relnamespace
                                                        AND a.attnum > 0
                                                        AND a.attrelid = c.oid
                                                        AND a.atttypid = t.oid
                                                  ORDER BY a.attnum",
                        'listTableRelations'   => "SELECT pg_catalog.pg_get_constraintdef(oid, true) as condef
                                                          FROM pg_catalog.pg_constraint r
                                                          WHERE r.conrelid =
                                                          (
                                                              SELECT c.oid
                                                              FROM pg_catalog.pg_class c
                                                              LEFT JOIN pg_catalog.pg_namespace n ON n.oid = c.relnamespace
                                                              WHERE c.relname ~ ? AND n.nspname = ?
                                                          )
                                                          AND r.contype = 'f'",
						'listEnum'   => "SELECT e.enumlabel as label FROM pg_catalog.pg_enum e WHERE e.enumtypid = %s"
                        );

    /**
     * lists all database triggers
     *
     * @param string|null $database
     * @return array
     */
    public function listTriggers($database = null)
    {

    }

    /**
     * lists table constraints
     *
     * @param string $table     database table name
     * @return array
     */
    public function listTableConstraints($table)
    {
        $table = $this->conn->quote($table);
        $e = explode('.', trim($table, "'"));
        $query = sprintf($this->sql['listTableConstraints'], $e[1], $e[0]);

        return $this->conn->fetchColumn($query);
    }

    /**
     * lists table constraints
     *
     * @param string $table     database table name
     * @return array
     */
    public function listTableColumns($table)
    {
        $table = $this->conn->quote($table);
        $e = explode('.', trim($table, "'"));
        $query = sprintf($this->sql['listTableColumns'], $e[1], $e[0]);

        $result = $this->conn->fetchAssoc($query);

        $icolumns = $this->listInheritsColumns($table);
        $columns     = array();
        $primary = false;
        foreach ($result as $key => $val) {

        	if (in_array($val['field'], array_keys($icolumns))) {
        		if ($val['pri'] == 't' || $icolumns[$val['field']]) {
        			$primary = true;
        		}
        	 	continue;
        	}
            $val = array_change_key_case($val, CASE_LOWER);

            if (strtolower($val['type']) === 'character varying') {
                // get length from varchar definition
                $length = preg_replace('~.*\(([0-9]*)\).*~', '$1', $val['complete_type']);
                $val['length'] = $length;
            }

            $decl = $this->conn->dataDict->getPortableDeclaration($val);

            $description = array(
                'name'      => $val['field'],
                'ntype'     => $val['type'],
                'type'      => $decl['type'][0],
                'alltypes'  => $decl['type'],
                'length'    => $decl['length'],
                'fixed'     => (bool) $decl['fixed'],
                'unsigned'  => (bool) $decl['unsigned'],
                'notnull'   => ($val['isnotnull'] == true),
                'default'   => $val['default'],
                'primary'   => ($val['pri'] == 't'),
            );

            if ($val['enumid'] > 0) {
            	$query = sprintf($this->sql['listEnum'], $val['enumid']);
            	$labels = $this->conn->fetchAssoc($query);
            	$description['values'] = array();
            	foreach ($labels as $v)	{
            		$description['values'][] = $v['label'];
            	}
            	$description['type'] = "enum";
            }

            if (!$primary && ($val['pri'] == 't')) {
            	$primary = true;
            }

            $matches = array();

            if (preg_match("/^nextval\('(.*)'(::.*)?\)$/", $description['default'], $matches)) {
                //$description['sequence'] = $this->conn->formatter->fixSequenceName($matches[1]);
                if (strpos($matches[1], '.') !== false) {
                	$description['sequence'] = preg_replace("/_seq$/i", "",$matches[1]);
                }
                else {
                	$description['sequence'] = $e[0] . '.' . preg_replace("/_seq$/i", "",$matches[1]);
                }
                $description['default'] = null;
            } else if (preg_match("/^'(.*)'::character varying$/", $description['default'], $matches)) {
                $description['default'] = $matches[1];
            } else if ($description['type'] == 'boolean') {
                if ($description['default'] === 'true') {
                   $description['default'] = true;
                } else if ($description['default'] === 'false') {
                   $description['default'] = false;
                }
            }

            $columns[$val['field']] = $description;
        }

    	$query = sprintf($this->sql['isView'], $e[0], $e[1]);
        $result = $this->conn->fetchAssoc($query);

        if (count($result) && ($result[0]['view'] == $e[0].'.'.$e[1])) {

        	$keys = array_keys($columns);
        	$columns[$keys[0]]['primary'] = true;
        	$primary = true;
        }


        if (!$primary) {
        	$relations = $this->listTableRelations(trim($table, "'"));
        	foreach ($relations as $relation) {
        		if (isset($columns[$relation['local']])) {
        			$columns[$relation['local']]['primary'] = true;
        		}
            }
        }


        return $columns;
    }

    /**
     * list all indexes in a table
     *
     * @param string $table     database table name
     * @return array
     */
    public function listTableIndexes($table)
    {
        $table = $this->conn->quote($table);
        $e = explode('.', trim($table, "'"));
        $query = sprintf($this->sql['listTableIndexes'], $e[1], $e[0]);

        return $this->conn->fetchColumn($query);
    }

	/**
     * list all inherits
     *
     * @return array
     */
    public function listInherits($table)
    {
    	$query = sprintf($this->sql['listInherits'], trim($table, "'"));

		return $this->conn->fetchAssoc($query);
    }

	/**
     * list all inherits columns
     *
     * @return array
     */
    public function listInheritsColumns($table)
    {
    	$columns = array();
    	$query = sprintf($this->sql['listInherits'], trim($table, "'"));

    	$result = $this->conn->fetchAssoc($query);

    	foreach($result as $res) {
    		$e = explode('.', trim($res['parent_table_name'], "'"));
        	$query = sprintf($this->sql['listTableColumns'], $e[1], $e[0]);

        	$cresult = $this->conn->fetchAssoc($query);



        	foreach ($cresult as $cres) {

        		$columns[$cres['field']] = ($cres['pri'] == 't');
        	}

    		$columnsd = $this->listInheritsColumns($res['parent_table_name']);

    		foreach ($columnsd as $key => $col) {
    			if (key_exists($key, $columns)) {
    				if (!$columns[$key] && $col) {
    					$columns[$key] = $col;
    				}
    			}
    			else
    			{
    				$columns[$key] = $col;
    			}
    		}
    	}

		return $columns;
    }

    /**
     * lists tables
     *
     * @param string|null $database
     * @return array
     */
    public function listTables($database = null)
    {
        return $this->conn->fetchColumn($this->sql['listTables']);
    }

    /**
     * lists views as tables
     *
     * @param string|null $database
     * @return array
     */
    public function listViewsAsTables($database = null)
    {
        return $this->conn->fetchColumn($this->sql['listViewsAsTables']);
    }
    /**
     * lists table triggers
     *
     * @param string $table     database table name
     * @return array
     */
    public function listTableTriggers($table)
    {
        $query = 'SELECT trg.tgname AS trigger_name
                    FROM pg_trigger trg,
                         pg_class tbl
                   WHERE trg.tgrelid = tbl.oid';
        if ($table !== null) {
            $table = $this->conn->quote(strtoupper($table), 'string');
            $query .= " AND tbl.relname = $table";
        }
        return $this->conn->fetchColumn($query);
    }

    /**
     * list the views in the database that reference a given table
     *
     * @param string $table     database table name
     * @return array
     */
    public function listTableViews($table)
    {
        return $this->conn->fetchColumn($table);
    }

    public function listTableRelations($table)
    {
        $sql = $this->sql['listTableRelations'];
        $split = explode('.', $table);
        $param = array('^(' . $split[1] . ')$', $split[0]);

        $relations = array();

        $results = $this->conn->fetchAssoc($sql, $param);

        foreach ($results as $result) {
            preg_match('/FOREIGN KEY \((.+)\) REFERENCES (.+)\((.+)\)/', $result['condef'], $values);
            if ((strpos($values[1], ',') === false) && (strpos($values[3], ',') === false)) {
                $tableName = trim($values[2], '"');
            	if (strpos($tableName, '.') === false) {
                	$tableName = 'public.' . $tableName;
                }
                $relations[] = array('table'   => $tableName,
                                     'local'   => $values[1],
                                     'foreign' => $values[3]);
            }
        }

        return $relations;
    }
}