<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 19.12.17
 * Time: 17:26
 */

class BasketException extends Exception
{
    public function getMsg(){
        echo "<p>Sorry, this model out of stock</p>";
    }
}