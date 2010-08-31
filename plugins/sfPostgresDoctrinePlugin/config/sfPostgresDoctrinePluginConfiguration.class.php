<?php

class sfPostgresDoctrinePluginConfiguration extends sfPluginConfiguration
{
    public function initialize()
  	{
  		spl_autoload_register(array('sfPostgresDoctrinePluginConfiguration', 'autoloadSymfony'), true, true);
  		spl_autoload_register(array('sfPostgresDoctrinePluginConfiguration', 'autoload'), true, true);

  		$options = array('packagesPrefix'       => 'Base');
		//Doctrine_Manager::getInstance()->setAttribute(Doctrine_Core::ATTR_MAX_IDENTIFIER_LENGTH, 256);
  		sfConfig::set('doctrine_model_builder_options', $options);
  	}

  	public static function autoload($className)
  	{
        if (0 !== stripos($className, 'Doctrine_') || class_exists($className, false) || interface_exists($className, false)) {
            return false;
        }

        $class = realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'doctrine' . DIRECTORY_SEPARATOR . str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';



        if (file_exists($class)) {
            require_once $class;

            return true;
        }

        return false;
   	}

	public static function autoloadSymfony($className)
  	{
  		$class = realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'generator' . DIRECTORY_SEPARATOR . $className.'.class.php';
		if (file_exists($class)) {
            require_once $class;

            return true;
        }

        return false;
   	}

	public static function autoloadTmp($className)
  	{
        $dir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'tmp_doctrine_models';

        if (file_exists($dir)) {
	        $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir),
	                                                        RecursiveIteratorIterator::LEAVES_ONLY);

	        foreach ($it as $file) {
	            $e = explode('.', $file->getFileName());
	            if ($e[0] == $className) {
	            	require_once $file->getPathName();
	            	return true;
	            }
	        }
        }

        return false;
   	}
}
