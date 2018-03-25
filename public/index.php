<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

define("ROOTPATH", dirname(dirname(__FILE__)));
define("APP_PATH", ROOTPATH."/App/");
define("CONTROLLER_PATH", ROOTPATH."/App/Controllers/");
define("VIEW_PATH", ROOTPATH."/App/views/");

require_once ROOTPATH.'/vendor/autoload.php';

try {
    $router = new Core\Router();
    $router->run();
} catch (\Exception $e) {
    echo "Message: ".$e->getMessage()."<br>";
    echo "File: ".$e->getFile()."<br>";
    echo "Line: ".$e->getLine()."<br>";
}
