<?php
    $number = (int)$_GET["num"];
    $text = ($number - floor($number / 10) * 10 == floor($number / 10)) ? "You have a double digits" : "You have different digits";
    echo $text;
?>