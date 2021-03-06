<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita4c8479e53af5427b5c4e40125af21cf
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'site1\\' => 6,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
        'R' => 
        array (
            'RedBeanPHP\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'site1\\' => 
        array (
            0 => __DIR__ . '/..' . '/site1/core',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'RedBeanPHP\\' => 
        array (
            0 => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita4c8479e53af5427b5c4e40125af21cf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita4c8479e53af5427b5c4e40125af21cf::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
