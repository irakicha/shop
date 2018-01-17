<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 17.01.18
 * Time: 11:53
 */

namespace Core;


class Db
{
    private $pdo;
    private static $instance;

    protected function __construct()
    {
        $connection = require_once APP_PATH."config/config.php";
        $this->pdo = new \PDO($connection['dsn'], $connection['user'], $connection['password']);
    }

    public static function instance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /*
     * @return bool
     * */
    public function execute($sql)
    {
        $query = $this->pdo->prepare($sql);
        return $query->execute();
    }

    public function query($sql){
        $query = $this->pdo->prepare($sql);
        $result = $query->execute();
        if ($result) {
            return $result->fetchAll();
        } else {
            return false;
        }
    }
}