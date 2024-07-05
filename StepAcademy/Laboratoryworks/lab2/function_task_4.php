<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Calculator</title>
</head>
<body>
    <form method="post" action="">
        <label for="date">Enter a date:</label>
        <input type="date" step="any" name="date" required>
        <br><br>
        <label for="days">Enter number of days:</label>
        <input type="number" name="days" required>
        <br><br>
        <input type="submit" value="Round">
    </form>

    <?php
        function getDateAfter($date, $days) {
            return date('Y-m-d', strtotime($date. ' + ' . $days . ' days'));
        }
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $date = $_POST['date'];
            $days = $_POST['days'];
            
            echo '<p>' . $date . ' + ' . $days . ' days = ' . getDateAfter($date, $days) . '.</p>';
        }
    ?>

</body>
</html>