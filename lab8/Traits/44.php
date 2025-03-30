<?php

trait Cacheable {
    private $cache = [];
    private $cacheEnabled = true;

    // Включение кэширования
    public function enableCache() {
        $this->cacheEnabled = true;
        return $this;
    }

    // Отключение кэширования
    public function disableCache() {
        $this->cacheEnabled = false;
        return $this;
    }

    // Получение данных из кэша
    public function getCache($key) {
        if (!$this->cacheEnabled || !isset($this->cache[$key])) {
            return null;
        }
        return $this->cache[$key];
    }

    // Сохранение данных в кэш
    public function setCache($key, $value) {
        if ($this->cacheEnabled) {
            $this->cache[$key] = $value;
        }
        return $this;
    }

    // Очистка кэша
    public function clearCache() {
        $this->cache = [];
        return $this;
    }

    // Проверка наличия данных в кэше
    public function hasCache($key) {
        return isset($this->cache[$key]);
    }
}

class ProductRepository {
    use Cacheable;

    private $products = [
        1 => ['id' => 1, 'name' => 'iPhone 13', 'price' => 999],
        2 => ['id' => 2, 'name' => 'Samsung Galaxy', 'price' => 899],
        3 => ['id' => 3, 'name' => 'Google Pixel', 'price' => 799]
    ];

    // Получение продукта по ID с использованием кэша
    public function getProductById($id) {
        $cacheKey = "product_{$id}";
        
        // Пытаемся получить данные из кэша
        $cachedProduct = $this->getCache($cacheKey);
        if ($cachedProduct !== null) {
            echo "Продукт из кэша: ";
            return $cachedProduct;
        }

        echo "Продукт из базы данных: ";
        
        // Получаем данные из "базы данных" (в нашем случае из массива)
        $product = $this->products[$id] ?? null;
        
        // Если продукт найден, сохраняем в кэш
        if ($product) {
            $this->setCache($cacheKey, $product);
        }
        
        return $product;
    }

    // Обновление продукта с инвалидацией кэша
    public function updateProduct($id, $newData) {
        if (!isset($this->products[$id])) {
            return false;
        }
        
        $this->products[$id] = array_merge($this->products[$id], $newData);
        $this->clearCache("product_{$id}"); // Очищаем кэш для этого продукта
        return true;
    }
}

// Тестирование системы кэширования

// Создаем репозиторий
$productRepo = new ProductRepository();

// Первый запрос - данные берутся из базы
echo print_r($productRepo->getProductById(1), true) . "<br>";

// Второй запрос - данные берутся из кэша
echo print_r($productRepo->getProductById(1), true) . "<br>";

// Отключаем кэширование
$productRepo->disableCache();
echo print_r($productRepo->getProductById(2), true) . "<br>"; // Из базы
echo print_r($productRepo->getProductById(2), true) . "<br>"; // Снова из базы (кэш отключен)

// Включаем кэширование обратно
$productRepo->enableCache();

// Обновляем продукт
$productRepo->updateProduct(1, ['price' => 1099]);
echo print_r($productRepo->getProductById(1), true) . "<br>"; // Из базы (кэш был очищен при обновлении)
echo print_r($productRepo->getProductById(1), true) . "<br>"; // Из кэша

// Очищаем весь кэш
$productRepo->clearCache();
echo print_r($productRepo->getProductById(3), true) . "<br>"; // Из базы
echo print_r($productRepo->getProductById(3), true) . "<br>"; // Из кэша