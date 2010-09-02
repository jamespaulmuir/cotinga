<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfPostgresDoctrinePlugin');
    $this->enablePlugins('sfRestApiPlugin');

    
	
  }

  public function configureDoctrine(Doctrine_Manager $manager)
  {
    $manager->setAttribute(
    Doctrine::ATTR_AUTO_ACCESSOR_OVERRIDE,
    false
);
  }

}
