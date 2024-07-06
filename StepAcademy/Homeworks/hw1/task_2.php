<!DOCTYPE html>
<html>
<body>

<form method="post" action="">
  Month: <input type="number" name="month" min="1" max="12"><br>
  Day: <input type="number" name="day" min="1" max="31"><br>
  <input type="submit" value="Determine Zodiac Sign">
</form>

<?php
if (isset($_POST['month']) && isset($_POST['day'])) {
    $month = $_POST['month'];
    $day = $_POST['day'];
    $zodiac = "";

    if (($month == 3 && $day >= 21) || ($month == 4 && $day <= 19)) {
        $zodiac = "Aries";
    } elseif (($month == 4 && $day >= 20) || ($month == 5 && $day <= 20)) {
        $zodiac = "Taurus";
    } elseif (($month == 5 && $day >= 21) || ($month == 6 && $day <= 20)) {
        $zodiac = "Gemini";
    } elseif (($month == 6 && $day >= 21) || ($month == 7 && $day <= 22)) {
        $zodiac = "Cancer";
    } elseif (($month == 7 && $day >= 23) || ($month == 8 && $day <= 22)) {
        $zodiac = "Leo";
    } elseif (($month == 8 && $day >= 23) || ($month == 9 && $day <= 22)) {
        $zodiac = "Virgo";
    } elseif (($month == 9 && $day >= 23) || ($month == 10 && $day <= 22)) {
        $zodiac = "Libra";
    } elseif (($month == 10 && $day >= 23) || ($month == 11 && $day <= 21)) {
        $zodiac = "Scorpio";
    } elseif (($month == 11 && $day >= 22) || ($month == 12 && $day <= 21)) {
        $zodiac = "Sagittarius";
    } elseif (($month == 12 && $day >= 22) || ($month == 1 && $day <= 19)) {
        $zodiac = "Capricorn";
    } elseif (($month == 1 && $day >= 20) || ($month == 2 && $day <= 18)) {
        $zodiac = "Aquarius";
    } elseif (($month == 2 && $day >= 19) || ($month == 3 && $day <= 20)) {
        $zodiac = "Pisces";
    }

    echo "Your Zodiac Sign: $zodiac";
}
?>

</body>
</html>
