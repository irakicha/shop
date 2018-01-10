<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 05.01.18
 * Time: 12:37
 */

namespace App\Models;

use Core\Model;

class Users extends Model
{
    private static $users;

    public static function getAllUsers()
    {
        self::$users = require_once APP_PATH."config/users.php";
        return self::$users;
    }

    public static function getUserLogin($name)
    {
        foreach (self::getAllUsers() as $user) {
            if ($name == $user['login']) {
                return $user['login'];
            } else {
                return false;
            }
        }
    }

    public static function setUser($name, $login)
    {
        if ($name && $login) {
            self::$users[] = [
                'name' => $name,
                'login' => $login
            ];
            return self::$users;
        } else {
            return false;
        }
    }

    public static function userExist($name, $password)
    {
        foreach (self::getAllUsers() as $user) {
            if ($name == $user['login'] && $password == $user['password']) {
                echo $user['login'];
                echo $user['password'];
                return true;
            } else {
                return false;
            }
        }
    }


    public static function checkName($name)
    {
        if (strlen($name) > 3) {
            return true;
        }
        return false;
    }

    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

}