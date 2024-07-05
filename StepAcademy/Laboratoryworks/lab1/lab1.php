<?php
    $lang = $_GET["lang"];   
    $content = match($lang) {
        "en" => "Hello my name is Aibat and I am going to change your life",
        "ru" => "Привет меня зовут Айбат, я изменю твою жизнь"
    };
    echo $content;
    # http://localhost/Aibat/lab1.php/?lang=kk
?>