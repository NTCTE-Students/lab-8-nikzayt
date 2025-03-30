<?php

interface Database {
    public function connect();
    public function query($sql);
}

class MySQLDatabase implements Database {
    private $connection;

    public function connect() {
        // Здесь было бы реальное подключение
        $this->connection = true;
        return "Подключение к MySQL установлено";
    }

    public function query($sql) {
        if (!$this->connection) {
            throw new Exception("Сначала нужно подключиться к базе данных");
        }
        // Здесь была бы реальная отправка запроса
        return "Выполнение MySQL запроса: {$sql}";
    }
}

class PostgreSQLDatabase implements Database {
    private $connection;

    public function connect() {
        // Здесь было бы реальное подключение
        $this->connection = true;
        return "Подключение к PostgreSQL установлено";
    }

    public function query($sql) {
        if (!$this->connection) {
            throw new Exception("Сначала нужно подключиться к базе данных");
        }
        // Здесь была бы реальная отправка запроса
        return "Выполнение PostgreSQL запроса: {$sql}";
    }
}

class SQLiteDatabase implements Database {
    private $connection;

    public function connect() {
        // Здесь было бы реальное подключение
        $this->connection = true;
        return "Подключение к SQLite установлено";
    }

    public function query($sql) {
        if (!$this->connection) {
            throw new Exception("Сначала нужно подключиться к базе данных");
        }
        // Здесь была бы реальная отправка запроса
        return "Выполнение SQLite запроса: {$sql}";
    }
}

// Тестирование
$databases = [
    new MySQLDatabase(),
    new PostgreSQLDatabase(),
    new SQLiteDatabase()
];

foreach ($databases as $db) {
    echo $db->connect() . "<br>";
    echo $db->query("SELECT * FROM users") . "<br>";
}