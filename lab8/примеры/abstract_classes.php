<?php

// Абстрактный класс Animal
abstract class Animal {
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

    // Абстрактный метод
    abstract public function makeSound();
}

// Класс Dog
class Dog extends Animal implements Actions {
    public function makeSound() {
        print("{$this->getName()} говорит: Гав-гав!<br>");
    }

    public function run() {
        print("{$this->getName()} бежит.<br>");
    }

    public function sleep() {
        print("{$this->getName()} спит.<br>");
    }
}

// Класс Cat
class Cat extends Animal implements Actions {
    public function makeSound() {
        print("{$this->getName()} говорит: Мяу-мяу!<br>");
    }

    public function run() {
        print("{$this->getName()} крадётся.<br>");
    }

    public function sleep() {
        print("{$this->getName()} спит.<br>");
    }
}

// Правильное создание объектов
$dog = new Dog();
$dog->setName('Бобик');
$dog->makeSound();

$cat = new Cat();
$cat->setName('Мурка');
$cat->makeSound();