<?php

class Animal {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function eat() {
        return "{$this->name} ест";
    }

    public function sleep() {
        return "{$this->name} спит";
    }
}

class Bird extends Animal {
    public function fly() {
        return "{$this->name} летит";
    }
}

class Fish extends Animal {
    public function swim() {
        return "{$this->name} плывёт";
    }
}

class Mammal extends Animal {
    public function run() {
        return "{$this->name} бежит";
    }
}

// Тестирование
$bird = new Bird('Орёл');
$fish = new Fish('Лосось');
$mammal = new Mammal('Лев');

echo $bird->eat() . " - " . $bird->fly() . "<br>";
echo $fish->sleep() . " - " . $fish->swim() . "<br>";
echo $mammal->eat() . " - " . $mammal->run() . "<br>";