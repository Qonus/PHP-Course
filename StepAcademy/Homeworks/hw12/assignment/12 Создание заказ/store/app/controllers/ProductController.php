<?php

class ProductController extends Controller {

    public function __construct() {
        parent::__construct();
        require_once __DIR__ . '/../models/ProductModel.php';
        $this->model = new ProductModel();
    }

    public function index() {
        try {
            $items = $this->model->getAllProducts();
            $this->view->render('products/index', [
                'title' => 'Все товары',
                'items' => $items
            ]);
            
        } catch (Exception $e) {
            // Обработка ошибки, если произошла ошибка при рендеринге шаблона
            echo "Error: " . $e->getMessage();
        }
    }

    public function show($id) {
        try {
            $item = $this->model->getProductById($id);

            if ($item) {
                $this->view->render('products/page', [
                    // product_name должно быть как столбец в базе данных
                    'name' => $item['product_name'],
                    'title' => $item['product_name'],
                    'price' => $item['price'],
                    'product_id' => $item['product_id']
                ]);
            } else {
                // Обработка ситуации, когда продукт не найден
                $this->view->render("layouts/not-found", [
                    "title" => "Страница не найдена",
                ]);
            }
        } catch (Exception $e) {
            // Обработка ошибки, если произошла ошибка при поиске продукта или рендеринге шаблона
            echo "Error: " . $e->getMessage();
        }
    }
}
