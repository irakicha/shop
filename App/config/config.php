<?php
/**
 *
 */

return[
    'dsn' => 'mysql:host=localhost;dbname=shop;charset=utf8',
    'user' => 'shop_root',
    'password' => '666666',
    'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]
];
