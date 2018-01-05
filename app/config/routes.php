<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 26.12.17
 * Time: 21:09
 */

return [

    /*ProductBaseController*/

    /*show 1 product*/

    'product/([0-9]+)' =>'product/view/$1',

    /*show all products*/

    'product/' => 'product/viewAll',


    /*MainBaseController*/

    '' => 'main/index'
];