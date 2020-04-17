<?php

/*
 * *********************************
 * Instantiate the AltoRouter class
 * ********************************
 */

$router = new AltoRouter();

/*
 * **************************************
 * Using map method for the fetch routing
 * *************************************
 */

$router->setBasePath('');

$router->map( 'GET', '/', '', 'home');
$match = $router->match();

if ($match) {

    require_once __DIR__ . '/../controllers/BaseController.php';
    require_once __DIR__ . '/../controllers/IndexController.php';

    $index = new App\Controllers\IndexController();
    $index->show();
} else {
    header($_SERVER['SERVER_PROTOCOL'] . '404 Not Found');
    echo "Page not found";
}