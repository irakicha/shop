<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 20.12.17
 * Time: 13:27
 */


class Storage
{
    private $storage;

    public function __construct(array $storage)
    {
        $this->storage = $storage;
    }

    public function getData(){

        return $this ->storage;
    }
}