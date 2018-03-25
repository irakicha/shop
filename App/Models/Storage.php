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

    public $productsPerPage = 3;

    public function getAllProducts($page)
    {
        $offset = abs((1-$page)) * $this->productsPerPage;

        return $this->findSql("SELECT id, image, title, price, description FROM {$this->table} ORDER BY 'id' ASC LIMIT {$this->productsPerPage} OFFSET {$offset}");
    }

    public function getCategoryProductCount($category_id = '')
    {
        if ($category_id != false) {
            return $this->findSql("SELECT count(id) as count FROM {$this->table} WHERE category_id = {$category_id}");
        }
        return $this->findSql("SELECT count(id) as count FROM {$this->table}");
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

        return self::productsInCartQty();
    }

    public static function productsInCart()
    {
        return Session::getKey('cart');
    }

    public static function productsInCartQty($id = '')
    {
        if (Session::keyExist('cart')) {
            $count = !$id ? array_sum($_SESSION['cart']) : $_SESSION['cart'][$id];
            return $count;
        }
        return 0;
    }

    public function getProductsById($idArray)
    {
        $in  = str_repeat('?,', count($idArray) - 1) . '?';

        $productsInCart = $this->findSql("SELECT id, image, title, price FROM {$this->table} WHERE id IN ($in)", $idArray);

        return $productsInCart;
    }

    public static function getProductSubtotal($id, $price)
    {
        $productQty = self::productsInCartQty($id);

        $total=$productQty * $price;

        return $total;
    }

    public function getProductPrice($id)
    {
        return $this->findOneFieldInColumn(7, 'id', $id);
    }

    public static function getTotalPrice($products)
    {
        $productsInCart = self::productsInCart();

        $total = 0;

        foreach ($products as $product) {
            $total+=$product['price'] * $productsInCart[$product['id']];
        }

        return $total;
    }
}
