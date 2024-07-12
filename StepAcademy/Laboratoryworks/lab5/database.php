<?php
    $host = "localhost";
    $db = "online_store";
    $user = "root";
    $pass = "";
    $charset = "utf8mb4";

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try {
        $pdo = new PDO($dsn, $user, $pass);
        return $pdo;
    }
    catch (PDOException $e) {
        die("Connection failed : " . $e->getMessage());
    }
?>