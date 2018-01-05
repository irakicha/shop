<?php
/**
 *
 */

namespace app\core;


class View
{

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


    public function __construct($controller_name, $view = '', $layout = '') {
        $this->controller_name=$controller_name;
        $this->view = $view;
        $this->layout = $layout?:"default";
    }

    public function render($data){


        if(is_array($data)) extract($data);

        $file_view = VIEW_PATH.$this->controller_name.DIRECTORY_SEPARATOR.$this->view.'.php';
        ob_start();
        if(is_file($file_view)){
            require $file_view;
        }else{
            echo "View not found".$file_view;
        }
        $content = ob_get_clean();


        $file_layout = VIEW_PATH."layouts".DIRECTORY_SEPARATOR.$this->layout.'.php';

        if(is_file($file_layout))
        {
            require $file_layout;
        }else
            {
            echo "layout not found".$file_layout;
        }
    }
}