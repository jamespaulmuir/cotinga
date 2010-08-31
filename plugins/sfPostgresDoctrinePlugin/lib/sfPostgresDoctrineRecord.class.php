<?php

/**
 * Base doctrin record.
 *
 * @package    symfony
 * @subpackage model
 * @author     Your name here
 */

class sfPostgresDoctrineRecord extends sfDoctrineRecord {
    /**
     * Provides getter and setter methods.
     *
     * @param  string $method    The method name
     * @param  array  $arguments The method arguments
     *
     * @return mixed The returned value of the called method
     */
    public function __call($method, $arguments) {
    	$failed = false;
        try {
            return parent::__call($method, $arguments);
        } catch (Exception $e) {
            $failed = true;
        }

        if ($failed) {
            try {
                if (in_array($verb = substr($method, 0, 3), array('set', 'get'))) {
                    $name = substr($method, 3);

                    /* @var $table Doctrine_Table */
                    $table = $this->getTable();
                    foreach($table->getRelations() as $alias => $relation) {
                    	if ($name == str_replace('_', '', $alias)) {
                    		$entityName = $alias;
                    	}
                    }

                    return call_user_func_array(array($this, $verb), array_merge(array($entityName), $arguments));
                }
            } catch (Exception $e) {
                $failed = true;
            }

            if ($failed) {
            	throw new Doctrine_Record_UnknownPropertyException(sprintf('Unknown method %s::%s', get_class($this), $method));
            }
        }
    }
}
