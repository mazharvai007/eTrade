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

/*
 * Admin Routes
 */
$router->map( 'GET', '/admin', 'App\Controllers\Admin\DashboardController@show', 'admin_dashboard');
$router->map( 'POST', '/admin', 'App\Controllers\Admin\DashboardController@get', 'admin_form');