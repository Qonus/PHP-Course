<?php

declare(strict_types());

class Database {
    private static ?Databse $instance = null;
    private ?PDO $connection = null;

    private function __construct() {
        $config = require "app/config/database.php";
        $dsn = "mysql:host=$config['host'];dbname=$config['dbname'];charset=$config['charset']";
        
        $username = $config('username')
        $password = $config('password')

        try {
            $this->connection = new PDO($dsn, $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            error_log("Database connection error: {$e->getMessage()}");
            throw new Exception("Database connection error.");
        }
    }

    public static function getDatabase(): 
}

?>