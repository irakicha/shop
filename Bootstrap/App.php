<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 09.01.18
 * Time: 21:19
 */

//namespace Bootstrap;
//
//use App\Router;
//
//class App
//{
//    public $loader;
//    public $router;
//
//    public function init()
//    {
//        $loader = new Autoloader();
//        $loader->register();
//        $loader->addNamespace('App', ROOTPATH. '/App/');
//        $loader->addNamespace('App\Bootstrap', ROOTPATH. '/App/Bootstrap/');
//        $loader->addNamespace('App\Core', ROOTPATH.'/App/Core/');
//        $loader->addNamespace('App\Controllers', ROOTPATH.'/App/Controllers/');
//        $loader->addNamespace('App\Models', ROOTPATH.'/App/Models/');
//    }
//
//    public function addRouter()
//    {
//        require_once ROOTPATH . '/Core/Router.php';
//        $router = new \Core\Router();
//        $router->run();
//        var_dump($router);
//    }
//
//}