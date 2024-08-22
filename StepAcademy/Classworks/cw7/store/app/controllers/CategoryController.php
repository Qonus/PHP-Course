<?php

require_once __DIR__ . '/../models/CategoryModel.php';
require_once __DIR__ . '/../models/ProductModel.php';

class CategoryController extends Controller {
    public function index() {
        try {
            $categoryModel = new CategoryModel();
            $categories = $categoryModel->getAllCategories();
            
            if ($categories) {
                $this->view->render('categories/categories', [
                    'title' => 'Categories',
                    'categories' => $categories
                ]);
            } else {
                echo "Categories not found.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function show($category_name) {
        try {
            $categoryModel = new CategoryModel();
            $category = $categoryModel->getCategoryByName($category_name);
            if (!$category) {
                echo "Category $category_name doesn't exist";
                return;
            }
            $productModel = new ProductModel();
            $products = $productModel->getAllProductsInCategory($category['category_id']);
            
            $this->view->render('products/products', [
                'title' => 'Products',
                'products' => $products,
                'back_link' => '/categories/'
            ]);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
