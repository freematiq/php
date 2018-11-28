<?php

require "vendor/autoload.php";

echo "Программа" . PHP_EOL;

try {
    echo "В блоке исключения" . PHP_EOL;
    if (true) {
        throw new \Exception("Что-то пошло не так!");
    }
    echo "Всё хорошо!"; // уже не выполнится
} catch (\Exception $e) {
    echo "Oops!" . PHP_EOL;
    echo "Problem: {$e->getMessage()}" . PHP_EOL;
}