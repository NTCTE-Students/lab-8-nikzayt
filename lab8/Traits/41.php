<?php

trait Logger {
    public function log($message) {
        $timestamp = date('Y-m-d H:i:s');
        echo "[{$timestamp}] {$message}<br>";
    }
}

class User {
    use Logger;

    private $name;

    public function __construct($name) {
        $this->name = $name;
        $this->log("Создан пользователь: {$name}");
    }

    public function updateName($newName) {
        $this->log("Пользователь {$this->name} меняет имя на {$newName}");
        $this->name = $newName;
    }
}

class Product {
    use Logger;

    private $id;
    private $price;

    public function __construct($id, $price) {
        $this->id = $id;
        $this->price = $price;
        $this->log("Создан продукт #{$id} с ценой {$price}");
    }

    public function updatePrice($newPrice) {
        $this->log("Продукт #{$this->id} меняет цену с {$this->price} на {$newPrice}");
        $this->price = $newPrice;
    }
}

// Тестирование
$user = new User('John Doe');
$user->updateName('John Smith');

$product = new Product(123, 99.99);
$product->updatePrice(89.99);