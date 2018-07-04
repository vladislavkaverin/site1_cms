<?php
/**
 * Created by PhpStorm.
 * User: ladik
 * Date: 02.07.18
 * Time: 18:01
 */

namespace site1;


trait TSingletone
{

    //создание объекта в одиночном экземпляре
    private static $instance;

    public static function instance(){
        if(self::$instance === null){
            self::$instance = new self; //create MyClass object
        }
        return self::$instance;
    }

}