<?php

namespace Infrastructure\Database;

use PDO;
use PDOException;
use Utils\Env;

class DatabaseConnection
{
    private static ?PDO $connection = null;

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            try {
                $dbHost = Env::get('DB_HOST');
                $dbName = Env::get('DB_NAME');
                $dbUser = Env::get('DB_USER');
                $dbPass = Env::get('DB_PASSWORD');

                self::$connection = new PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName, $dbUser, $dbPass);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Erro na conexão com o banco de dados: ' . $e->getMessage());
            }
        }

        return self::$connection;
    }
}