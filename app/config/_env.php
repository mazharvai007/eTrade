<?php

// Define base path
define('BASE_PATH', realpath(__DIR__.'/../../'));

// Load autoload file
require_once __DIR__.'/../../vendor/autoload.php';

// Assign base path into dot env
$dotEnv = Dotenv\Dotenv::createImmutable(BASE_PATH);

// Use load method
$dotEnv->load();