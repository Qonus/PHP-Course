<?php

class CartController extends Controller {
    public function __construct() {
        parent::__construct();
        require_once __DIR__ . '/../models/CartModel.php';
        $this->model = new CartModel();
    }

    public function index() {
        try {
            $items = $this->model->getCart($_SESSION['user']['user_id']);
            $total = $this->model->getTotal($_SESSION['user']['user_id']);
            $this->view->render('cart/index', [
                'title' => 'Корзина',
                'items' => $items,
                'total' => $total
            ]);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function add($id) {
        try {
            $this->model->addToCart($_SESSION['user']['user_id'], $id);
            header("Location: /cart/");
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}