<?php

abstract class Vehicle {
    protected $data = []; 
    public string $color;
    public function __construct(string $color) {
        $this->color = $color;
    }

    public function __get($name) {
        return $this->data[$name];
    }

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __destruct() {
        echo "машинка разбилась :(";
    }

    public function startEngine() {
        echo "Engine started";
    }
    abstract public function drive();

    static function makeSound() {
        return "Beep-beep";
    }
}

echo Vehicle::makeSound();

class Car extends Vehicle {
    public function __construct(string $color, string $type) {
        parent::__construct($color);
        $this->type = $type;
    }
    public function drive() {
        echo "Driving a car";
    }
}

$car = new Car("red", "crossover");
$car->name = "Stella";
echo $name;