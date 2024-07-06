<?php

// $fruit = "apple";
// $$fruit = "вкусно";
// $fruit = "orange";

// echo $fruit; // apple
// echo $apple; // вкусно

// for ($i = 1; $i <= 3; $i++) {
//     $variable = "var" . $i;
//     $$variable = "Value" . $i;
// }

// echo $var1;
// echo $var2;
// echo $var3;

class Product {
    public string $name;
    public string $description;
    public function __construct(string $name, string $description) {
        $this->name = $name;
        $this->description = $description;
    }
}

$items = [
    new Product("Item 1", "Description"),
    new Product("Item 2", "Description"),
    new Product("Item 3", "Description"),
    new Product("Item 4", "Description"),
    new Product("Item 5", "Description"),
];

foreach($items as $item) {
    $title = $item->name;
    $description = $item->description;
    include "card.php";
}