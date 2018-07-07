<?php
/**
 * Created by PhpStorm.
 * User: ladik
 * Date: 06.07.18
 * Time: 15:13
 */

namespace site1\base;


abstract class Controller
{
    //массив с текущим маршрутом(информация о controller, action, prefix)
    public $route;

    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $layout;

    //данные из контроллера в вид
    public $data = [];

    //метаданные(title, description, kwords)
    public $meta = ['title' => '', 'desc' => '', 'keywords' => ''];

    public function __construct($route)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];
    }

    public function getView(){
        $viewObject = new View($this->route, $this->layout, $this->view, $this->meta);
        $viewObject->render($this->data);
    }

    public function set($data){
        $this->data = $data;
    }

    public function setMeta($title = '', $desc = '', $keywords = ''){
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }

}