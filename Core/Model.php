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
     * Select all records according Sql query
     * */
    public function findSql($sql, $params=[]){
        return $this->pdo->query($sql, $params);
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
     * Select all records from $table where field = $field
     * */
    public function findAllParams($field, $value)
    {
        $sql = "SELECT * FROM {$this->table} WHERE $field = ?";
        return $this->pdo->fetchAll($sql, [$value]);
    }

    /*
     * Select one record from $table according value
     * */
    public function findOne($field, $value)
    {
        $sql = "SELECT * FROM {$this->table} WHERE $field = ?";
        return $this->pdo->fetchOne($sql, [$value]);
    }

    /*
     * Select one record from $table according column name and value
     * */
    public function findOneByColumn($col, $field,$value)
    {
        $sql = "SELECT $col FROM {$this->table} WHERE $field = ?";
        return $this->pdo->fetchOne($sql, [$value]);
    }

    /*
     * Select one column from query
     * */

    public function findColumn($column)
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->fetchColumn($sql,$column);
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