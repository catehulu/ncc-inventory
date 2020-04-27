<?php

$loader = new \Phalcon\Loader();


// Load composer vendor stuff
$loader->registerFiles([ BASE_PATH . "/vendor/autoload.php" ]);

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->libraryDir,
        $config->application->viewsDir,
        $config->application->cacheDir,
        $config->application->validatorDir,
    ]
)->register();

/**
  * Load library namespace
  */
  $loader->registerNamespaces(array(
	
	/**
	 * Load SQL server db adapter namespace
	 */
	'Phalcon\Db\Adapter\Pdo' => APP_PATH . '/library/Phalcon/Db/Adapter/Pdo',
	'Phalcon\Db\Dialect' => APP_PATH . '/library/Phalcon/Db/Dialect',
	'Phalcon\Db\Result' => APP_PATH . '/library/Phalcon/Db/Result',

));

$loader->register();