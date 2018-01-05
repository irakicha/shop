<?php
/**
 * Created ira.
 * Date: 23.12.17
 * Time: 14:59
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

define("ROOTPATH", dirname(dirname(__FILE__)));
define("APP_PATH", ROOTPATH."/app/");
define("CONTROLLER_PATH", ROOTPATH."/app/controllers/");
define("VIEW_PATH", ROOTPATH."/app/views/");

require ROOTPATH . '/bootstrap/Autoloader.php';

// instantiate the loader
$loader = new \bootstrap\Autoloader();



// register the autoloader

$loader->register();

// register the base directories for the namespace prefix $loader->addNamespace('Foo\Bar', '/path/to/packages/foo-bar/src');
$loader->addNamespace('app\core', '/shop/app/core/');

echo "<pre>";
print_r($loader);


$router = new Router();
$router->run();

//$path = ROOTPATH . '/bootstrap/Autoloader.php';
//echo $path;

//Autoloader::register();
//
//use app\core\Router;
