<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 31.01.18
 * Time: 11:24
 */

namespace Core;

class RequestMethod
{
    const HEAD = 'HEAD';
    const GET = 'GET';
    const POST = 'POST';
    const PUT = 'PUT';
    const PATCH = 'PATCH';
    const DELETE = 'DELETE';
    const PURGE = 'PURGE';
    const OPTIONS = 'OPTIONS';
    const TRACE = 'TRACE';
    const CONNECT = 'CONNECT';

    public static function getRequestMethod()
    {
        return strtoupper($_SERVER['REQUEST_METHOD']);
    }

    public static function isGet()
    {
        if ($_SERVER['REQUEST_METHOD'] == self::GET) {
            return true;
        }
        return false;
    }

    public static function isPost()
    {
        if ($_SERVER['REQUEST_METHOD'] == self::POST) {
            return true;
        }
        return false;
    }

    public static function isAjax()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && (strtolower(getenv('HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest')) {
            return true;
        };
    }


    public function calc($a, $b)
    {
        if (is_int($a) && is_int($b)) {
            return $a+ $b;
        }
        echo 'I cant\'t calculate strings';
    }
}
