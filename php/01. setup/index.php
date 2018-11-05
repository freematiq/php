<?php

$connectString = 'pgsql:dbname=php1;user=postgres;host=localhost;password=123';
$db = new PDO($connectString);

$stmt = $db->query('SELECT * FROM hello');
while ($row = $stmt->fetch())
{
    echo 'Hello, ' . $row['name'] . PHP_EOL;
}
