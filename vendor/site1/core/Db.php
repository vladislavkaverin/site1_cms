<?php
/**
 * Created by PhpStorm.
 * User: ladik
 * Date: 07.07.18
 * Time: 11:50
 */

namespace site1;


class Db
{
    use TSingletone;

    protected function __construct()
    {
        $db = require_once CONF . '/config_db.php';
    }

}