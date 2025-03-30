<?php

class Device {
    public $brand;
    public $model;

    public function __construct($brand, $model) {
        $this->brand = $brand;
        $this->model = $model;
    }

    public function getInfo() {
        return "Устройство: {$this->brand} {$this->model}";
    }
}

class Smartphone extends Device {
    public $os;
    public $screenSize;

    public function __construct($brand, $model, $os, $screenSize) {
        parent::__construct($brand, $model);
        $this->os = $os;
        $this->screenSize = $screenSize;
    }

    public function call($number) {
        return "{$this->brand} {$this->model} звонит на номер {$number}";
    }
}

class Laptop extends Device {
    public $cpu;
    public $ram;

    public function __construct($brand, $model, $cpu, $ram) {
        parent::__construct($brand, $model);
        $this->cpu = $cpu;
        $this->ram = $ram;
    }

    public function runProgram($program) {
        return "{$this->brand} {$this->model} запускает {$program}";
    }
}

class Tablet extends Device {
    public $hasCellular;
    public $batteryLife;

    public function __construct($brand, $model, $hasCellular, $batteryLife) {
        parent::__construct($brand, $model);
        $this->hasCellular = $hasCellular;
        $this->batteryLife = $batteryLife;
    }

    public function watchVideo() {
        return "{$this->brand} {$this->model} воспроизводит видео";
    }
}

// Тестирование
$smartphone = new Smartphone('Apple', 'iPhone 13', 'iOS', '6.1"');
$laptop = new Laptop('Dell', 'XPS 15', 'Intel i7', '16GB');
$tablet = new Tablet('Samsung', 'Galaxy Tab S7', true, '12 hours');

echo $smartphone->getInfo() . " - " . $smartphone->call('+123456789') . "<br>";
echo $laptop->getInfo() . " - " . $laptop->runProgram('Photoshop') . "<br>";
echo $tablet->getInfo() . " - " . $tablet->watchVideo() . "<br>";