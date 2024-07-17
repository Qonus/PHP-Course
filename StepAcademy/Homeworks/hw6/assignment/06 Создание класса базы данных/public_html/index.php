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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Add Category</h2>
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
</body>
</html>