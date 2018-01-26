<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 05.01.18
 * Time: 12:19
 */

namespace App\Controllers;

use Core\Auth;
use Core\BaseController;
use App\Models\Users;
use Core\Controller;
use Core\Router;
use Core\Session;


class AuthController extends Controller 
{
    public $name='';
    public $password='';
    public $errors = [];
    public $is_auth = true;

    public function login()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $login = $this->clearString($_POST['login']);
            $password = $this->clearString($_POST['password']);

            $user = new Users();

            if (!$user->authUser($login, $password)) {
                $errors[]= "you should register first";
            } else {
                Session::setKey('user', $login);
                Session::setKey('user', $login);
//                Router::redirect('/user/view');

                return true;
            }

            if (!empty($errors)) {
                $this->setData($errors);
            }

        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $login = $this->clearString($_POST['login']);
            $password = $this->clearString($_POST['password']);

            if (!Users::checkName($login)) {
                $errors[]= "login is too short";
            }

            if (!Users::checkPassword($password)) {
                $errors[]= "password is too short";
            }

            $new_user = new Users();

            if ($new_user->getUserLogin($login)) {
                $errors[]= "this login already exist";
            } else {
                echo $new_user->getUserLogin($login);
            }

            if (!empty($errors)) {
                $this->setData($errors);
            }
        }
    }

    public function clearString ($string)
    {
        return strval(trim(strip_tags($string)));
    }

    function getHash($password){
        $hash = password_hash($password, PASSWORD_BCRYPT);
        return $hash;
    }

    public function logout()
    {
        Session::sessionDestroy();
    }


}