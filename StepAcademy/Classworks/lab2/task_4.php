<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decimal to Binary Converter</title>
    <style>
        p {
            font-size: 16px;
            color: #333;
        }
    </style>
</head>
<body>
    <form method="post" action="">
        <label for="decimal">Enter a number of circles to generate:</label>
        <br>
        <input type="number" name="decimal" required>
        <br>
        <input type="submit" value="Generate">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $decimal = $_REQUEST['decimal'];

            function decimalToBinary($decNum) {
                $binNum = '';
                while ($decNum > 0) {
                    $rem = $decNum % 2;
                    $binNum = $rem . $binNum;
                    $decNum = (int)($decNum / 2);
                }
                return $binNum !== '' ? $binNum : '0';
            }

            $binary = decimalToBinary($decimal);
            echo '<p>The binary representation of ' . $decimal . ' is ' . $binary . '.</p>';
        }
    ?>
</body>
</html>