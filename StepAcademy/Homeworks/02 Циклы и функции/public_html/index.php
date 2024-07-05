<?php

/* ПОВТОРЕНИЕ ПРОЙДЕННОГО МАТЕРИАЛА */

// $int = 10;               // Int
// $float = 3.14;           // Float
// $string = "?";           // String
// $alive = true;           // Bool
// $array = ["?", "!"];     // Array
// $object = new stdClass;  // Object
// $object->key = "value";  // Object element



// $age = 20;

// if ($age == 18) {
//     echo "С этого года вы можете водить машину";
// } else if ($age > 18) {
//     echo "Вы можете водить машину, лет: " . ($age - 18);
// } else {
//     echo "Вы пока не можете водить авто";
// }

// $drink = "milk";
// $type = "";
// switch ($drink) {
//     case "Milk":
//     case "milk":
//     case "airan":
//         echo "У меня аллергия на молочку :(";
//         break;
//     case "juice":
//         if ($type == "apple") {
//             echo "1";
//         } else {
//             echo "2";
//         }
//         break;
//     default:
//         echo "...";
//         break;
// }

// $lang = "kk";
// $home = match($lang) {
//     "en" => "Home",
//     "kk" => "Үй",
//     "uk" => "Дім",
//     "ru" => "Дом",
//     default => "%HOME%"
// };
// echo $home;

/* ЦИКЛЫ В PHP */

// $loop = true;
// while ($loop) {
//     // Endless loop
//     echo $loop;
//     $loop = !$loop;
// }

// $loop = false;
// do {
//     echo $loop;
//     $loop = !$loop;
// } while ($loop == 5);

// echo "<pre>";
// for ($i = 45; $i < 1000; $i += 10) {
//     echo "$i\n";
// }

"ISBN"; // Международный стандартный книжный номер

$books = [
    "9781443434973" => "1984",
    "9780451524935" => "Animal Farm",
    "9780439136365" => "Harry Potter and the Prisoner of Azkaban",
    "9780747532743" => "Harry Potter and the Philosopher's Stone",
    "9780141439600" => "Pride and Prejudice",
    "9780439064873" => "Harry Potter and the Chamber of Secrets",
    "9780307474278" => "The Road",
    "9780743273565" => "The Great Gatsby",
    "9780140283334" => "Lord of the Flies",
    "9780061120084" => "To Kill a Mockingbird"
];
?>

<!-- <body>
    <main>
        <h1>Список книг:</h1>
        <?php foreach ($books as $isbn => $book): ?>
            <div class='item'><b style="font-weight: 600"><?= $book ?></b> (<?= $isbn ?>)</div>
        <?php endforeach; ?>
    </main>
</body> -->

<?php

// function calc(int $a, int $b, string $sign = "+") {
//     switch ($sign) {
//         case "+":
//             return $a + $b;
//         case "-":
//             return $a - $b;
//         case "*":
//             return $a * $b;
//         case "/":
//             return ($b != 0) ? $a / $b : "Error";
//     }
// }

// $result = calc(10, 20);
// echo $result;

// echo rand(1, 12);
// echo strlen("Hello, World!");
// echo substr_count("This is a function", "is");

?>

<form method="get" action=""> <!-- /?query=your_text -->
    <input name="query" placeholder="Введите запрос">
    <button type="submit">Send me</button>
</form>

<?php
    // echo $_GET["query"];
    // echo $_REQUEST["query"];
    var_dump((int)$_REQUEST["query"]);
?>