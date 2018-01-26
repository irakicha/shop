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
    protected function isAuth()
    {
        if (Session::sessionExist()) {
            return true;
        } else {
            return false;
        }
    }


}