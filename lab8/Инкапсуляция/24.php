<?php

class Counter {
    private $count = 0;

    public function increment($step = 1) {
        $this->count += $step;
    }

    public function decrement($step = 1) {
        $newCount = $this->count - $step;
        $this->count = max(0, $newCount); // Не позволяем уйти ниже 0
    }

    public function getCount() {
        return $this->count;
    }

    public function reset() {
        $this->count = 0;
    }
}

// Тестирование
$counter = new Counter();
$counter->increment();
$counter->increment(3);
echo "Счетчик: " . $counter->getCount() . "<br>";

$counter->decrement(2);
echo "После уменьшения: " . $counter->getCount() . "<br>";

$counter->decrement(10); // Попытка уменьшить ниже 0
echo "После попытки уменьшить ниже 0: " . $counter->getCount() . "<br>";

$counter->reset();
echo "После сброса: " . $counter->getCount() . "<br>";