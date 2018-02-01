<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 26.01.18
 * Time: 11:49
 */

namespace App\Models;

use Core\Model;

class Categories extends Model
{
    public $table = 'categories';

    public function getAllCategoriesName()
    {
        return $this->findAllInColumn(1);
    }

    public function getIdByName($name)
    {
        return $this->findOneFieldInColumn(0, 'title', $name);
    }
}
