<?php

// Базовый класс Animal
class Animal {
    public $name;
    public $age;

    public function describe() {
        print("Это {$this->name}, ему {$this->age} лет.<br>");
    }

    public function makeSound() {
        print("{$this->name} издаёт звук.<br>");
    }
}

// Производный класс Dog
class Dog extends Animal {
    public function makeSound() {
        print("{$this->name} говорит: Гав-гав!<br>");
    }
}

// Производный класс Cat
class Cat extends Animal {
    public function makeSound() {
        print("{$this->name} говорит: Мяу-мяу!<br>");
    }
}

// Создаем массив животных
$animals = [];

$dog = new Dog();
$dog->name = 'Бобик';
$dog->age = 3;
$animals[] = $dog;

$cat = new Cat();
$cat->name = 'Мурка';
$cat->age = 2;
$animals[] = $cat;

// Проходим по массиву и вызываем makeSound()
foreach ($animals as $animal) {
    $animal->describe();
    $animal->makeSound();
}