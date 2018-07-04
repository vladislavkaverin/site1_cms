<?php
/**
 * Created by PhpStorm.
 * User: ladik
 * Date: 04.07.18
 * Time: 16:04
 */

namespace site1;


class ErrorHandler
{
    //Выброс ошибок в зависимости от режима разработки
    public function __construct()
    {
        if (DEBUG){
            error_reporting(-1);
        }else {
            error_reporting(0);
        }
        //set_exception_handler - все исключения обрабатывает этот метод
        set_exception_handler([$this, 'exceptionHandler']);//exceptionHandler - моё исключение
    }

    //set_exception_handler - передает в этот метод обработку ошибки
    public function exceptionHandler($e){
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    //отправляем ошибку в файл
    protected function logErrors($message = '', $file = '', $line = ''){
        error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибки: 
        {$message} | Файл: {$file} | Строка: {$line}\n**************\n", 3, ROOT . '/tmp/errors.log');
    }

    //1) номер ошибки 2) текст ошибки 3) файл в котором ошибка 4) строка на которой ошибка 5) http код отправленый браузеру по умолчанию
    protected function displayError($errno, $errstr, $arrfile, $errline, $response = 404){
        http_response_code($response);//устанавливаем код ответа http
        if ($response == 404 && !DEBUG){
            require WWW . '/errors/404.php';
            die;
        }
        if(DEBUG){
            require WWW . '/errors/dev.php';
        }else {
            require  WWW . '/errors/prod.php';
        }
        die;
    }

}