<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Number Checker</title>
</head>
<body>
    <form method="post" action="">
        <label for="number">Enter a number:</label>
        <input type="number" name="number" required>
        <input type="submit" value="Check">
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            function isPrime($number) {
                if ($number <= 1) {
                    return false;
                }
                for ($i = 2; $i <= sqrt($number); $i++) {
                    if ($number % $i == 0) {
                        return false;
                    }
                }
                return true;
            }

            $number = $_REQUEST['number'];
            if (isPrime($number)) {
                echo "<p>The number is prime.</p>";
            } else {
                echo "<p>The number is complex.</p>";
            }
        }
    ?>
</body>
</html>