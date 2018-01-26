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

    /*Category Controller*/

    /*show all products*/

    'category/viewAll' => 'category/viewAll',

    'category/([a-z]+)' => 'category/view/$1',

    /*CartController*/

    'cart' => 'cart/view',


    /*AuthController*/

    'auth/login' =>'auth/login',

    'auth/register' =>'auth/register',

    'auth/logout' =>'auth/logout',

    /*UserController*/

    'user/([0-9]+)' =>'user/view/$1',


    /*MainBaseController*/

    '' => 'main/index'
];
