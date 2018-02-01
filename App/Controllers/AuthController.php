<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 05.01.18
 * Time: 12:19
 */

namespace App\Controllers;

use Core\BaseController;
use App\Models\Users;
use Core\RequestMethod;
use Core\Router;
use Core\Session;

class AuthController extends BaseController
{
    public $login='';
    public $password='';
    public $errors = [];

    public function login()
    {
        if (Session::keyExist('login')) {
            Router::redirect('/account/'.Session::getKey('login'));
        }

        if (RequestMethod::isPost()) {
            $login = $this->clearString($_POST['login']);
            $password = $this->clearString($_POST['password']);

            $user = new Users();

            if (!$user->authUser($login, $password)) {
                $errors[]= "you should register first";
            }

            Session::setKey('login', $login);
            Router::redirect('/account/'.$login);


            if (!empty($errors)) {
                $this->setData($errors);
            }

        }
    }

    public function register()
    {
        if (RequestMethod::isPost()) {
            $login = $this->clearString($_POST['login']);
            $password = $this->clearString($_POST['password']);

            if (!Users::checkName($login)) {
                $errors[]= "login is too short";
            }

            if (!Users::checkPassword($password)) {
                $errors[]= "password is too short";
            }

            $newUser = new Users();

            if ($newUser->getUserLogin($login)) {
                $errors[]= "this login already exist";
            }

            //регистрируем нового пользователя и редиректим в личный каибинет


            if (!empty($errors)) {
                $this->setData($errors);
            }
        }
    }

    public function clearString($string)
    {
        return strval(trim(strip_tags($string)));
    }

    protected function getHash($password)
    {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        return $hash;
    }

    public function logout()
    {
        $login = Session::getKey('login');
        $this->setData($login);
        Session::sessionDestroy();
    }

}