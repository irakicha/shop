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

    public function setName($name)
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
        } else {
            return false;
        }
    }

    public static function sessionExist()
    {
        if (!self::getSessionId()) {
            return false;
        } else {
            return true;
        }
    }

    public static function sessionStart()
    {
        if (self::cookieExist() == false) {
            session_start();
            return true;
        }
        return false;
    }

    public static function sessionDestroy()
    {
        if (self::sessionExist() == true) {
            session_destroy();
            unset($_SESSION[self::getName()]);

            return true;
        }
        return false;
    }

    public function keyExist($key)
    {
        if (array_key_exists($key, $_SESSION)) {
            return true;
        }
        return false;
    }

    public function setKey($key, $value)
    {
        if ($this->keyExist($key) == false) {
            $_SESSION[$key] = $value;
            return true;
        }
        return false;
    }


    public function deleteKey($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }

    public function setSaveSessionPath($path)
    {
        $this->setSaveSessionPath($path);
    }

}
