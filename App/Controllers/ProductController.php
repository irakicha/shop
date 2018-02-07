<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 27.12.17
 * Time: 2:19
 */

namespace App\Controllers;

use Core\BaseController;
use App\Models\Storage;

class ProductController extends BaseController
{
    public function view($id)
    {
        $products = new Storage();
        $product = $products->findOne('id', $id);
        if (!$product) {
            exit("No products with this id");
            // need an exeption;
        }
        $this->setData($product);
    }
}
