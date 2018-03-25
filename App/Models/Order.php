<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 25.03.18
 * Time: 0:19
 */

namespace App\Models;

use Core\Model;

class Order extends Model
{

    public $table = 'orders';

    public $productToOrderTable = 'products_to_orders';

    public $order_id;

    private $order_status = "new";

    public $userRole = 1;


    public function addNewOrder($userId, $products)
    {
        $this->query("INSERT INTO {$this->table} (user_id, order_status) VALUES ($userId, '{$this->order_status}')");
        $this->order_id = $this->getLastInsertId();
        $this->insertProducts($this->order_id, $products);
    }

    public function showOrderProducts($orderId)
    {
        $orderDetails = $this->findSql("SELECT
		                            p.title,
		                            p.image,
                                    po.qty,
                                    po.product_price AS price,
                                    po.product_price * po.qty AS subtotal
                FROM products_to_orders AS po    
                INNER JOIN products AS p ON po.product_id = p.id 
                AND po.order_id = $orderId;
       ");
        return $orderDetails;
    }

    public function getOrderStatus()
    {
        return $this->order_status;
    }

    public function setOrderStatus($newStatus)
    {
        return $this->order_status = $newStatus;
    }

    public function getOrderUserInfo($orderId)
    {
        list($orderUserInfo) = $this->findSql("SELECT u.email,
                                   u.login,
                                   u.phone,
                                   u.city,
                                   u.address,
                                   u.zip_code AS zip
                            FROM users AS u
                            INNER JOIN {$this->table} AS o ON o.user_id = u.id
                            AND o.id = $orderId");
        return $orderUserInfo;
    }

    public function getOrderTotalSum($orderId)
    {
        list($orderTotalSum) = $this->findSql("SELECT SUM(product_price * qty) AS total FROM {$this->productToOrderTable} WHERE order_id = $orderId");
        return $orderTotalSum['total'];
    }


    protected function insertProducts($orderId, $products)
    {
        $storage = new Storage();

        foreach ($products as $id => $qty) {
            $productPrice = $storage->getProductPrice($id);
            $params = [$id, $qty, $productPrice, $orderId];
            $this->query("INSERT INTO {$this->productToOrderTable} (product_id, qty, product_price,  order_id) VALUES (?, ?, ?, ?)", $params);
        }
    }

}