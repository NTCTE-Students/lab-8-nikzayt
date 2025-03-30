<?php

abstract class Document {
    protected $content;

    public function __construct($content) {
        $this->content = $content;
    }

    abstract public function save($filename);
}

class PDFDocument extends Document {
    public function save($filename) {
        // Здесь была бы реальная генерация PDF
        file_put_contents($filename . '.pdf', "PDF Content: " . $this->content);
        return "Документ сохранен как PDF: {$filename}.pdf";
    }
}

class WordDocument extends Document {
    public function save($filename) {
        // Здесь была бы реальная генерация Word
        file_put_contents($filename . '.docx', "Word Content: " . $this->content);
        return "Документ сохранен как Word: {$filename}.docx";
    }
}

class ExcelDocument extends Document {
    public function save($filename) {
        // Здесь была бы реальная генерация Excel
        file_put_contents($filename . '.xlsx', "Excel Content: " . $this->content);
        return "Документ сохранен как Excel: {$filename}.xlsx";
    }
}

// Тестирование
$documents = [
    new PDFDocument('Это содержимое PDF документа'),
    new WordDocument('Это содержимое Word документа'),
    new ExcelDocument('Это содержимое Excel документа')
];

foreach ($documents as $document) {
    $filename = 'document_' . uniqid();
    echo $document->save($filename) . "<br>";
}