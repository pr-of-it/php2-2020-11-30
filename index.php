<?php

declare(strict_types=1);

require __DIR__ . '/autoload.php';

$view = new \App\View();

$view->products = \App\Models\Product::findAll();

$view->display(__DIR__ . '/App/Templates/index.php');
