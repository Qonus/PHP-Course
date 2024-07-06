<!DOCTYPE html>
<html>
<body>

<form method="post" action="">
  Movie Title: <input type="text" name="title"><br>
  Rating (1-10): <input type="number" name="rating" min="1" max="10"><br>
  <input type="submit" value="Submit">
</form>

<?php
if (isset($_POST['rating']) && isset($_POST['title'])) {
    $rating = $_POST['rating'];
    $title = $_POST['title'];
    $recommendation = "";

    if ($rating >= 7) {
        $recommendation = "Good choice!";
    } else {
        $recommendation = "Better choose another movie.";
    }

    echo "Movie: $title<br>";
    echo "Recommendation: $recommendation";
}
?>

</body>
</html>
