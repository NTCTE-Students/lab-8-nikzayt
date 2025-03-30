<?php

class User {
    private $username;
    private $passwordHash;

    public function __construct($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        if (strlen($password) < 8) {
            throw new Exception("Пароль должен содержать минимум 8 символов");
        }
        $this->passwordHash = password_hash($password, PASSWORD_DEFAULT);
    }

    public function checkPassword($password) {
        return password_verify($password, $this->passwordHash);
    }

    public function getUsername() {
        return $this->username;
    }

    public function getInfo() {
        return "Пользователь: {$this->username}, пароль установлен: " . ($this->passwordHash ? "да" : "нет");
    }
}

// Тестирование
$user = new User('admin');
try {
    $user->setPassword('securePassword123');
    echo $user->getInfo() . "<br>";
    
    echo "Проверка пароля 'wrong': " . ($user->checkPassword('wrong') ? "верен" : "неверен") . "<br>";
    echo "Проверка пароля 'securePassword123': " . ($user->checkPassword('securePassword123') ? "верен" : "неверен") . "<br>";
} catch (Exception $e) {
    echo "Ошибка: " . $e->getMessage() . "<br>";
}