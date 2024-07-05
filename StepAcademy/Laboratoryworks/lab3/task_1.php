<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rectonagle Calculator</title>
</head>
<body>
    <form method="post">
        <h1>First Rectangle Point:</h1><br>
        <label for="x1">X: </label>
        <input type="number" name="x1" required>
        <br>
        <label for="y1">Y: </label>
        <input type="number" name="y1" required>
        <h1>Second Rectangle Point:</h1><br>
        <label for="x2">X: </label>
        <input type="number" name="x2" required>
        <br>
        <label for="y2">Y: </label>
        <input type="number" name="y2" required>
        <br>
        <br>
        <h1>Third Point (to check if it's inside rectangle):</h1><br>
        <label for="x3">X: </label>
        <input type="number" name="x3" required>
        <br>
        <label for="y3">Y: </label>
        <input type="number" name="y3" required>
        <br>
        <br>
        <input type="submit" value="Get Information">
    </form>
    <?php
        include 'rectangle.php';

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $x1 = $_POST['x1'];
            $y1 = $_POST['y1'];
            $x2 = $_POST['x2'];
            $y2 = $_POST['y2'];

            $x3 = $_POST['x3'];
            $y3 = $_POST['y3'];
            $point = new Vector($x3, $y3);

            $rectangle = new Rectangle(new Vector($x1, $y1), new Vector($x2, $y2));

            echo $rectangle->ToString() . "<br><br>";
            echo "Width: " . $rectangle->getWidth() . "<br>Height: " . $rectangle->getHeight() . "<br><br>";
            echo "Perimeter: " . $rectangle->getPerimeter() . "<br>Area: " . $rectangle->getArea() . "<br><br>";
            if ($rectangle->isInside($point)) {
                echo "Point " . $point->ToString() . " is inside rectangle";
            }
            else {
                echo "Point " . $point->ToString() . " is not inside rectangle";
            }
        }
    ?>
</body>
</html>
