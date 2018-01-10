<?php
/**
 *
 */

namespace App\Controllers;

use Core\Controller;
use App\Models\Storage;

class MainController extends Controller
{
    public function index()
    {

            $storage=new Storage();
            $products = $storage->getProductList();
            $this->setData($products);
    }

}