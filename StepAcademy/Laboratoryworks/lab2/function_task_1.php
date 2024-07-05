<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sub String Counter</title>
</head>
<body>
    <form method="post" action="">
        <label for="content">Enter content:</label><br>
        <textarea name="content" rows="10" cols="50" required></textarea><br><br>
        <label for="searchString">Enter string to search for:</label>
        <input type="text" name="searchString" required><br><br>
        <input type="submit" value="Count Repetitions">
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $content = $_POST['content'];
            $searchString = $_POST['searchString'];

            function countRepetitions($content, $searchString) {
                return substr_count($content, $searchString);
            }

            $repetitions = countRepetitions($content, $searchString);
            echo '<p>The string "' . htmlspecialchars($searchString) . '" appears ' . $repetitions . ' times in the content.</p>';
        }
    ?>
</body>
</html>