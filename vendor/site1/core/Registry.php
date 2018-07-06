<?php
/**
 * Created by PhpStorm.
 * User: ladik
 * Date: 02.07.18
 * Time: 18:00
 */

namespace site1;


class Registry
{
    //создаём $instance(объект)
    use TSingletone;

    //сюда(в контейнер) складываем все свойства
    private static $properties = [];

    //ложим в контейнер
    public function setProperty($name, $value){
        self::$properties[$name] = $value;
    }

    //получаем свойство из контейнера
    public function getProperty($name){
        if (isset(self::$properties[$name])){
            return self::$properties[$name];
        }
        return null;
    }

    //печать всех доступных свойств
    public function getProperties(){
        return self::$properties;
    }

}