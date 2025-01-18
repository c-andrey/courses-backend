<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Origin: *");

require_once __DIR__ . '/vendor/autoloader.php';
require_once __DIR__ . '/src/Infrastructure/Http/Routes/routes.php';
