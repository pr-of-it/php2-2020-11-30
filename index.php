<?php

declare(strict_types=1);

use App\Models\HasPriceInterface;
use App\Models\Product;

require __DIR__ . '/autoload.php';

$product = new Product();
$product->name = 'Сумка кожаная';
$product->price = 5500;
$product->weight = 1.5;
$product->insert();

var_dump($product);