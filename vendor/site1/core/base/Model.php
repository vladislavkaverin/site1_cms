<?php
/**
 * Created by PhpStorm.
 * User: ladik
 * Date: 07.07.18
 * Time: 11:37
 */

namespace site1\base;


use site1\Db;

abstract class Model
{
    //массив свойств модели
    public $attributes = [];
    public $errors = [];
    //для правил валидации данных
    public $rules = [];

    public function __construct()
    {
        Db::instance();
    }

}