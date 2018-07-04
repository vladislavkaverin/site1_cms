<?php
/**
 * Created by PhpStorm.
 * User: ladik
 * Date: 02.07.18
 * Time: 0:12
 */
require_once dirname(__DIR__) . '/config/init.php';
require_once LIBS . '/functions.php';

use site1\App;

//экземпляр класса
new App();

//обращаемся к статическому свойству $app(объекту класса Registry), и вызываем у него метод getProperties()
debug(App::$app->getProperties());

