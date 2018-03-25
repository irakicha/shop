<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 05.01.18
 * Time: 12:37
 */

namespace App\Models;

use Core\Model;
use Core\Router;

class Users extends Model
{
    public $table = 'users';
    public $user = [];


    protected function getAllUsers()
    {
        return $this->findAll();
    }

    public function authUser($login, $password)
    {
        $user = parent::findOne('login', $login);
        if ($user && self::checkHash($password, $user['password'])) {
            session_start();
            return true;
        }
        return false;
    }

    public function registerUser($email, $login, $password, $phone, $city, $address, $zipCode)
    {
        $userRole = 2;
        $userFields = [$userRole, $email, $login, $password, $phone, $city, $address, $zipCode];
        $this->query("INSERT INTO users (user_role_id, email, login, password, phone, city, address, zip_code) VALUES(?, ?, ?, ?, ?, ?, ?, ?)", $userFields);
        session_start();
    }

    public function getUserInfo($login)
    {
        $user = $this->findOne('login', $login);
        return $user;
    }

    public function findUserLogin($login)
    {
        if ($this->findOneFieldInColumn(3, 'login', $login)) {
            return true;
        }
        return false;
    }

    public function getUserId($login)
    {
        $userId = $this->findOneFieldInColumn(0, 'login', $login);
        return $userId;
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


    protected static function checkHash($password, $hash)
    {
        return password_verify(trim($password), trim($hash));
    }
}
