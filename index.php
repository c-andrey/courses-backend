<?php

require_once __DIR__ . '/vendor/autoloader.php';

use Utils\Env;

Env::load(__DIR__ . '/.env');

require_once __DIR__ . '/src/Infrastructure/Http/Routes/routes.php';