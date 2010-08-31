<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Publishes Configs for Core and third party plugins
 *
 * @package    symfony
 * @subpackage task
 */
class sfPluginPublishConfigsTask extends sfPluginBaseTask
{
  /**
   * @see sfTask
   */
  protected function configure()
  {
    $this->addArguments(array(
      new sfCommandArgument('plugins', sfCommandArgument::OPTIONAL | sfCommandArgument::IS_ARRAY, 'Publish this plugin\'s configs'),
    ));

    $this->addOptions(array(
      new sfCommandOption('core-only', '', sfCommandOption::PARAMETER_NONE, 'If set only core plugins will publish their configs'),
    ));

    $this->namespace = 'plugin';
    $this->name = 'publish-configs';

    $this->briefDescription = 'Publishes configs for all plugins';

    $this->detailedDescription = <<<EOF
The [plugin:publish-configs|INFO] task will publish configs from all plugins.

  [./symfony plugin:publish-configs|INFO]

In fact this will send the [plugin.post_install|INFO] event to each plugin.

You can specify which plugin or plugins should install their assets by passing
those plugins' names as arguments:

  [./symfony plugin:publish-configs sfDoctrinePlugin|INFO]
EOF;
  }

  /**
   * @see sfTask
   */
  protected function execute($arguments = array(), $options = array())
  {
    $enabledPlugins = $this->configuration->getPlugins();

    if ($diff = array_diff($arguments['plugins'], $enabledPlugins))
    {
      throw new InvalidArgumentException('Plugin(s) not found: '.join(', ', $diff));
    }

    if ($options['core-only'])
    {
      $corePlugins = sfFinder::type('dir')->relative()->maxdepth(0)->in($this->configuration->getSymfonyLibDir().'/plugins');
      $arguments['plugins'] = array_unique(array_merge($arguments['plugins'], array_intersect($enabledPlugins, $corePlugins)));
    }
    else if (!count($arguments['plugins']))
    {
      $arguments['plugins'] = $enabledPlugins;
    }

    foreach ($arguments['plugins'] as $plugin)
    {
      $pluginConfiguration = $this->configuration->getPluginConfiguration($plugin);

      $this->logSection('plugin', 'Configuring plugin - '.$plugin);
      $this->installPluginConfigs($plugin, $pluginConfiguration->getRootDir());
    }
  }

  /**
   * Installs configs for a plugin.
   *
   * @param string $plugin The plugin name
   * @param string $dir    The plugin directory
   */
  protected function installPluginConfigs($plugin, $dir)
  {
    $configDir = $dir.DIRECTORY_SEPARATOR.'config' . DIRECTORY_SEPARATOR .'publish';

    if (is_dir($configDir))
    {
    	$d = sfConfig::get('sf_config_dir');

    	if (!is_dir($d.'/plugins/'.$plugin)) {
			mkdir($d.'/plugins/'.$plugin, 0777, true);
		}

		$files = sfFinder::type('file')->name('*.yml')->in($configDir);

		foreach($files as $file) {

			$bn = basename($file);
			$fd = str_replace(realpath($configDir), '', realpath(dirname($file)));
			$md = $d.'/plugins/'.$plugin. ($fd == "" ? "/" : $fd);

			if (!is_dir($md)) {
				mkdir($md, 0777, true);
			}

			if (!file_exists($md.'/'.$bn)) {
				copy($file, $md.'/'.$bn);
			}
		}
    }
  }
}
