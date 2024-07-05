<?php
    $number = (int)$_GET["num"];
    $text = ($number > 0) ? "You have a big positive number" : (($number == 0) ? "Your number is zero" : "You have a negative lil sad number");
    echo $text;
?>