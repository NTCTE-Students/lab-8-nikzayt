<?php

// Базовый класс Animal
class Animal {
    public $name;
    public $age;

    public function describe() {
        print("Это {$this->name}, ему {$this->age} лет.<br>");
    }
}

// Производный класс Dog
class Dog extends Animal {
    public function bark() {
        print("{$this->name} говорит: Гав-гав!<br>");
    }
}

// Производный класс Cat
class Cat extends Animal {
    public function meow() {
        print("{$this->name} говорит: Мяу-мяу!<br>");
    }
}

// Создаем объект класса Dog
$dog = new Dog();
$dog->name = 'Бобик';
$dog->age = 3;
$dog->describe();
$dog->bark();

// Создаем объект класса Cat
$cat = new Cat();
$cat->name = 'Мурка';
$cat->age = 2;
$cat->describe();
$cat->meow();