<?php

class UserController extends Controller {

    public function __construct() {
        parent::__construct();
        require_once __DIR__ . '/../models/UserModel.php';
        $this->model = new UserModel;
    }

    public function index() {
        // Здесь будет личный кабинет пользователя
    }

    public function login() {
        // Если к серверу отправлен POST-запрос
        if ($_SERVER["REQUEST_METHOD"] === "POST") { 
            $email = $_POST["email"]; // Получаем данные из POST-запроса
            $password = $_POST["password"]; // Получаем пароль из POST-запроса
            $result = $this->model->authUser($email, $password); // Получаем информацию из базы данных
            if ($result) { // Если пользователь найден
                $_SESSION["user"] = $result; // Сохраняем информацию о пользователе в сессии
                header("Location: /"); // Перенаправляем пользователя на главную страницу
            // Если пользователь не найден
            } else {
                $this->view->render('users/login', [
                    'title' => 'Вход',
                    'error' => 'Неверный логин или пароль' // Рендерим страницу с сообщением об ошибке
                ]);
            }
        // Если к серверу не отправлен запрос:
        } else {
            $this->view->render('users/login', [
                'title' => 'Вход'
            ]);
        }
    }

    public function logout() {
        unset($_SESSION["user"]); // Удаляем информацию о пользователе из сессии
        header("Location: /"); // Перенаправляем пользователя на главную страницу
    }
}