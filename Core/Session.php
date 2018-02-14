<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 05.01.18
 * Time: 12:22
 */

namespace Core;

class Session
{

    public static function getName()
    {
        return session_name();
    }

    public static function setName($name)
    {
        return session_name($name);
    }

    public static function getSessionId()
    {
        return session_id();
    }

    public function setSessionId($id)
    {
        return session_id($id);
    }

    public static function cookieExist()
    {
        if (isset($_COOKIE[self::getName()])) {
            return true;
        }
        return false;
    }

    public static function sessionExist()
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            return true;
        }
    }

    public static function sessionStart()
    {
        if (self::cookieExist()) {
            session_start();
            return true;
        }
        return false;
    }

    public static function sessionDestroy()
    {

        if (!self::cookieExist() || !self::sessionExist()) {
            return;
        }

        session_destroy();
        unset($_SESSION[self::getName()]);
        setcookie(self::getName(), "", time()-3600, "/");
    }

    public static function keyExist($key)
    {
        if (isset($_SESSION)) {
            if (array_key_exists($key, $_SESSION)) {
                return true;
            }
        }
        return false;
    }

    public static function getKey($key)
    {
        if (self::keyExist($key)) {
            return $_SESSION[$key];
        }
        return false;
    }

    public static function setKey($key, $value)
    {
        if (self::keyExist($key) == false) {
            $_SESSION[$key] = $value;
            return true;
        }
        return false;
    }


    public static function deleteKey($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }

    public static function setSaveSessionPath($path)
    {
        return session_save_path($path);
    }
}
