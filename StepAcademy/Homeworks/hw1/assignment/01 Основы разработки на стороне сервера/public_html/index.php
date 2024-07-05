<?php

    // global $test;
    
    // $name = "Микәйіл"; // String
    // $skills = [
    //     "React", "React Native",
    //     "C#", "C++", "PHP", "JavaScript",
    //     "Python", "MySQL", "MSSQL", "PostgreSQL"
    // ]; // Array
    // $experience = 4.5; // Float
    // $status = true; // Boolean (alive)

    // $object = new stdClass;
    // $object->key = "value";
    // $object->name = "Object";
    
    // $additional_info = null;
    
    // include("hi.php");
    // include_once("hi.php");
    
    // require("hi.php");
    
    # require_once("hi.php");
    /* echo "<code><pre>"; */
    // print_r($name);

    // die();

    $age = 18;
    if ($age >= 18) {
        echo "Вы можете водить автомобиль!";
    } else {
        echo "Пока вы не можете водить авто :(";
    }

    $num = 13;
    if ($num > 0) {
        echo "+";
    } else if ($num < 0) {
        echo "-";
    } else {
        echo "0";
    }

    $drink = "joice";
    switch($drink) {
        case "joice":
            echo "Держите ваш сок";
            break;
        case "milk":
        case "молоко":
            echo "Держите стакан молока";
            break;
        default:
            echo "А у меня нет такого";
            break;
    }

    $lang = "en";
    $apple = match($lang) {
        "kk" => "алма",
        "en" => "apple",
        "ru" => "яблоко",
        default => "%apple%"
    };

    echo ($apple === "apple") ? "It's English!" : "Vous parlez français ?";

    // https://localhost/sep222?lang=kk
    // https://localhost/sep222/?lang=kk
    echo $_GET["lang"];

    (int)$num = "22";
?>

<form method="get">
    <input name="lang" placeholder="locale (en/kk/uk/ru)">
    <button type="submit">Send</button>
</form>