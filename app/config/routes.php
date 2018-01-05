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

    /*show all products*/

    'product/' => 'product/viewAll',


    /*AuthController*/

    /*show user*/

    'auth/([a-z]+)' =>'auth/login/$1',


    /*MainBaseController*/

    '' => 'main/index'
];
