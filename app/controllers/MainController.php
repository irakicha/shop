<?php
/**
 *
 */

namespace app\controllers;

use app\core\Controller;
use app\models\Storage;

class MainController extends Controller
{
    public function indexAction(){

            $storage=new Storage();
            $products = $storage->getProductList();
            $this->setData($products);
    }

}