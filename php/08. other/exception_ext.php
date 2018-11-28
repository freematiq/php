<?php

use Freematiq\LearningException;

require "vendor/autoload.php";

echo "Программа" . PHP_EOL;

try {
    echo "В блоке исключения" . PHP_EOL;
    if (true) {
        throw new LearningException("Что-то пошло не так!");
    }
    echo "Всё хорошо!"; // уже не выполнится
} catch (LearningException $e) {
    echo "Ой!" . PHP_EOL;
    echo "Наша учебная ошибка: {$e->getMessage()}" . PHP_EOL;
} catch (\Exception $e) {
    echo "Oops!" . PHP_EOL;
    echo "Problem: {$e->getMessage()}" . PHP_EOL;
}