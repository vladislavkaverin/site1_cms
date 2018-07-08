<?php
/**
 * Created by PhpStorm.
 * User: ladik
 * Date: 06.07.18
 * Time: 15:35
 */

namespace site1\base;


class View
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
    public $meta = [];

    public function __construct($route, $layout = '', $view = '', $meta)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $view;
        $this->prefix = $route['prefix'];
        $this->meta = $meta;
        if ($layout === false){
            $this->layout = false;
        }else {
            $this->layout = $layout ?: LAYOUT;
        }
    }

    // отображает данные во view
    public function render($data){
        //записываем данные из массива в переменную
        if(is_array($data)) extract($data);
        $viewFile = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}.php";
        if (is_file($viewFile)){
            //буферизация
            ob_start();
            require_once $viewFile;
            //всё из буфера в $content
            $content = ob_get_clean();
        }else {
            throw new \Exception("Не найден вид {$viewFile}", 500);
        }
        if (false !== $this->layout){
            //подключение шаблона
            $layoutFile = APP . "/views/layouts/{$this->layout}.php";
            if (is_file($layoutFile)){
                require_once $layoutFile;
            }else {
                throw new \Exception("Не найден шаблон {$this->layout}", 500);
            }
        }
    }

    public function getMeta(){
        $title = $this->meta['title'];
        $desc = $this->meta['desc'];
        $keywords = $this->meta['keywords'];

        return "<title>{$title}</title>
                <meta name=\"description\" content=\"{$desc}\">
                <meta name=\"keywords\" content=\"{$keywords}\">";
    }

}