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
        if ($id) {
            $model = new Storage();
            $added_product = $model->addProduct($id);
//            Router::redirect($_SERVER['HTTP_REFERER']);
        }
        return false;
    }

}