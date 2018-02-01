<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 24.01.18
 * Time: 21:48
 */

namespace Core;

class BaseController extends Controller
{
    public static function isAuth()
    {
        if (Session::keyExist('login')) {
            return true;
        }
        return false;
    }
}
