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
use Core\Session;

class CartController extends BaseController
{
    public function index()
    {
        $productsInCart = Storage::productsInCart();

        if ($productsInCart) {
            $productsId = array_keys($productsInCart);
            $productsModel = new Storage();
            $products = $productsModel->getProductsById($productsId);
            $data['productsInCart'] = $products;
            $this->setData($data);
        }
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
        if (!self::isAuth()) {
            die();
        }
        $modelStorage = new Storage();
        $result = $modelStorage->addProduct($id);
        echo $result;
        return true;
    }

    public function removeAjax($id)
    {
        unset($_SESSION['cart'][$id]);
        return true;
    }

}
