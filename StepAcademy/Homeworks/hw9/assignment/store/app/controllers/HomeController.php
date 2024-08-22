<?php

class HomeController extends Controller {
    public function index() {
        // Логика для домашней страницы
        $this->view->render('home/index');

    }
}
