<?php

ini_set("display_errors", 1);

require_once __DIR__ . '/../app/bootstrap.php';

// Определение функции для подключения контроллеров
function loadController($controllerName) {
    $filePath = __DIR__ . '/../app/Controllers/' . $controllerName . '.php';
    if (file_exists($filePath)) {
        require_once $filePath;
    } else {
        throw new Exception("Controller file not found: " . $filePath);
    }
}

$route = new Route();

// Добавление маршрутов
$route->add('/', function() {
    loadController('HomeController');
    $controller = new HomeController();
    $controller->index();
});

$route->add('/product/', function() {
    loadController('ProductController');
    $controller = new ProductController();
    $controller->index();
});

$route->add('/product/{id}/', function($id) {
    loadController('ProductController');
    $controller = new ProductController();
    $controller->show($id);
});

// Получение URI
$uri = $_SERVER['REQUEST_URI'];
$route->dispatch($uri);