<?php
/**
 * Created by PhpStorm.
 * User: ladik
 * Date: 08.07.18
 * Time: 17:31
 */

namespace site1;


class Cache
{
    use TSingletone;

    //запись в кеш
    public function set($key, $data, $seconds = 3600)
    {
        if ($seconds){
            $content['data'] = $data;
            //время, на которое кешируем данные
            $content['end_time'] = time() + $seconds;
            if (file_put_contents(CACHE . '/' . md5($key) . '.txt', serialize($content))){
                return true;
            }

        }
        return false;
    }

    //получение данных из кеша
    public function get($key)
    {
        $file = CACHE . '/' . md5($key) . '.txt';
        if (file_exists($file)){
            $content = unserialize(file_get_contents($file));
            if (time() <= $content['end_time']){
                return $content;
            }
            unlink($file);
        }
        return false;
    }

    //удаление из кеша
    public function delete($key)
    {
        $file = CACHE . '/' . md5($key) . '.txt';
        if (file_exists($file)) {
            unlink($file);
        }
    }

}