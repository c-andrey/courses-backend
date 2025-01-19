<?php

namespace Utils;

class Env
{
    public static function load(string $filePath)
    {
        if (!file_exists($filePath)) {
            throw new \Exception("Arquivo .env não encontrado: {$filePath}");
        }

        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            if (str_starts_with(trim($line), '#')) {
                continue;
            }

            list($name, $value) = explode('=', $line, 2);

            $name = trim($name);
            $value = trim($value);
            putenv("{$name}={$value}");
        }
    }

    public static function get(string $key, $default = null)
    {
        $value = getenv($key);
        return $value !== false ? $value : $default;
    }
}
