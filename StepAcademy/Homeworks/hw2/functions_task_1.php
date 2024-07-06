<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Card</title>
</head>
<body>
    <h2>Product Card</h2>
    <form method="post">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="image">Image URL:</label>
        <input type="text" id="image" name="image" required><br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required><br>
        <input type="submit" value="Create Product Card">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $image = $_POST["image"];
        $price = $_POST["price"];

        createProductCard($name, $image, $price);
    }

    function createProductCard($name, $image, $price) {
        echo "<div class='product-card'>";
        echo "<h3>$name</h3>";
        echo "<img src='$image' alt='$name' style='width:200px;height:200px;'>";
        echo "<p>Price: $$price</p>";
        echo "<button type='button'>Buy</button>";
        echo "</div>";
    }
    ?>
</body>
</html>
