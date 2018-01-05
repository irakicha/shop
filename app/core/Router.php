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
    /*
     * Table of routes
     * @var array
     * */
    private $uri;

    private $routes =[];

    private $route=[];

    public function getRoutes(){
        return $this->routes;
    }

    public function getRoute(){
        return $this->route;
    }

    /*
     * Load table of routes
     * prepare URI
     * @return array
     * */
    function __construct()
    {
        $this->uri = trim($_SERVER['REQUEST_URI'], '/');
        $this->routes = require APP_PATH."config/routes.php";
    }
    /*
     * Match URI with routes, return route
     *@return array
     * */
    public function match()
    {

        foreach ($this->routes as $pattern => $value)
        {
            if (preg_match('#^'.$pattern.'$#',$this->uri))
            {
                $internalPath = preg_replace('#^'.$pattern.'$#', $value, $this->uri);
                $route = explode('/', $internalPath);
                $route = array_pad($route,3,'');
                $keys = ['controller','action','params'];
                $route = array_combine($keys,$route);
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


        if (!$route)
        {
            echo "page not found";
            header("HTTP/1.1 404 Not Found");
        } else
        {
            $controller =ucfirst($route['controller']).'Controller';

            $controller_path = 'app\controllers\\'.$controller;
            if (class_exists($controller_path))
            {
                $controller = new $controller_path($route);

                $action = $route['action'];

                if (method_exists($controller_path, $action))
                {
                    $params = $route['params'];

                    if ($params)
                    {
                        $controller ->$action($params);
                    } else
                    {
                        $controller ->$action();
                    }


                } else
                {
                    //throw new Exception("No method");
                    echo "Method not found";
                }

                $controller->getView();

            } else
            {
                //throw new Exception("No Controller");
                echo "controller not found";
            }
        }

    }
}