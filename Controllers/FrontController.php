<?php

require '../Core/Components/Router.php';

class FrontController
{
    public static function init()
    {
        $router = new Router();

        $routeData = $router->run();

        //...
        // Создание контроллера и вызов у него действия
    }

}