<?php

require_once __DIR__ . '/../bootstrap/init.php';

$app_name = getenv('APP_NAME');

var_dump(in_array('mod_rewrite', apache_get_modules()));