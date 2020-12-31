<?php

$autoload = function ($className)
{
    $parts = explode('\\', $className);
    unset($parts[0]);
    $file = __DIR__ . '/src/' . implode('/', $parts) . '.php';
    if (is_readable($file)) {
        require $file;
    }
};

spl_autoload_register($autoload);
