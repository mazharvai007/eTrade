<?php

require_once __DIR__ . '/../bootstrap/init.php';

$app_name = getenv('APP_NAME');

use Illuminate\Database\Capsule\Manager as Capsoule;

$user = Capsoule::table('users')->get();

//var_dump($user->toArray());