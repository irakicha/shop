<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 19.12.17
 * Time: 12:55
 */

class ErrorHandler
{
     protected function initHandlers ()
     {
         set_error_handler([$this, 'customErrorHandler']);
         set_exception_handler([$this, 'customExceptionHandler']);
     }

     protected function customErrorHandler($errno, $errstr, $errfile, $errline){
         if(error_reporting() == 0){
             return false;
         }
         $this ->showCustomHandler($errno, $errstr, $errfile, $errline);
        return true;

     }

     protected function customExceptionHandler($exeption){
        $this ->showCustomException($exeption);
     }

     public function showCustomHandler($errno, $errstr, $errfile, $errline){
         switch ($errno) {
             case E_USER_ERROR:
                 echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
                 echo "  Фатальная ошибка в строке $errline файла $errfile";
                 echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
                 echo "Завершение работы...<br />\n";
                 exit(1);
                 break;

             case E_USER_WARNING:
                 echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
                 break;

             case E_USER_NOTICE:
                 echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
                 break;

             default:
                 return false;
                 break;
         }
     }

     public function showCustomException($exception){
         echo '<h1>Uncaught exception'.get_class($exception)."</h1>\n";
         echo '<p>'.$exception->getMessage().' ('.$exception->getFile().':'.$exception->getLine().')</p>';
         echo '<pre>'.$exception->getTraceAsString().'</pre>';
     }
}