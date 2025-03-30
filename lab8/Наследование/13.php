<?php

class Material {
    public $title;
    public $author;

    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
    }

    public function getInfo() {
        return "Материал: '{$this->title}', автор: {$this->author}";
    }
}

class Book extends Material {
    public $pages;
    public $isbn;

    public function __construct($title, $author, $pages, $isbn) {
        parent::__construct($title, $author);
        $this->pages = $pages;
        $this->isbn = $isbn;
    }

    public function getInfo() {
        return parent::getInfo() . ", страниц: {$this->pages}, ISBN: {$this->isbn}";
    }
}

class Article extends Material {
    public $journal;
    public $doi;

    public function __construct($title, $author, $journal, $doi) {
        parent::__construct($title, $author);
        $this->journal = $journal;
        $this->doi = $doi;
    }

    public function getInfo() {
        return parent::getInfo() . ", журнал: {$this->journal}, DOI: {$this->doi}";
    }
}

class Video extends Material {
    public $duration;
    public $resolution;

    public function __construct($title, $author, $duration, $resolution) {
        parent::__construct($title, $author);
        $this->duration = $duration;
        $this->resolution = $resolution;
    }

    public function getInfo() {
        return parent::getInfo() . ", длительность: {$this->duration} мин, разрешение: {$this->resolution}";
    }
}

// Тестирование
$book = new Book('PHP для начинающих', 'Джон Смит', 350, '978-3-16-148410-0');
$article = new Article('Новые тенденции в веб-разработке', 'Алексей Петров', 'Журнал IT', '10.1000/xyz123');
$video = new Video('ООП в PHP', 'Мария Иванова', 45, '1080p');

echo $book->getInfo() . "<br>";
echo $article->getInfo() . "<br>";
echo $video->getInfo() . "<br>";