<?php
/**
 *
 */

namespace Core;

abstract class Controller
{

    /*current route and params
     *@var array
     * */
    public $route = [];

    /*
    * current controller name
    * @var string
    * */
    public $controller_name;

    /*
    * current view
    * @var string
    * */
    public $view;

    /*
    * current layout
    * @var string
    * */
    public $layout;

    /*
     *transmitted data
     * @var array
     * */
    public $data = [];

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route['action'];
        $this->controller_name = $route['controller'];
    }

    public function getView()
    {
        $view_object = new View($this->controller_name, $this->view, $this->layout);
        $view_object->render($this->data);
    }

    public function setData($data)
    {
        $this->data = $data;
    }

}