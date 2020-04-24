<?php

/*
 * *************************************
 * Start session if not already started
 * *************************************
 */

if (!isset($_SESSION)) session_start();

/*
 * **************************
 * Load Environment variable
 * **************************
 */

require_once __DIR__ . '/../app/config/_env.php';

/*
 * **************************
 * Instantiate Database Class
 * **************************
 */

new \App\Classes\Database();

/*
 * Set custom error handler
 */

set_error_handler([new App\Classes\ErrorHandler(), 'handleErrors']);

require_once __DIR__ . '/../app/routing/routes.php';

new \App\RouteDispatcher($router);