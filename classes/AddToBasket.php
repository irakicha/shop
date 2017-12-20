<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 19.12.17
 * Time: 17:33
 */


function __autoload($classname) {
    $filename = $classname .".php";
    include_once($filename);
}


    $id = (int) ($_GET['id']);
    $products = require_once ("../products/products.php");
    $storage = require_once ("../products/stock.php");
    $qty = $storage[$id];
    $product = new Storage($products[$id-1]);


    try{
        if($qty<=0){
            throw new BasketException;
        }

    } catch (BasketException $e){
        echo $e->getMsg();
    }








