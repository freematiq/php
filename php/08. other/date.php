<?php

require "vendor/autoload.php";

$date = new DateTime();
echo $date->format('Y-m-d H:i:s'), PHP_EOL;
echo $date->getTimestamp(), PHP_EOL;

$date = new DateTime('now', new DateTimeZone('Europe/Moscow'));
echo $date->format('Y-m-d H:i:s'), PHP_EOL;

// public function setDate ($year, $month, $day) {}
$date->modify('+3 days');
echo $date->format('Y-m-d H:i:s'), PHP_EOL;

$date1 = new DateTime('2017-07-24 19:00');
$date2 = new DateTime('2017-01-01 0:00');

$result = $date2->diff($date1);
print_r($result);