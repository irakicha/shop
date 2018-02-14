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
            $email = $this->clearString($_POST['email']);
            $login = $this->clearString($_POST['login']);
            $password = $this->clearInt($_POST['password']);
            $phone = $this->clearInt($_POST['phone']);
            $city = $this->clearString($_POST['city']);
            $address = $this->clearString($_POST['address']);
            $zipCode = $this->clearString($_POST['zip-code']);

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

            $newUser->registerUser($email, $login, $password, $phone, $city, $address, $zipCode);

            $newUser->authUser($email, $login);

            Session::setKey('login', $login);
            Router::redirect('/account/'.$login);

            if (!empty($errors)) {
                $this->setData($errors);
            }
        }
    }

    public function logout()
    {
        Session::sessionDestroy();
        Router::redirect('/');
    }

    public function clearString($string)
    {
        return strval(trim(strip_tags($string)));
    }

    public function clearInt($data)
    {
        return abs((int)$data);
    }

    protected function getHash($password)
    {
        $hash = password_hash($this->clearString($password), PASSWORD_BCRYPT);
        return $hash;
    }
}
