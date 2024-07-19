<?php

require "app/core/Database.php";

$database = Database::getInstance();

$category_id = $_GET['id'] ?? null;

$sql = "SELECT * FROM categories WHERE category_id = :id";
$args = [ ":id" => $category_id ];

$row_count = $database->rowCount($sql, $args);

if(!$category_id || $row_count === 0) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["update_category"])) {
    $category_name = $_POST["category_name"] ?? "";
    $parent_category_id = $_POST["parent_category_id"] ?? "";
    
    if($category_name) {
        $sql = "UPDATE categories SET category_name = :category, parent_category_id = :parent WHERE category_id = :category_id";
        $args = [
            ":category" => $category_name,
            ":parent" => $parent_category_id ?: null,
            ":category_id" => $category_id ?: null
        ];
        try {
            $database->execute($sql, $args);
            $category_message = "Category updated successfully!";
            
        } catch (Exception $e) {
            $category_message = "Error: {$e->getMessage()}";
        }
    } else {
        $category_message = "Please fill in all fields.";
    }
}

$sql = "SELECT * FROM categories WHERE category_id = :id";
$args = [ ":id" => $category_id ];
$category = $database->getRow($sql, $args);
$categories = $database->getAll("SELECT * FROM categories");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<body>
    <h2>Edit Category:</h2>
    <?php if(isset($category_message)): ?>
        <p><?=$category_message?></p>
    <?php endif;?>
    <form action="" method="post">
        <input type="text" name="category_name" placeholder="Enter New Category name" value="<?=$category->category_name?>" required>
        <br>
        <select name="parent_category_id">
            <option value="">None</option>
            <?php 
                foreach ($categories as $item):
                    if ($item->parent_category_id == $category_id) {
                        continue;
                    }
                ?>
                    
                <option <?= ($item->category_id == $category->parent_category_id) ? "selected" : ""?> value="<?=$item->category_id?>">
                    <?=$item->category_name?>
                </option>
            <?php endforeach;?>
        </select>
        <br>
        <button type="submit" name="update_category">Update Category</button>
    </form>  
</body>
</html>