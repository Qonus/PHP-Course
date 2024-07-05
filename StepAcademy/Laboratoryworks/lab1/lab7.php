<?php
    $vowels = ['a','e','i','o','u'];
    $letter = $_GET["char"];

    if (in_array(strtolower($letter), $vowels)) 
        echo $letter." is a Vowel";
     else 
        echo $letter." is a Consonant";
?>