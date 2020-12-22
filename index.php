<?php

declare(strict_types=1);

require __DIR__ . '/autoload.php';

$ctrl = $_GET['ctrl'] ?? 'Index';
$class = '\App\Controllers\\' . $ctrl;

$controller = new $class();
$controller();
