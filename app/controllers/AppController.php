<?php
/**
 * Created by PhpStorm.
 * User: ladik
 * Date: 06.07.18
 * Time: 15:28
 */

namespace app\controllers;


use app\models\AppModel;
use site1\base\Controller;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
    }
}