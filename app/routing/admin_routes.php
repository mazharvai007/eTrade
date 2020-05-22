<?php

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
 * ****************************
 * Edit/Update/Delete Category
 * ****************************
 */

$router->map( 'POST', '/admin/product/categories/[i:id]/edit', 'App\Controllers\Admin\ProductCategoryController@edit', 'edit_product_category');
$router->map( 'POST', '/admin/product/categories/[i:id]/delete', 'App\Controllers\Admin\ProductCategoryController@delete', 'delete_product_category');

/*
 * ***************
 * Sub Categories
 * ***************
 */

$router->map( 'POST', '/admin/product/subcategory/create', 'App\Controllers\Admin\SubCategoryController@store', 'create_subcategory');
$router->map( 'POST', '/admin/product/subcategory/[i:id]/edit', 'App\Controllers\Admin\SubCategoryController@edit', 'edit_subcategory');
$router->map( 'POST', '/admin/product/subcategory/[i:id]/delete', 'App\Controllers\Admin\SubCategoryController@delete', 'delete_subcategory');

/*
 * ****************
 * Manage Products
 * ****************
 */

$router->map( 'GET', '/admin/category/[i:id]/selected', 'App\Controllers\Admin\ProductController@getSubCategories', 'selected_category');

$router->map( 'GET', '/admin/product/create', 'App\Controllers\Admin\ProductController@showCreateProductForm', 'create_product_form');
$router->map( 'POST', '/admin/product/create', 'App\Controllers\Admin\ProductController@store', 'create_product');

$router->map( 'GET', '/admin/products', 'App\Controllers\Admin\ProductController@show', 'show_products');