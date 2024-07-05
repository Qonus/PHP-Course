<?php
    $number = (int)$_GET["num"];
    switch ($number){
        case 1:
            $text = "January";
            break;
        case 2:
            $text = "February";
            break;
        case 3:
            $text = "March";
            break;
        case 4:
            $text = "April";
            break;
        case 5:
            $text = "May";
            break;
        case 6:
            $text = "June";
            break;
        case 7:
            $text = "July";
            break;
        case 8:
            $text = "August";
            break;
        case 9:
            $text = "September";
            break;
        case 10:
            $text = "October";
            break;
        case 11:
            $text = "November";
            break;
        case 12:
            $text = "December";
            break;
        default:
            $text = "Undefined Month!!! Enter between 1 - 12";
            break;
    };

    echo $text;
?>