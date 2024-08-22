<?php

require_once __DIR__ . '/../models/ProductModel.php';

class ProductController extends Controller {
    public function index() {
        echo "Здесь будут все товары";
    }

    public function show($id) {
        try {
            $productModel = new ProductModel();
            $item = $productModel->getProductById($id);

            if ($item) {
                $this->view->render('products/page', [
                    // product_name должно быть как столбец в базе данных
                    'name' => $item['product_name'],
                    'title' => $item['product_name']
                ]);
            } else {
                // Обработка ситуации, когда продукт не найден
                echo "Product not found.";
            }
        } catch (Exception $e) {
            // Обработка ошибки, если произошла ошибка при поиске продукта или рендеринге шаблона
            echo "Error: " . $e->getMessage();
        }
    }
}
