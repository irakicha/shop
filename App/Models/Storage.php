<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 20.12.17
 * Time: 13:27
 */

namespace App\Models;


use Core\Model;

class Storage extends Model {
  public $table = 'products';
}



//class Storage extends Model
//{
//    private $storage;
//
//    public function __construct()
//    {
//        $this->storage = require_once APP_PATH."/data/products.php";
//    }
//
//    public function getProductList()
//    {
//        return $this->storage;
//    }
//
//    public function getProductItem($id)
//    {
//        if (!$id) {
//            //throw new Exception;
//            echo "no product with this id";
//        } else {
//            return $this->storage[$id-1];
//        }
//    }
//}