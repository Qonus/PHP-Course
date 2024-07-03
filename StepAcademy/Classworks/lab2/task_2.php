<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4 Digit counter</title>
</head>
<body>
    <?php
        function hasSameDigits($num) {
            return count(array_unique(str_split($num))) == 1;
        }

        function hasDifferentDigits($num) {
            return count(array_unique(str_split($num))) == 4;
        }

        $sameDigitNums = 0;
        $diffDigitNums = 0;

        for($i = 1000; $i <= 9999; $i++) {
            $sameDigitNums += hasSameDigits($i);
            $diffDigitNums += hasDifferentDigits($i);
        }
        echo "The number of four-digit numbers in which all digits are the same: " . $sameDigitNums . "<br>";
        echo "The number of four-digit numbers in which all digits are different: " . $diffDigitNums;
    ?>
</body>
</html>