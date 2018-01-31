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

}