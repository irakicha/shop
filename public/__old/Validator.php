<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 20.12.17
 * Time: 0:42
 */

function __autoload($classname)
{
    $filename = $classname .".php";
    include_once($filename);
}

    $products = require_once("../products/products.php");
    $qty = require_once("../products/products.php");
    $id =$_GET['id'];


    echo "<pre>";
//echo var_dump($products);
echo var_dump($products[$id]);
$added = new AddToBasket($products);
echo gettype($added);
//echo $added->products[''];








