<?php
/**
 *
 */

namespace App\Controllers;

use Core\BaseController;
use App\Models\Storage;

class MainController extends BaseController
{
    public function index()
    {
        $modelStorage = new Storage();
        $products = $modelStorage->findAll();
        $this->setData($products);
    }
}
