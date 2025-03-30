<?php

abstract class Order {
    protected $items;
    protected $discount = 0;

    public function __construct($items) {
        $this->items = $items;
    }

    public function calculateSubtotal() {
        return array_sum($this->items);
    }

    abstract public function calculateTotal();
}

class OnlineOrder extends Order {
    public function calculateTotal() {
        $subtotal = $this->calculateSubtotal();
        $discount = $subtotal * 0.1; // 10% скидка для онлайн заказов
        return $subtotal - $discount;
    }
}

class StoreOrder extends Order {
    public function calculateTotal() {
        $subtotal = $this->calculateSubtotal();
        $tax = $subtotal * 0.2; // 20% налог для магазина
        return $subtotal + $tax;
    }
}

class TelephoneOrder extends Order {
    public function calculateTotal() {
        $subtotal = $this->calculateSubtotal();
        $shipping = 50; // Фиксированная стоимость доставки
        return $subtotal + $shipping;
    }
}

// Тестирование
$items = [100, 200, 300]; // Цены товаров

$orders = [
    new OnlineOrder($items),
    new StoreOrder($items),
    new TelephoneOrder($items)
];

foreach ($orders as $order) {
    echo "Сумма заказа: " . $order->calculateTotal() . "<br>";
}