<?php

class BankAccount {
    private $accountNumber;
    private $balance;
    private $owner;

    public function __construct($accountNumber, $owner, $balance = 0) {
        $this->accountNumber = $accountNumber;
        $this->owner = $owner;
        $this->balance = $balance;
    }

    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
            return true;
        }
        return false;
    }

    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            return $amount;
        }
        return 0;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function getAccountInfo() {
        return "Счет #{$this->accountNumber}, владелец: {$this->owner}, баланс: {$this->balance}";
    }
}

// Тестирование
$account = new BankAccount('1234567890', 'Иван Петров', 1000);
$account->deposit(500);
echo $account->getAccountInfo() . "<br>";

$withdrawn = $account->withdraw(200);
echo "Снято: {$withdrawn}, новый баланс: " . $account->getBalance() . "<br>";

// Попытка снять больше, чем есть
$withdrawn = $account->withdraw(2000);
echo "Попытка снять 2000: снято {$withdrawn}, баланс: " . $account->getBalance() . "<br>";