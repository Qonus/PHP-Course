<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Random Number Generator</title>
</head>
<body>
    <h2>Random Number Generator</h2>
    <form method="post">
        <input type="submit" name="generate" value="Generate Numbers">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["generate"])) {
        $numbers = array();
        for ($i = 0; $i < 100; $i++) {
            $numbers[] = rand(1, 1000);
        }
        $max = max($numbers);
        $min = min($numbers);

        echo "<p>Generated numbers: " . implode(", ", $numbers) . "</p>";
        echo "<p>Maximum number: $max</p>";
        echo "<p>Minimum number: $min</p>";
    }
    ?>
</body>
</html>
