<?php

require "app/core/Database.php";

$database = Database::getInstance();

$product_id = $_GET['id'] ?? null;

$sql = "SELECT * FROM products WHERE product_id = :id";
$args = [ ":id" => $product_id ];

$row_count = $database->rowCount($sql, $args);

if(!$product_id || $row_count === 0) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["update_product"])) {
    $product_name = $_POST["product_name"] ?? "";
    $price = $_POST["price"] ?? "";
    $quantity = $_POST["quantity"] ?? "";
    $category_id = $_POST["category_id"] ?? "";
    
    if($product_name) {
        $sql = "UPDATE products SET product_name = :name, category_id = :category, price = :price, stock_quantity = :quantity WHERE product_id = :product_id";
        $args = [
            ":name" => $product_name,
            ":category" => $category_id,
            ":price" => $price ,
            ":quantity" => $quantity,
            ":product_id" => $product_id,
        ];
        try {
            $database->execute($sql, $args);
            $message = "Product updated successfully!";
            
        } catch (Exception $e) {
            $message = "Error: {$e->getMessage()}";
        }
    } else {
        $message = "Please fill in all fields.";
    }
}

$sql = "SELECT * FROM products WHERE product_id = :id";
$args = [ ":id" => $product_id ];
$product = $database->getRow($sql, $args);
$categories = $database->getAll("SELECT * FROM categories");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h2>Edit Product:</h2>
    <?php if(isset($message)): ?>
        <p><?=$message?></p>
    <?php endif;?>
    <form action="" method="post">
        <label>Name:</label>
        <input type="text" name="product_name" placeholder="Enter New Product Name" value="<?=$product->product_name?>" required>
        <br>
        <label>Price:</label>
        <input type="number" name="price" placeholder="Enter New Product Price" value="<?=$product->price?>" required>
        <br>
        <label>Quantity:</label>
        <input type="number" name="quantity" placeholder="Enter New Product Quantity" value="<?=$product->stock_quantity?>" required>
        <br>
        <select name="category_id">
            <option value="">None</option>
            <?php foreach ($categories as $item):?>
                <option <?= ($item->category_id == $product->category_id) ? "selected" : ""?> value="<?=$item->category_id?>">
                    <?=$item->category_name?>
                </option>
            <?php endforeach;?>
        </select>
        <br>
        <button type="submit" name="update_product">Update Product</button>
    </form>  
</body>
</html>