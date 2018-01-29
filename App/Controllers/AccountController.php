<?php
/**
 * User personal page
 */

namespace App\Controllers;


use App\Models\Users;
use Core\BaseController;
use Core\Router;
use Core\Session;

class AccountController extends BaseController
{
    public function view($id)
    {
        if (Session::keyExist('login')){
            $model = new Users();
            $user = $model->getUserInfo($id);
            $this->setData($user);
        } else {
            Router::redirect('/');
        }
    }
}