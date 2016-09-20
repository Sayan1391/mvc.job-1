<?php

/**
 * Created by PhpStorm.
 * @author Sayan
 * Date: 20.09.2016
 * Time: 18:56
 * @package system
 */
class Router
{
    /**
     * @author Sayan
     * @return array
     * Роутинг приложения
     */
    public function run()
    {
        $url = $_SERVER['REQUEST_URI'];

        $path = parse_url($url, PHP_URL_PATH);

        $parts = explode('/', $path);
        $controller = $parts[1];
        $action = $parts[2];

        $finalController = ucfirst($controller) . 'Controller';

        $finalAction = 'action' . ucfirst($action);

        return [$finalController, $finalAction];
    }
}