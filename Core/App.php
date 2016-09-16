<?php

require __DIR__ . '/../Controllers/FrontController.php';
/**
 * Created by PhpStorm.
 * User: Rabota
 * Date: 16.09.2016
 * Time: 12:01
 */
class App
{
    public static function run()
    {
        $FrontController = new FrontController();
        $FrontController->init();
    }

}