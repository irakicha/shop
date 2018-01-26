<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 05.01.18
 * Time: 12:37
 */

namespace App\Models;

use Core\Model;
use Core\Session;

class Users extends Model
{
    public $table = 'users';
    public $user = [];


    protected function getAllUsers()
    {
        return $this->findAll();
    }

    public function getUserLogin($login){
        if ($login){
            return $this->findOne('login', $login);
        } else {
            return false;
        }
    }

    public function authUser($login,$password)
    {

        $user = parent::findOne('login', $login);

        if ($user && $user['password'] == $password) {
            return $user;
        } else {
            return false;
        }
    }


    public static function setUser($name, $login)
    {
        if ($name && $login) {
            self::$users[] = [
                'name' => $name,
                'login' => $login
            ];
//            return self::$users;
        } else {
            return false;
        }
    }

    public function logOut()
    {
        Session::sessionDestroy();
    }


    public static function checkName($login)
    {
        if (strlen($login) > 3) {
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