<?php

// Базовый класс Animal
class Animal {
    private $name;
    private $age;

    public function describe() {
        print("Это {$this->getName()}, ему {$this->getAge()} лет.<br>");
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        if($age >= 0) {
            $this->age = $age;
        } else {
            print('Возраст не может быть отрицательным.<br>');
        }
    }

    public function makeSound() {
        print("{$this->getName()} издаёт звук.<br>");
    }
}

// Производный класс Dog
class Dog extends Animal {
    public function makeSound() {
        print("{$this->getName()} говорит: Гав-гав!<br>");
    }
}

// Производный класс Cat
class Cat extends Animal {
    public function makeSound() {
        print("{$this->getName()} говорит: Мяу-мяу!<br>");
    }
}

// Правильная установка через методы-сеттеры
$dog = new Dog();
$dog->setName('Бобик');
$dog->setAge(3);
$dog->describe();
$dog->makeSound();

$cat = new Cat();
$cat->setName('Мурка');
$cat->setAge(2);
$cat->describe();
$cat->makeSound();