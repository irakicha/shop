<?php
/**
 * Created ira.
 * Date: 23.12.17
 * Time: 14:59
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

define("ROOTPATH", dirname(__FILE__));

require ROOTPATH.'/bootstrap/Autoloader.php';
Autoloader::register();

use app\core\Router;
$router = new Router();
$router->run();
