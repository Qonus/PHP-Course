<?php

ini_set("display_errors", 1);

session_start();

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

$route->add('/products/', function() {
    loadController('ProductController');
    $controller = new ProductController();
    $controller->index();
});

$route->add('/products/{id}/', function($id) {
    loadController('ProductController');
    $controller = new ProductController();
    $controller->show($id);
});

$route->add('/login/', function() {
    loadController('UserController');
    $controller = new UserController();
    $controller->login();
});

$route->add('/signup/', function() {
    loadController('UserController');
    $controller = new UserController();
    $controller->signup();
});

$route->add('/logout/', function() {
    loadController('UserController');
    $controller = new UserController();
    $controller->logout();
});

$route->add('/cart/', function() {
    loadController('CartController');
    $controller = new CartController();
    $controller->index();
});

$route->add('/cart/add/{id}/', function($id) {
    loadController('CartController');
    $controller = new CartController();
    $controller->add($id);
});

$route->add('/checkout/', function() {
    loadController('CartController');
    $controller = new CartController();
    $controller->checkout();
});

$route->add('/checkout/confirm/', function() {
    loadController('CartController');
    $controller = new CartController();
    $controller->confirm();
});

$route->add('/cart/remove/{id}/', function($id) {
    loadController('CartController');
    $controller = new CartController();
    $controller->remove($id);
});

$route->add('/cart/set/{id}/{quantity}/', function($id, $quantity) {
    loadController('CartController');
    $controller = new CartController();
    $controller->set($id, $quantity);
});

$route->add('/cart/clear/', function() {
    loadController('CartController');
    $controller = new CartController();
    $controller->clear();
});

// Получение URI
$uri = $_SERVER['REQUEST_URI'];
$route->dispatch($uri);