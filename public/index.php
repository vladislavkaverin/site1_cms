<?php
/**
 * Created by PhpStorm.
 * User: ladik
 * Date: 02.07.18
 * Time: 0:12
 */
require_once dirname(__DIR__) . '/config/init.php';
require_once LIBS . '/functions.php';
require_once CONF . '/routes.php';

use site1\App;
use site1\Router;

//экземпляр класса
new App();
