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
use Core\Pagination;

class CategoryController extends BaseController
{
    public function viewAll($page = '')
    {
        $page = !empty($page) ? intval($page) : 1;

        $modelCategory = new Categories();

        $data['categories'] = $modelCategory->getAllCategoriesName();

        $model = new Storage();

        $count = $model->getCategoryProductCount();

        $pagination = new Pagination($count[0]['count'], $page, $model->productsPerPage, 'page-');

        $data['categoryProducts']  = $model->getAllProducts($page);

        $data['pagination'] = $pagination;

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
