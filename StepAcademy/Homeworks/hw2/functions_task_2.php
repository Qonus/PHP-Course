<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exponentiation</title>
</head>
<body>
    <h2>Exponentiation</h2>
    <form method="post">
        <label for="base">Base number:</label>
        <input type="number" id="base" name="base" required><br>
        <label for="exponent">Exponent:</label>
        <input type="number" id="exponent" name="exponent" required><br>
        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $base = $_POST["base"];
        $exponent = $_POST["exponent"];
        $result = pow($base, $exponent);
        echo "<p>$base raised to the power of $exponent is: $result</p>";
    }
    ?>
</body>
</html>
