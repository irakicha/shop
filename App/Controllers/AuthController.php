<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 05.01.18
 * Time: 12:19
 */

namespace App\Controllers;

use Core\Controller;
use App\Models\Users;
use Core\Session;


class AuthController extends Controller
{
    public $name='';
    public $password='';
    public $errors = [];

    protected function isAuth()
    {
        if (Session::sessionExist()) {
            return true;
        } else {
            return false;
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name =(string)  trim(strip_tags($_POST['login']));
            $password =abs((int) $_POST['password']);

            if (!Users::userExist($name, $password)) {
                $errors[]= "you should register first";
            } else {
                Session::sessionStart();
            }

            if (!empty($errors)) {
                $this->setData($errors);
            }

        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = trim(strip_tags($_POST['login']));
            $password = trim(strip_tags($_POST['password']));

            if (!Users::checkName($name)) {
                $errors[]= "login is too short";
            }

            if (!Users::checkPassword($password)) {
                $errors[]= "password is too short";
            }

            if (Users::getUserLogin($name)) {
                $errors[]= "this login already exist";
            } else {
                Users::setUser($name, $password);
            }

            if (!empty($errors)) {
                $this->setData($errors);
            }
        }
    }

    protected function logOut()
    {
        Session::sessionDestroy();
    }


}