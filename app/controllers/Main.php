<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 27.12.17
 * Time: 2:18
 */

namespace app\controllers;

use app\core\Controller;
use app\models\Storage;

class Main extends Controller
{
    public function index(){

            $products=new Storage();
            $products = $products->getProductList();
            echo "<pre>";
            print_r($products);
            return $products;

    }
}