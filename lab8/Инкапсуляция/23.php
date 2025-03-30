<?php

class Thermostat {
    private $temperature;
    private $minTemp = -20;
    private $maxTemp = 50;

    public function setTemperature($temp) {
        if ($temp < $this->minTemp || $temp > $this->maxTemp) {
            throw new Exception("Температура должна быть между {$this->minTemp} и {$this->maxTemp} градусами");
        }
        $this->temperature = $temp;
    }

    public function getTemperature() {
        return $this->temperature;
    }

    public function increaseTemp($degrees) {
        $newTemp = $this->temperature + $degrees;
        $this->setTemperature($newTemp);
    }

    public function decreaseTemp($degrees) {
        $newTemp = $this->temperature - $degrees;
        $this->setTemperature($newTemp);
    }
}

// Тестирование
$thermostat = new Thermostat();
try {
    $thermostat->setTemperature(22);
    echo "Текущая температура: " . $thermostat->getTemperature() . "°C<br>";
    
    $thermostat->increaseTemp(5);
    echo "После увеличения: " . $thermostat->getTemperature() . "°C<br>";
    
    $thermostat->decreaseTemp(10);
    echo "После уменьшения: " . $thermostat->getTemperature() . "°C<br>";
    
    // Попытка установить недопустимую температуру
    $thermostat->setTemperature(100);
} catch (Exception $e) {
    echo "Ошибка: " . $e->getMessage() . "<br>";
}