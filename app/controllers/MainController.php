<?php
/**
 * Created by PhpStorm.
 * User: ladik
 * Date: 05.07.18
 * Time: 13:47
 */

namespace app\controllers;


use site1\App;

class MainController extends AppController
{
    public function indexAction(){
        //debug($this->route);
        $this->setMeta(App::$app->getProperty('shop_name'), "descSetMeta", "keywordsSetMeta");
    }
}