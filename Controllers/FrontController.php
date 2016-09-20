<?php

require '/../Core/Components/Router.php';

/**
 * Created by PhpStorm.
 * @author Sayan
 * Date: 20.09.2016
 * Time: 18:56
 * @package controllers
 */
class FrontController
{
    /**
     * @author Sayan
     * запускаем метод run() в Router
     */
    public static function init()
    {
        $router = new Router();

        $routeData = $router->run();

        $controller = $routeData[0];
        $action = $routeData[1];

        $cont = __DIR__. '/' . $controller . '.php';

        include $cont;

        $objController = new $controller;
        $objController->$action();
    }
}