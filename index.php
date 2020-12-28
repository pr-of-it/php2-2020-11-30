<?php

declare(strict_types=1);

require __DIR__ . '/autoload.php';

$ctrl = $_GET['ctrl'] ?? 'Index';
$class = '\App\Controllers\\' . $ctrl;

$controller = new $class();

try {
    $controller();
} catch (PDOException $e) {
    echo 'Возникла ошибка базы данных: ' . $e->getMessage();
} catch (Exception $e) {
    echo 'Возникла ошибка: ' . $e->getMessage();
}
