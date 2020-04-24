<?php

/*
 * *********************************
 * Instantiate the AltoRouter class
 * ********************************
 */

$router = new AltoRouter();

/*
 * Base Path
 */

$router->setBasePath('');


/*
 * **************************************
 * Using map method for the fetch routing
 * *************************************
 */

$router->map( 'GET', '/', 'App\Controllers\IndexController@show', 'home');