<?php
declare(strict_types=1);

use Phalcon\Di\FactoryDefault;
use Phalcon\Debug;

error_reporting(E_ALL);
// ini_set('display_errors', 1);


define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

(new \Phalcon\Debug())->listen();

require __DIR__ . '/../vendor/autoload.php';

if (getenv('APPLICATION_ENV') !== 'production') {
			$a = APP_PATH;
			$envFile = ((getenv('APPLICATION_ENV') === 'testing') ? '.env.test' : '.env');
			$dotEnv = Dotenv\Dotenv::createImmutable(APP_PATH, $envFile);
			$dotEnv->load();
    }
/**
 * The FactoryDefault Dependency Injector automatically registers
 * the services that provide a full stack framework.
 */
$di = new FactoryDefault();

/**
 * Handle routes
 */
include APP_PATH . '/config/router.php';

/**
 * Read services
 */
include APP_PATH . '/config/services.php';

/**
 * Get config service for use in inline setup below
 */
$config = $di->getConfig();

/**
 * Include Autoloader
 */
include APP_PATH . '/config/loader.php';

/**
 * Set base URI
 */

 $url = $di->get('url')->setBaseUri(getenv('BASE_URL'));

/**
 * Handle the request
 */

$application = new \Phalcon\Mvc\Application($di);

echo $application->handle($_SERVER['REQUEST_URI'])->getContent();
