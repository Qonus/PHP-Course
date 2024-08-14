<?php

class CategoryModel extends Model {
    protected $db;
    protected $table = "categories";

    public function getCategoryById($categoryId) {
        $sql = "SELECT * FROM categories WHERE category_id = :category_id";
        $args = [
            ":category_id" => $categoryId
        ];
        return (array)$this->db->getRow($sql, $args);
    }

    public function getAllCategories() {
        return $this->db->getAll("SELECT * FROM categories");
    }

    public function createCategory($data) {
        $sql = "INSERT INTO categories (name, description, price, stock) VALUES (:name, :description, :price, :stock)";
        return $this->db->insert($sql, $data);
    }

    public function updateCategory($categoryId, $data) {
        $sql = "UPDATE categories SET name = :name, description = :description, price = :price, stock = :stock WHERE category_id = :category_id";
        return $this->db->rowCount($sql, $data);
    }

    public function deleteCategory($categoryId) {
        $sql = "DELETE FROM categories WHERE category_id = :category_id";
        $args = [
            ":category_id" => $categoryId
        ];
        return $this->db->rowCount($sql, $args);
    }
}
