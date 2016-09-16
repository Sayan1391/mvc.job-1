<?php

require '/../Core/Components/Router.php';

class FrontController
{
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