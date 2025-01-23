<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

require_once __DIR__ . '/vendor/autoloader.php';

use Utils\Env;

Env::load(__DIR__ . '/.env');

require_once __DIR__ . '/src/Infrastructure/Http/Routes/routes.php';
