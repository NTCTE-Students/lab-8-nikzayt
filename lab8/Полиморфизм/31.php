<?php

interface Notifier {
    public function send($message);
}

class EmailNotifier implements Notifier {
    private $email;

    public function __construct($email) {
        $this->email = $email;
    }

    public function send($message) {
        // Здесь была бы реальная отправка email
        return "Отправлено email на {$this->email}: {$message}";
    }
}

class SMSNotifier implements Notifier {
    private $phone;

    public function __construct($phone) {
        $this->phone = $phone;
    }

    public function send($message) {
        // Здесь была бы реальная отправка SMS
        return "Отправлено SMS на {$this->phone}: {$message}";
    }
}

class PushNotifier implements Notifier {
    private $deviceId;

    public function __construct($deviceId) {
        $this->deviceId = $deviceId;
    }

    public function send($message) {
        // Здесь была бы реальная отправка push-уведомления
        return "Отправлено push-уведомление на устройство {$this->deviceId}: {$message}";
    }
}

// Тестирование
$notifiers = [
    new EmailNotifier('user@example.com'),
    new SMSNotifier('+1234567890'),
    new PushNotifier('device123')
];

$message = "Важное сообщение! Пожалуйста, проверьте ваш аккаунт.";

foreach ($notifiers as $notifier) {
    echo $notifier->send($message) . "<br>";
}ы