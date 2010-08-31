<?php

/**
 * @author Michał Stzrzelecki
 * @package sfPostgresDoctrinePlugin
 *
 */

class sfDoctrineBuildViewsSchemaTask extends sfDoctrineBaseTask
{
  /**
   * @see sfTask
   */
  protected function configure()
  {
    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_OPTIONAL, 'The application name', true),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
    ));

    $this->namespace = 'doctrine';
    $this->name = 'build-views-schema';
    $this->briefDescription = 'Creates a schema for views from an existing database';

    $this->detailedDescription = <<<EOF
The [doctrine:build-views-schema|INFO] task introspects a database to create a schema:

  [./symfony doctrine:build-views-schema|INFO]

The task creates a yml file in [config/doctrine|COMMENT]
EOF;
  }

  /**
   * @see sfTask
   */
  protected function execute($arguments = array(), $options = array())
  {
    $this->logSection('doctrine', 'generating yaml schema for views from database');

    $databaseManager = new sfDatabaseManager($this->configuration);

    $config = array(
      'generate_views' => true,
      'yaml_schema_path'   => sfConfig::get('sf_config_dir').'/generated_views.yml',
    );

    $this->callDoctrineCli('generate-yaml-db', $config);
  }


}