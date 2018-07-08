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
        $posts = \R::findAll('test');
        //debug($posts);
        //debug($this->route);
        $this->setMeta("Site1", "descSetMeta", "keywordsSetMeta");
        $this->set(compact('posts'));
    }
}