<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 20.12.17
 * Time: 13:27
 */

namespace App\Models;


use App\Controllers\AuthController;
use Core\Model;
use Core\Session;

class Storage extends Model {

    public $table = 'products';


    public function addProduct ($id){

        if (AuthController::isAuth()){
//            $product = $this->findOne('id', $id);

            if (true){

                $product_in_cart =[];

                if (Session::keyExist('cart')){
                    $product_in_cart = $_SESSION['cart'];
                }


                if (array_key_exists($id, $product_in_cart)){
                    $product_in_cart[$id] ++;
                } else {
                    $product_in_cart[$id] = 1;
                }

                $_SESSION['cart'] = $product_in_cart;

                var_dump($_SESSION);


            } else {
                echo "no products with this id";
            }
        } else {
            echo "You should login first";
        }

    }
}
