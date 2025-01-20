<?php

spl_autoload_register(function ($class) {
    $baseDir = dirname(__DIR__) . '/src/';

    $relativeClass = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    $file = $baseDir . $relativeClass . '.php';

    if (file_exists($file)) {
        require_once $file;
    } else {
        die("Erro: A classe '{$class}' não foi encontrada no caminho esperado: {$file}");
    }
});
