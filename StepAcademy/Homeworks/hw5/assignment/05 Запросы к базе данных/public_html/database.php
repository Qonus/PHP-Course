<?php

$host = "localhost";  // Имя сервера, по умолчанию — localhost
$db = "online_store"; // Название базы данных, может отличаться
$user = "root";       // Имя пользователя, по умолчанию — root
$pass = "";           // Пароль, по умолчанию — пустые кавычки
$charset = "utf8mb4"; // Кодировка, utf8mb4 — универсальная

// Определение имени источника данных (data source name):
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Попытка подключения:
try {
    // Создание подключения к базе данных:
    $pdo = new PDO($dsn, $user, $pass);
    // Завершение работы файла и передача
    // значения переменной в другой файл:
    return $pdo;
}
// Обработка исключения:
catch (PDOException $e) {
    // Обработка ошибки подключения:
    die("Connection failed" . $e->getMessage());
}