<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 26.12.17
 * Time: 21:09
 */

return [

    /*ProductController*/

    /*show 1 product*/

    'product/([0-9]+)' =>'product/view/$1',

    'category/product/([0-9]+)' =>'product/view/$1',


    /*Category Controller*/

    /*show all products*/

    'categories/page-([0-9]+)' => 'category/viewAll/$1',

    'category/([a-z]+)' => 'category/view/$1',

    'categories' => 'category/viewAll',


    /*CartController*/

    'cart/add/([0-9]+)' => 'cart/add/$1',

    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',

    'cart/removeAjax/([0-9]+)' => 'cart/removeAjax/$1',

    'cart' => 'cart/index',

    /*Order controller*/

    'order/create' => 'order/create',

    'order/view/([0-9]+)' => 'order/view/$1',


    /*AuthController*/

    'auth/login' =>'auth/login',

    'auth/register' =>'auth/register',

    'auth/logout' =>'auth/logout',


    /*UserController*/

    'account/view/([a-z0-9]+)' =>'account/view/$1',


    /*MainBaseController*/

    '' => 'main/index'
];
