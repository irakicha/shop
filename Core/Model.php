<?php
/**
 *  * */

namespace Core;


abstract class Model
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this ->pdo = Db::instance();
    }

    public function query($sql)
    {
        return $this->pdo->execute($sql);
    }

    /*
     * Select all records from $table
     * */
    public function findAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->fetchAll($sql);
    }

    /*
     * Select one record from $table according id
     * */
    public function findOne($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id=?";
        return $this->pdo->fetchOne($sql, [$id]);
    }

    /*
     * Disconnect PDO
     * */
    public function disconnect ()
    {
        if ($this->pdo) {
            $this->pdo = null;
        }
    }
}