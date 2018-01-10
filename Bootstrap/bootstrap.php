<?php
/**
 */

include_once 'Autoloader.php';

$loader = new \Bootstrap\Autoloader();

$loader->register();

$loader->addNamespace('App', ROOTPATH. '/App/');
$loader->addNamespace('Core', ROOTPATH.'/Core/');
$loader->addNamespace('App\Controllers', ROOTPATH.'/App/Controllers/');
$loader->addNamespace('App\Models', ROOTPATH.'/App/Models/');

$router = new Core\Router();
$router->run();
