<?php

class HomeController extends Controller {
    public function index() {
        require_once __DIR__ . '/../models/ProductModel.php';

        try {
            $productModel = new ProductModel();
            $products = $productModel->getLastProducts();
            
            if ($products) {
                $this->view->render('home/index', [
                    'title' => 'Home',
                    'products' => $products,
                ]);
            } else {
                // Обработка ситуации, когда продукты не найден
                echo "Products not found.";
            }
        } catch (Exception $e) {
            // Обработка ошибки, если произошла ошибка при поиске продукта или рендеринге шаблона
            echo "Error: " . $e->getMessage();
        }
    }
}
