<?php

require "app/core/Database.php";
$database = Database::getInstance();

$category_id = $_GET["id"] ?? null;

$sql = "SELECT * FROM categories WHERE category_id = :id";
$args = ["id" => $category_id];

$row_count = $database->rowCount($sql, $args);

if (!$category_id || $row_count === 0) {
    header("Location: index.php");
    exit;
}

$category = $database->getRow($sql, $args);

echo $category->category_name;