<?php
//echo '13';

$url = $_SERVER['REQUEST_URI'];

$path = parse_url($url, PHP_URL_PATH);

$parts = explode('/', $path);
$controller = $parts[1];
$action = $parts[2];

$finalController = ucfirst($controller) . 'Controller';

$finalAction = 'action' . ucfirst($action);

$cont = __DIR__ . '/Controllers/' . $finalController . '.php';

include $cont;

$objController = new $finalController;

$as = $objController->$finalAction();