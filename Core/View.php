<?php
/**
 *
 */

namespace Core;

class View
{
    /*
     * current controller name
     * @var string
     * */
    public $controllerName;

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


    public function __construct($controllerName, $view = '', $layout = '')
    {
        $this->controllerName=$controllerName;
        $this->layout = $layout?:"default";
        $this->view = $view;
    }

    public function render($data)
    {

        if (is_array($data)) {
            extract($data);
        }

        $fileView = VIEW_PATH.$this->controllerName.DIRECTORY_SEPARATOR.$this->view.'.php';
        ob_start();
        if (!is_file($fileView)) {
            echo "View not found".$fileView;
        }
        require_once $fileView;

        $content = ob_get_clean();


        $fileLayout = VIEW_PATH."layouts".DIRECTORY_SEPARATOR.$this->layout.'.php';

        if (!is_file($fileLayout)) {
            echo "layout not found".$fileLayout;
        }
        require_once $fileLayout;
    }
}
