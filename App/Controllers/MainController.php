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
        $model = new Storage();

        $products = $model->findAll();

        $this->setData($products);

    }

}