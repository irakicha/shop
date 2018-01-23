<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 27.12.17
 * Time: 2:19
 */

namespace App\Controllers;

use Core\Controller;
use App\Models\Storage;

class ProductController extends Controller
{

    public function view($id)
    {

            $products = new Storage();
            $product = $products->findOne($id);
            if (!$product){
                exit("No products with this id");
                // need an exeption;
            }
            $this->setData($product);
    }
}
