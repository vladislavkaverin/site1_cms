<?php
/**
 * Created by PhpStorm.
 * User: ladik
 * Date: 02.07.18
 * Time: 11:33
 */

namespace site1;


class App
{
    public static $app;

    public function __construct()
    {
        $query = trim($_SERVER['QUERY_STRING'], '/');
        session_start();

        /**$app - через него получаем доступ к параметрам(свойствам), можем положить в него параметры(свойства), объекты**/
        //self::$app - объект, класса Registry
        self::$app = Registry::instance();

        //заполняем контейнер $app данными из params.php
        $this->getParams();

        //Создаём объект класса исключений
        new ErrorHandler();

        Router::dispatch($query);

    }

    protected function getParams(){
        //массив из params.php
        $params = require_once CONF . '/params.php';
        if (!empty($params)){
            foreach ($params as $k => $v) {
                self::$app->setProperty($k, $v);
            }
        }
    }

}