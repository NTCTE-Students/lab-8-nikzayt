<?php

trait Validatable {
    private $errors = [];

    public function validate() {
        $this->errors = [];
        $this->performValidation();
        return empty($this->errors);
    }

    public function getErrors() {
        return $this->errors;
    }

    public function addError($field, $message) {
        $this->errors[$field] = $message;
    }

    abstract protected function performValidation();
}

class RegistrationForm {
    use Validatable;

    private $username;
    private $email;
    private $password;
    private $passwordConfirm;

    public function __construct($username, $email, $password, $passwordConfirm) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->passwordConfirm = $passwordConfirm;
    }

    protected function performValidation() {
        if (empty($this->username)) {
            $this->addError('username', 'Имя пользователя обязательно');
        } elseif (strlen($this->username) < 4) {
            $this->addError('username', 'Имя пользователя должно быть не менее 4 символов');
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->addError('email', 'Некорректный email');
        }

        if (strlen($this->password) < 8) {
            $this->addError('password', 'Пароль должен быть не менее 8 символов');
        }

        if ($this->password !== $this->passwordConfirm) {
            $this->addError('passwordConfirm', 'Пароли не совпадают');
        }
    }
}

class LoginForm {
    use Validatable;

    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    protected function performValidation() {
        if (empty($this->username)) {
            $this->addError('username', 'Имя пользователя обязательно');
        }

        if (empty($this->password)) {
            $this->addError('password', 'Пароль обязателен');
        }
    }
}

// Тестирование
$registration = new RegistrationForm('john', 'john@example.com', '12345678', '12345678');
if ($registration->validate()) {
    echo "Регистрация прошла успешно!<br>";
} else {
    echo "Ошибки регистрации:<br>";
    foreach ($registration->getErrors() as $field => $error) {
        echo "{$field}: {$error}<br>";
    }
}

$login = new LoginForm('', '');
if (!$login->validate()) {
    echo "Ошибки входа:<br>";
    foreach ($login->getErrors() as $field => $error) {
        echo "{$field}: {$error}<br>";
    }
}