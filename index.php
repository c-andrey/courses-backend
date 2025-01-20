<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

require_once __DIR__ . '/vendor/autoloader.php';

use Utils\Env;

Env::load(__DIR__ . '/.env');

require_once __DIR__ . '/src/Infrastructure/Http/Routes/routes.php';
