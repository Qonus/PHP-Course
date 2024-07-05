<?php

interface Animal {
    public function makeSound(): string;
    public function move(Bool $test): mixed;
}

trait HasWings {
    public function fly() {
        echo "Flying";
    }
}

trait CanSwim {
    public function swim() {
        echo "Swiming...";
    }
}

class Duck implements Animal {
    use HasWings, CanSwim;
    public function makeSound(): string {
        return "quack";
    }
    public function move(bool $angry): mixed {
        return ($angry) ? "attack" : 0;
    }
}

$duck = new Duck;
$duck->swim();

class Cat implements Animal {
    public function makeSound(): string {
        return "Meow";
    }

    public function move(Bool $test): mixed {
        if($test) {
            return 1;
        }
        else {
            return "a";
        }
    }
}

$cat = new Cat();
var_dump($cat->makeSound());
