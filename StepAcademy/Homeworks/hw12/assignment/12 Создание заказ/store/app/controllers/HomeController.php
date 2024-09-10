<?php

class HomeController extends Controller {
    public function index() {
        require_once __DIR__ . '/../models/ProductModel.php';
        $productModel = new ProductModel();

        $this->view->render('home/index', [
            'title' => 'Главная страница',
            'items' => $productModel->getLastProducts()
        ]);
    }
}
