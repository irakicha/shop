<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 25.03.18
 * Time: 0:17
 */

namespace App\Controllers;

use App\Models\Order;
use App\Models\Storage;
use App\Models\Users;
use Core\BaseController;
use Core\Router;
use Core\Session;

class OrderController extends BaseController
{

    public function view($order_id)
    {
        $orderModel = new Order();
        $data['orderUser'] = $orderModel->getOrderUserInfo($order_id);
        $data['orderStatus'] = $orderModel->getOrderStatus();
        $data['order'] = $orderModel->showOrderProducts($order_id);
        $data['orderTotalSum'] = $orderModel->getOrderTotalSum($order_id);
        $this->setData($data);
    }

    public function create()
    {
        if (!self::isAuth()) {
            Router::redirect('/auth/login');
        }

        $productsInCart = Storage::productsInCart();

        if (empty($productsInCart)) {
            Router::redirect('/');
        }

        $user = new Users();

        $userId = $user->getUserId(Session::getKey('login'));

        $orderModel = new Order();

        $orderModel->addNewOrder($userId, $productsInCart);

        unset($_SESSION['cart']);

        Router::redirect('/order/view/'.$orderModel->order_id);
    }

}