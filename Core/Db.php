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

    private function __construct()
    {
        $connection = require_once APP_PATH."config/config.php";
        $this->pdo = new \PDO($connection['dsn'], $connection['user'], $connection['password'], $connection['options']);
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

    /*
     * @return array
     * */
    public function fetchAll($sql){

        $query = $this->pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }


    /*
     * @return array
     * */
    public function fetchOne($sql, $params=[]){

        $query = $this->pdo->prepare($sql);
        $query->execute($params);
        return $query->fetch();

    }


}