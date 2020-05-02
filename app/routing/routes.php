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
 * *************
 * Admin Routes
 * *************
 */

$router->map( 'GET', '/admin', 'App\Controllers\Admin\DashboardController@show', 'admin_dashboard');
$router->map( 'POST', '/admin', 'App\Controllers\Admin\DashboardController@get', 'admin_form');

/*
 * *******************
 * Product Management
 * *******************
 */

$router->map( 'GET', '/admin/product/categories', 'App\Controllers\Admin\ProductCategoryController@show', 'product_category');
$router->map( 'POST', '/admin/product/categories', 'App\Controllers\Admin\ProductCategoryController@store', 'create_product_category');

/*
 * *********************
 * Edit/Update Category
 * *********************
 */

$router->map( 'POST', '/admin/product/categories/[i:id]/edit', 'App\Controllers\Admin\ProductCategoryController@edit', 'edit_product_category');