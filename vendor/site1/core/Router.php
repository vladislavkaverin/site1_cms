<?php
/**
 * Created by PhpStorm.
 * User: ladik
 * Date: 05.07.18
 * Time: 11:43
 */

namespace site1;


class Router
{
    //таблица маршрутов
    protected static $routes = [];
    //текущий маршрут
    protected static $route = [];

    //записывает правила в таблицу маршрутов
    public static function add($regexp, $route = []){
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes(){
        return self::$routes;
    }

    public static function getRoute(){
        return self::$route;
    }

    public static function dispatch($url){
        $url = self::removeQueryString($url);
        if (self::matchRoute($url)){
            $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
            //проверка, существует ли класс для подключения
            if (class_exists($controller)){

                //создаём объект контроллера
                $controllerObject = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if (method_exists($controllerObject, $action)){
                    //вызываем его метод
                    $controllerObject->$action();
                    //вызываем объект базового контроллера для отображения страницы
                    $controllerObject->getView();
                }else {
                    throw new \Exception("Метод $controller::$action не найден", 404);
                }
            }else {
                throw new \Exception("Контроллер {$controller} не найден", 404);
            }
        }else {
            throw new \Exception('Страница не найдена', 404);
        }
    }

    public static function matchRoute($url){
        foreach (self::$routes as $pattern => $route){
            if (preg_match("#($pattern)#", $url, $matches)){
                foreach ($matches as $k => $v){
                    if (is_string($k)){
                        $route[$k] = $v;
                    }
                }

                //action по умолчанию
                if (empty($route['action'])){
                    $route['action'] = 'index';
                }

                if (!isset($route['prefix'])){
                    $route['prefix'] = '';
                }else {
                    $route['prefix'] .= '\\';
                }

                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    //CamelCase
    protected static function upperCamelCase($name){
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    //camelCase
    protected static function lowerCamelCase($name){
        return lcfirst(self::upperCamelCase($name));
    }

    protected static function removeQueryString($url){
        if ($url){
            $params = explode('&', $url, 2);
            if (false === strpos($params[0], '=')){
                return rtrim($params[0], '/');
            }else {
                return '';
            }
        }
    }

}