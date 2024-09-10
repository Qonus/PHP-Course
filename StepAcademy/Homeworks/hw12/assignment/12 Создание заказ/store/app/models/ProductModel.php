<?php

class ProductModel extends Model {
    protected $db;
    protected $table = "products";

    public function getProductById($productId) {
        $sql = "SELECT * FROM products WHERE product_id = :product_id";
        $args = [
            ":product_id" => $productId
        ];
        return (array)$this->db->getRow($sql, $args);
    }

    public function getAllProducts() {
        return $this->db->getAll("SELECT * FROM products");
    }

    public function getLastProducts() {
        return $this->db->getAll("SELECT * FROM products ORDER BY product_id DESC LIMIT 20");
    }

    public function createProduct($data) {
        $sql = "INSERT INTO products (name, description, price, stock) VALUES (:name, :description, :price, :stock)";
        return $this->db->insert($sql, $data);
    }

    public function updateProduct($productId, $data) {
        $sql = "UPDATE products SET name = :name, description = :description, price = :price, stock = :stock WHERE product_id = :product_id";
        return $this->db->rowCount($sql, $data);
    }

    public function deleteProduct($productId) {
        $sql = "DELETE FROM products WHERE product_id = :product_id";
        $args = [
            ":product_id" => $productId
        ];
        return $this->db->rowCount($sql, $args);
    }
}
