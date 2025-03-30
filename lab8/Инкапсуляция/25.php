<?php

class SessionManager {
    private $sessionStarted = false;

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            $this->sessionStarted = true;
        }
    }

    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function get($key, $default = null) {
        return $_SESSION[$key] ?? $default;
    }

    public function has($key) {
        return isset($_SESSION[$key]);
    }

    public function remove($key) {
        if ($this->has($key)) {
            unset($_SESSION[$key]);
        }
    }

    public function destroy() {
        if ($this->sessionStarted) {
            session_destroy();
            $this->sessionStarted = false;
        }
    }

    public function regenerateId() {
        session_regenerate_id(true);
    }
}

// Тестирование
$session = new SessionManager();
$session->set('user_id', 123);
$session->set('username', 'john_doe');

echo "User ID: " . $session->get('user_id') . "<br>";
echo "Username: " . $session->get('username') . "<br>";

$session->remove('username');
echo "Username после удаления: " . ($session->has('username') ? 'есть' : 'нет') . "<br>";

$session->destroy();
echo "Сессия уничтожена<br>";