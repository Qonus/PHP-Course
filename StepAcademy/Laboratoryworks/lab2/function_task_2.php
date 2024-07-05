<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rounding number</title>
</head>
<body>
<form method="post" action="">
        <label for="number">Enter a number:</label>
        <input type="number" step="any" name="number" required>
        <br><br>
        <label for="degree">Enter the degree of rounding:</label>
        <input type="number" name="degree" required>
        <br><br>
        <input type="submit" value="Round">
    </form>

    <?php
        function roundToDegree($number, $degree) {
            $factor = pow(10, $degree);
            return round($number * $factor) / $factor;
        }
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $number = $_POST['number'];
            $degree = $_POST['degree'];
            
            $roundedNumber = roundToDegree($number, $degree);
            echo '<p>The number ' . $number . ' rounded to ' . $degree . ' decimal places is ' . $roundedNumber . '.</p>';
        }
    ?>

</body>
</html>