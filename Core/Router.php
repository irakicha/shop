<?php

namespace Core;

class Router
{
    /*
     * Table of routes
     * @var array
     * */
    private $uri;

    private $routes =[];

    private $route=[];

    public function getRoutes()
    {
        return $this->routes;
    }

    public function getRoute()
    {
        return $this->route;
    }

    /*
     * Load table of routes
     * prepare URI
     * @return array
     * */
    public function __construct()
    {
        $this->uri = trim($_SERVER['REQUEST_URI'], '/');
        $this->routes = require APP_PATH . "config/routes.php";
    }
    
    /*
     * Match URI with routes, return route
     *@return array
     * */
    public function match()
    {

        foreach ($this->routes as $pattern => $value) {
            if (preg_match('#^'.$pattern.'$#', $this->uri)) {
                $internalPath = preg_replace('#^'.$pattern.'$#', $value, $this->uri);
                $route = explode('/', $internalPath);
                $route = array_pad($route, 3, ' ');
                $keys = ['controller','action','params'];
                $route = array_combine($keys, $route);
                return $route;

            }

        }
        return false;
    }

    /*
     * find and set up controller, action and action params
     * @route arr
     * */

    public function run()
    {
        $route =$this->match();

        if (!$route) {
            throw new \Exception("Page not found");
        }

        $controller =ucfirst($route['controller']).'Controller';

        $controllerPath = 'App\Controllers\\'.$controller;

        $action = $route['action'];

        $params = $route['params'];

        if (!class_exists($controllerPath)) {
            throw new \Exception("Controller not found");
        }

        if (!method_exists($controllerPath, $action)) {
            throw new \Exception("Method not found");
        }
        $controller = new $controllerPath($route);

        if (!$params) {
            $controller ->$action();
        }

        $controller ->$action($params);

        $controller->getView();
    }

    public static function redirect($path)
    {
        return header("location:$path");
    }
}
