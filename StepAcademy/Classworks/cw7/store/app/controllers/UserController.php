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

    public function register() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = [
                "user_type" => "Customer",
                "first_name" => $_POST["first_name"],
                "last_name" => $_POST["last_name"],
                "phone" => $_POST["phone"],
                "email" => $_POST["email"],
                "password" => $_POST["password"],
            ];
            $confirm_password = $_POST["confirm_password"];
            if ($confirm_password != $data['password']) {
                $this->view->render('users/register', [
                    'title' => 'Register',
                    'error' => "Unable to register, your passwords don't match"
                ]);
                return;
            }
            $result = $this->model->registerUser($data);
            if ($result) {
                $_SESSION["user"] = $result;
                header("Location: /");
            } else {
                $this->view->render('users/register', [
                    'title' => 'Register',
                    'error' => 'Unable to register, maybe your email is already registered'
                ]);
            }
        } else {
            $this->view->render('users/register', [
                'title' => 'Register'
            ]);
        }
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
                    'title' => 'Login',
                    'error' => 'Неверный логин или пароль' // Рендерим страницу с сообщением об ошибке
                ]);
            }
        // Если к серверу не отправлен запрос:
        } else {
            $this->view->render('users/login', [
                'title' => 'Login'
            ]);
        }
    }

    public function logout() {
        unset($_SESSION['user']);
        header("Location: /");
    }
}

?>