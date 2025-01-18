<?php

spl_autoload_register(function ($class) {
    // Caminho base para o namespace
    $baseDir = dirname(__DIR__) . '/src/';

    // Substituir o namespace pelo caminho do arquivo
    $relativeClass = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    // Construir o caminho completo
    $file = $baseDir . $relativeClass . '.php';

    // Incluir o arquivo se existir
    if (file_exists($file)) {
        require_once $file;
    } else {
        die("Erro: A classe '{$class}' não foi encontrada no caminho esperado: {$file}");
    }
});
