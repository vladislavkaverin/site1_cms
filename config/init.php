<?php
/**
 * Created by PhpStorm.
 * User: ladik
 * Date: 02.07.18
 * Time: 1:22
 */


define("DEBUG", 1);//отладка включена по умолчанию = 1
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", '/vendor/site1/core');
define("LIBS", ROOT . '/vendor/site1/core/libs');
define("CACHE", ROOT . '/tmp/cache');
define("CONF", ROOT . "/config");
define("LAYOUT", 'default');


//select protocol https or http
if (isset($_SERVER['HTTPS']))
    $protocol = $_SERVER['HTTPS'];
else
    $protocol = '';
if (($protocol) && ($protocol != 'off'))
    $protocol = 'https://';
else
    $protocol = 'http://';


//http://site1/public/index.php
$app_path = "{$protocol}{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
//http://site1/public/
$app_path = preg_replace("#[^/]+$#", '', $app_path);
//http://site1
$app_path = str_replace("/public/", '', $app_path);

//path to the site
define("PATH", $app_path);

define("ADMIN", PATH . '/admin');

//composer
require_once ROOT . '/vendor/autoload.php';