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
    public function viewAll() {
        $model = new Categories();
        $categories = $model->findColumn(1);
        $this->setData($categories);
    }

    public function view($name)
    {
        $model_1 = new Categories();
        $model_2 = new Storage();
        $cat_id =$model_1->findOneByColumn('id', 'title', $name)['id'];
        $cat_products = $model_2->findAllParams('category_id',$cat_id);
        $this->setData($cat_products);
    }
}