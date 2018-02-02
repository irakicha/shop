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
        $modelCategory = new Categories();
        $data['categories'] = $modelCategory->getAllCategoriesName();

        $model = new Storage();

        $data['categoryProducts']  = $model->findAll();
        $this->setData($data);
    }


    public function view($name)
    {
        $data['categoryName'] = $name;

        $modelCategory = new Categories();
        $data['categories'] = $modelCategory->getAllCategoriesName();

        $modelStorage = new Storage();

        $catId = $modelCategory->getIdByName($name);
        $data['categoryProducts'] = $modelStorage->getProductsByCategory($catId);
        $this->setData($data);
    }
}
