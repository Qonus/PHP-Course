<?php 
    class Product {
        public $name;
        public $description;
        public $price;

        public function __construct(String $name, String $description, int $price) {
            $this->name = $name;
            $this->description = $description;
            $this->price = $price;
        }

        // Setters
        public function setDescription(String $description) {
            $this->description = $description;
        }

        // I used it instead of getProduct()
        public function ToString(){
            return "Name: " . $this->name . "<br>Description: " . $this->description . "<br>Price: " . $this->price;
        }
    }

    $products = array(
        new Product("Chips", "Good Chips", 1000),
        new Product("Snacks", "Good Snacks", 1500),
        new Product("Car", "Good Car", 90000),
        new Product("bench", "Good bench", 700),
        new Product("Ben", "Good Ben", 500),
    );
    
    foreach ($products as $item) {
        $title = $item->name;
        $description = $item->description;
        include "card.php";
    }
?>