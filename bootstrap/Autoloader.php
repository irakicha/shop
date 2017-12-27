<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 26.12.17
 * Time: 13:05
 */

class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($class) {
            $file = ROOTPATH."/".str_replace('\\','/',$class) . '.php';
            if (file_exists($file)) {
                require $file;
                return true;
            }
            return false;
        });

    }
}