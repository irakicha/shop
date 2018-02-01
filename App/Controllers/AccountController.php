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
    public function view($id)
    {
        if (!self::isAuth()) {
            Router::redirect('/');
        }

        $model = new Users();
        $user = $model->getUserInfo($id);
        $this->setData($user);
    }
}
