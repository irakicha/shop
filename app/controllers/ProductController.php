<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 27.12.17
 * Time: 2:19
 */

namespace app\controllers;

use app\core\Controller;
use app\models\Storage;

class ProductController  extends Controller
{
    protected static $products;


    public function view($id){
        if($id){
            $products=new Storage();
            $product = $products->getProductItem($id);
            $this->setData($product);
        } else {
            echo "No products with this id";
        }
    }


}