<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 26.01.18
 * Time: 13:03
 */

namespace App\Controllers;

use App\Models\Categories;
use App\Models\Storage;
use Core\BaseController;

class CategoryController extends BaseController
{
    public function viewAll()
    {
        $model = new Categories();
        $categories = $model->getAllCategoriesName();
        $this->setData($categories);
    }

    public function view($name)
    {
        $modelCategory = new Categories();
        $modelStorage =new Storage();
        $catId = $modelCategory->getIdByName($name);
        $catProducts = $modelStorage->getProductsByCategory($catId);
        $this->setData($catProducts);
    }
}
