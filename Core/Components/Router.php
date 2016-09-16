<?php

class Router
{
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