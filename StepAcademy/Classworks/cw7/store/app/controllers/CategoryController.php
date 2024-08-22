<?php

require_once __DIR__ . '/../models/CategoryModel.php';

class CategoryController extends Controller {
    public function index() {
        try {
            $categoriesModel = new CategoryModel();
            $categories = $categoriesModel->getAllCategories();
            
            if ($categories) {
                $this->view->render('categories/categories', [
                    'title' => 'Categories',
                    'categories' => $categories
                ]);
            } else {
                // Обработка ситуации, когда продукты не найден
                echo "Categories not found.";
            }
        } catch (Exception $e) {
            // Обработка ошибки, если произошла ошибка при поиске продукта или рендеринге шаблона
            echo "Error: " . $e->getMessage();
        }
    }
}
