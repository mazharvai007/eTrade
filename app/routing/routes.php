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


$router->map( 'GET', '/', 'App\Controllers\IndexController@show', 'home');