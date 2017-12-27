<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 25.12.17
 * Time: 13:37
 */

namespace app\core;

class Router
{
    private $routes;

    function __construct()
    {
        $this->routes = require "app/config/routes.php";

    }

    public function match(){

        $uri = trim($_SERVER['REQUEST_URI'], '/');

        foreach ($this->routes as $pattern => $value){
            if (preg_match('#^'.$pattern.'$#',$uri)){
                $internalPath = preg_replace('#^'.$pattern.'$#', $value, $uri);
                $request_parts = explode('/', $internalPath);
                return $request_parts;
            }
        }
        return false;
    }

    public function run(){
        $parts =$this->match();

        if (!$parts){
            header("HTTP/1.1 404 Not Found");
        } else {
            $controller =ucfirst(array_shift($parts));
            $controller_path = 'app\controllers\\'.$controller;
            if (class_exists($controller_path)){
                $action = array_shift($parts);
                if (method_exists($controller_path, $action)){
                    $params = array_shift($parts);
                    $controller = new $controller_path;
                    if ($params){
                        $controller ->$action($params);
                    } else {
                        $controller ->$action();
                    }

//
                } else {
                    //throw new Exception("No method");
                     echo "Method not found";
                }

            } else {
                //throw new Exception("No Controller");
               echo "controller not found";
            }
        }

    }
}