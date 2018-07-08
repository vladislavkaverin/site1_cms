<?php
/**
 * Created by PhpStorm.
 * User: ladik
 * Date: 05.07.18
 * Time: 13:47
 */

namespace app\controllers;


use site1\App;
use site1\Cache;

class MainController extends AppController
{
    public function indexAction(){
        $posts = \R::findAll('test');
        $this->setMeta("Site1", "descSetMeta", "keywordsSetMeta");
        $this->set(compact('posts'));

        $cache = Cache::instance();
        $cache->set('test1', $posts);
        $data = $cache->get('test');
        debug($data);
        //$cache->delete('test1');
    }
}