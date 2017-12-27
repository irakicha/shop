<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 20.12.17
 * Time: 13:27
 */

namespace app\models;

class Storage
{
    private $storage;

    public function __construct()
    {
        $this->storage = require_once ROOTPATH."/app/data/products.php";

    }

    public function getProductList(){
        return $this->storage;
    }

    public function getProductItem($id){
        if (!$id){
            //throw new Exception;
        } else {
            return $this->storage[$id];
        }
    }
}