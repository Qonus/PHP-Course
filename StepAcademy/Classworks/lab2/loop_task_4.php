<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Circle Generation</title>
    <style>
        p {
            font-size: 16px;
            color: #333;
        }
        .circle {
            font-size: 5px;
        }
    </style>
</head>
<body>
    <form method="post" action="">
        <label for="number">Enter a number of circles to generate:</label>
        <br>
        <input type="number" name="number" required>
        <br>
        <input type="submit" value="Generate">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $number = $_REQUEST['number'];
            function getCircle($radius, $size) {
                $thickness = 0.6;
                $circle = "";
                $gapBetweenCircles = 5;
                for($y = $size/2 - $radius - $gapBetweenCircles/2; $y <= $size/2 + $radius + $gapBetweenCircles/2; $y++) {
                    for($x = 0; $x <= $size; $x++) {
                        $centerDist = sqrt(pow($x - $size/2, 2) + pow($y - $size/2, 2));
                        $circle .= (
                            $centerDist < $radius + $thickness
                            &&
                            $centerDist > $radius - $thickness
                            )
                         ? "⬛" : "⬜";
                    }
                    $circle .= "<br>";
                }
                return $circle;
            }
            
            echo "Circles 20px - " . 20 + ($number - 1) * 15 . "px: <br>";
            $circles = "";
            for($i = 0; $i < $number; $i++) {
                $size = 20 + $i * 15;
                $circles .= getCircle($size/2, 20 + $number * 15);
            }
            echo '<p class="circle">' . $circles . "</p>";
        }
    ?>
</body>
</html>