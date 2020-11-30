<?php

require __DIR__ . '/autoload.php';

$data = \App\Models\Rubrics::findAll();

var_dump($data);
