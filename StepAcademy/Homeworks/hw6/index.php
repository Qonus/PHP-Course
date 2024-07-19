<?php

require "app/core/Database.php";
$database = Database::getInstance();

if (isset($_POST["add_category"])) {
    $category_name = $_POST["category_name"] ?? "";
    $parent_category_id = $_POST["parent_category_id"] ?? "";
    
    if($category_name) {
        $sql = "INSERT INTO categories (category_name, parent_category_id) VALUES (:category, :parent)";
        $args = [
            ":category" => $category_name,
            ":parent" => $parent_category_id ?: null
        ];
        try {
            $database->insert($sql, $args);
            $category_message = "Category added successfully!";
        } catch (Exception $e) {
            $category_message = "Error: {$e->getMessage()}";
        }
    } else {
        $category_message = "Please fill in all fields.";
    }
}

$categories = $database->getAll("SELECT * FROM categories");


if (isset($_POST["add_product"])) {
    $product_name = $_POST["product_name"] ?? "";
    $price = $_POST["price"] ?? "";
    $stock_quantity = $_POST["stock_quantity"] ?? "";
    $category_id = $_POST["category_id"] ?? "";
    
    if($product_name && $price && $stock_quantity && $category_id) {
        $sql = "INSERT INTO products (product_name, category_id, price, stock_quantity) VALUES (:name, :category, :price, :quantity)";
        $args = [
            ":name" => $product_name,
            ":category" => $category_id,
            ":price" => $price,
            ":quantity" => $stock_quantity
        ];
        try {
            $database->insert($sql, $args);
            $product_message = "Product added successfully!";
        } catch (Exception $e) {
            $product_message = "Error: {$e->getMessage()}";
        }
    } else {
        $product_message = "Please fill in all fields.";
    }
}

$products = $database->getAll("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Add Category:</h2>
    <?php if(isset($category_message)): ?>
        <p><?=$category_message?></p>
    <?php endif;?>
    <form action="" method="post">
        <input type="text" name="category_name" placeholder="Category name" required>
        <br>
        <select name="parent_category_id">
            <option value="">None</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?=$category->category_id?>">
                    <?=$category->category_name?>
                </option>
            <?php endforeach;?>
        </select>
        <br>
        <button type="submit" name="add_category">Add Category</button>
    </form>

    <h2>Add Product:</h2>
    <?php if(isset($product_message)): ?>
        <p><?=$product_message?></p>
    <?php endif;?>
    <form action="" method="post">
        <input type="text" name="product_name" placeholder="Enter Product Name" required>
        <input type="text" name="price" placeholder="Enter Product Price" required>
        <input type="text" name="stock_quantity" placeholder="Enter Product Quantity" required>
        <br>
        <select name="category_id">
            <option value="">None</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?=$category->category_id?>">
                    <?=$category->category_name?>
                </option>
            <?php endforeach;?>
        </select>
        <br>
        <button type="submit" name="add_product">Add Product</button>
    </form>
</body>
</html>