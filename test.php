<?php

$first = function () {
    echo 'First!';
};

$second = function () {
    echo 'Second!';
};

$stack = [
    '20:52:00' => $first,
    '20:52:20' => $second,
    '20:52:30' => $first,
];

while (true) {
    $time = date('H:i:s');
    if (isset($stack[$time])) {
        $stack[$time]();
        unset($stack[$time]);
    }
}

