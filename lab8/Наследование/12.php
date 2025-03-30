<?php

class Employee {
    public $name;
    public $salary;

    public function __construct($name, $salary) {
        $this->name = $name;
        $this->salary = $salary;
    }

    public function getInfo() {
        return "Сотрудник: {$this->name}, Зарплата: {$this->salary}";
    }
}

class Manager extends Employee {
    public $department;

    public function __construct($name, $salary, $department) {
        parent::__construct($name, $salary);
        $this->department = $department;
    }

    public function manageTeam() {
        return "{$this->name} управляет отделом {$this->department}";
    }
}

class Developer extends Employee {
    public $programmingLanguage;

    public function __construct($name, $salary, $programmingLanguage) {
        parent::__construct($name, $salary);
        $this->programmingLanguage = $programmingLanguage;
    }

    public function writeCode() {
        return "{$this->name} пишет код на {$this->programmingLanguage}";
    }
}

class Designer extends Employee {
    public $designTool;

    public function __construct($name, $salary, $designTool) {
        parent::__construct($name, $salary);
        $this->designTool = $designTool;
    }

    public function createDesign() {
        return "{$this->name} создаёт дизайн в {$this->designTool}";
    }
}

// Тестирование
$manager = new Manager('Иван Иванов', 150000, 'IT');
$developer = new Developer('Петр Петров', 120000, 'PHP');
$designer = new Designer('Анна Сидорова', 100000, 'Figma');

echo $manager->getInfo() . " - " . $manager->manageTeam() . "<br>";
echo $developer->getInfo() . " - " . $developer->writeCode() . "<br>";
echo $designer->getInfo() . " - " . $designer->createDesign() . "<br>";