<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 24.01.18
 * Time: 16:35
 */

namespace App\Controllers;

use App\Models\Storage;
use Core\BaseController;
use Core\Router;

class CartController extends BaseController
{
    public function view()
    {
        echo __CLASS__;
    }

    public function add($id)
    {
        if (!self::isAuth()) {
            Router::redirect('/auth/login');
        }
        $modelStorage = new Storage();
        $modelStorage->addProduct($id);
        Router::redirect($_SERVER['HTTP_REFERER']);
    }

    public function addAjax($id)
    {
//        if (!self::isAuth()) {
//            Router::redirect('/auth/login');
//        }
        $modelStorage = new Storage();
        $result = $modelStorage->addProduct($id);
        echo $result;
        return true;
    }
}
