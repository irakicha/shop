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
        $model = new Storage();

        $products = $model->findAll();
        print_r($_SESSION);
        $this->setData($products);
    }
}
