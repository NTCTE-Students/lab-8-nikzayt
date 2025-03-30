<?php

trait Authenticatable {
    private $isLoggedIn = false;

    public function login($credentials) {
        // Здесь должна быть реальная логика проверки учетных данных
        if ($this->checkCredentials($credentials)) {
            $this->isLoggedIn = true;
            $this->log("Пользователь {$credentials['username']} вошел в систему");
            return true;
        }
        return false;
    }

    public function logout() {
        $this->isLoggedIn = false;
        $this->log("Пользователь вышел из системы");
    }

    public function isLoggedIn() {
        return $this->isLoggedIn;
    }

    abstract protected function checkCredentials($credentials);
    abstract protected function log($message);
}

class User {
    use Authenticatable;

    private $username;
    private $storedPasswordHash;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->storedPasswordHash = password_hash($password, PASSWORD_DEFAULT);
    }

    protected function checkCredentials($credentials) {
        return isset($credentials['username']) && 
               $credentials['username'] === $this->username &&
               password_verify($credentials['password'], $this->storedPasswordHash);
    }

    protected function log($message) {
        echo "[Аудит] {$message}<br>";
    }

    public function getSecretData() {
        if (!$this->isLoggedIn()) {
            throw new Exception("Доступ запрещен");
        }
        return "Секретные данные для {$this->username}";
    }
}

// Тестирование системы авторизации
$user = new User('admin', 'securePassword123');

// Попытка входа с неверными данными
echo $user->login(['username' => 'admin', 'password' => 'wrong']) 
     ? "Успешный вход<br>" 
     : "Ошибка входа<br>";

// Успешный вход
echo $user->login(['username' => 'admin', 'password' => 'securePassword123']) 
     ? "Успешный вход<br>" 
     : "Ошибка входа<br>";

// Получение защищенных данных
try {
    echo $user->getSecretData() . "<br>";
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}

// Выход из системы
$user->logout();
try {
    echo $user->getSecretData() . "<br>";
} catch (Exception $e) {
    echo $e->getMessage() . "<br>";
}