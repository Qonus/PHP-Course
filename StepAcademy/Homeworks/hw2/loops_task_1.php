<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Binary to Hexadecimal Converter</title>
</head>
<body>
    <h2>Binary to Hexadecimal Converter</h2>
    <form method="post">
        <label for="binary">Enter a binary number:</label>
        <input type="text" id="binary" name="binary" required>
        <input type="submit" value="Convert">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $binary = $_POST["binary"];
        if (preg_match('/^[01]+$/', $binary)) {
            $hexadecimal = strtoupper(dechex(bindec($binary)));
            echo "<p>The hexadecimal equivalent is: $hexadecimal</p>";
        } else {
            echo "<p>Please enter a valid binary number.</p>";
        }
    }
    ?>
</body>
</html>
