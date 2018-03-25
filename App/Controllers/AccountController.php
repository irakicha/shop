<?php
/**
 * User personal page
 */

namespace App\Controllers;


use App\Models\Users;
use Core\BaseController;
use Core\Router;

class AccountController extends BaseController
{
    public function view($login)
    {
        if (!self::isAuth()) {
            Router::redirect('/');
        }

        $model = new Users();
        $user = $model->getUserInfo($login);
        $this->setData($user);
    }
}
