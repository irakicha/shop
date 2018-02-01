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
        var_dump($_SESSION);
    }

    public function add($id)
    {
        if (!self::isAuth()) {
            Router::redirect('/auth/login');
        }
        $model = new Storage();
        $addedProduct = $model->addProduct($id);
//            Router::redirect($_SERVER['HTTP_REFERER']);
    }
}
