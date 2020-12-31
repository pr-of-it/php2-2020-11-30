<?php

$autoload = function ($className) {
    $file = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
    if (is_readable($file)) {
        require $file;
    }
};

spl_autoload_register($autoload);

require __DIR__ . '/lib/mailer/autoload.php';
require __DIR__ . '/vendor/autoload.php';

