<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 20.12.17
 * Time: 13:27
 */

namespace App\Models;

use Core\BaseController;
use Core\Model;
use Core\Router;
use Core\Session;

class Storage extends Model
{

    public $table = 'products';

    public function getAllProducts()
    {
        echo $this->table;
        return $this->findAll();
    }

    public function getProductsByCategory($field)
    {
        return $this->findAllParams('category_id', $field);
    }


    public function addProduct($id)
    {

        if (!BaseController::isAuth()) {
            Router::redirect('/auth/login');
        }

        if (!$this->findOne('id', $id)) {
            echo "no products with this id";
            exit();
        }

        if ($this->findOneFieldInColumn(8, 'id', $id) == 0) {
            echo "out of stock";
            exit();
        }

        $productInCart =[];

        if (Session::keyExist('cart')) {
            $productInCart = $_SESSION['cart'];
        }


        if (array_key_exists($id, $productInCart)) {
            $productInCart[$id] ++;
        } else {
            $productInCart[$id] = 1;
        }

        $_SESSION['cart'] = $productInCart;

        return self::productsInCart();
    }

    public static function productsInCart()
    {
        if (Session::keyExist('cart')) {
            $count = array_sum($_SESSION['cart']);
            return $count;
        }
        return 0;
    }
}
