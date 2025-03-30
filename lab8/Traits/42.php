<?php

trait Timestampable {
    private $createdAt;
    private $updatedAt;

    public function setCreatedAt($date = null) {
        $this->createdAt = $date ?: date('Y-m-d H:i:s');
    }

    public function setUpdatedAt($date = null) {
        $this->updatedAt = $date ?: date('Y-m-d H:i:s');
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function touch() {
        $this->setUpdatedAt();
    }
}

class Post {
    use Timestampable;

    private $title;
    private $content;

    public function __construct($title, $content) {
        $this->title = $title;
        $this->content = $content;
        $this->setCreatedAt();
        $this->setUpdatedAt();
    }

    public function updateContent($newContent) {
        $this->content = $newContent;
        $this->touch();
    }

    public function getInfo() {
        return "Пост '{$this->title}' создан: {$this->getCreatedAt()}, обновлен: {$this->getUpdatedAt()}";
    }
}

class Comment {
    use Timestampable;

    private $text;
    private $author;

    public function __construct($text, $author) {
        $this->text = $text;
        $this->author = $author;
        $this->setCreatedAt();
    }

    public function edit($newText) {
        $this->text = $newText;
        $this->touch();
    }

    public function getInfo() {
        return "Комментарий от {$this->author}, создан: {$this->getCreatedAt()}" . 
               ($this->getUpdatedAt() ? ", обновлен: {$this->getUpdatedAt()}" : "");
    }
}

// Тестирование
$post = new Post('Новый пост', 'Содержание поста');
echo $post->getInfo() . "<br>";

sleep(1); // Имитация задержки
$post->updateContent('Обновленное содержание');
echo $post->getInfo() . "<br>";

$comment = new Comment('Отличный пост!', 'Аноним');
echo $comment->getInfo() . "<br>";

sleep(1);
$comment->edit('Очень полезный пост!');
echo $comment->getInfo() . "<br>";