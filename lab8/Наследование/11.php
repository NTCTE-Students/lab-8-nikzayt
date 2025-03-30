<?php

class Vehicle {
    public $make;
    public $model;
    public $year;

    public function __construct($make, $model, $year) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    public function getInfo() {
        return "{$this->year} {$this->make} {$this->model}";
    }
}

class Car extends Vehicle {
    public $doors;
    public $fuelType;

    public function __construct($make, $model, $year, $doors, $fuelType = 'petrol') {
        parent::__construct($make, $model, $year);
        $this->doors = $doors;
        $this->fuelType = $fuelType;
    }

    public function getInfo() {
        return parent::getInfo() . ", {$this->doors} дверей, топливо: {$this->fuelType}";
    }
}

class Bike extends Vehicle {
    public $type;
    public $engineSize;

    public function __construct($make, $model, $year, $type, $engineSize) {
        parent::__construct($make, $model, $year);
        $this->type = $type;
        $this->engineSize = $engineSize;
    }

    public function getInfo() {
        return parent::getInfo() . ", тип: {$this->type}, объём двигателя: {$this->engineSize}cc";
    }
}

class Truck extends Vehicle {
    public $loadCapacity;
    public $axles;

    public function __construct($make, $model, $year, $loadCapacity, $axles) {
        parent::__construct($make, $model, $year);
        $this->loadCapacity = $loadCapacity;
        $this->axles = $axles;
    }

    public function getInfo() {
        return parent::getInfo() . ", грузоподъёмность: {$this->loadCapacity}kg, осей: {$this->axles}";
    }
}

// Тестирование
$car = new Car('Toyota', 'Camry', 2022, 4, 'hybrid');
$bike = new Bike('Harley-Davidson', 'Sportster', 2021, 'cruiser', 1200);
$truck = new Truck('Volvo', 'FH16', 2020, 20000, 3);

echo $car->getInfo() . "<br>";
echo $bike->getInfo() . "<br>";
echo $truck->getInfo() . "<br>";