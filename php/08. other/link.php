<?php

require "vendor/autoload.php";

$user = new \Freematiq\User();
$user->setName('Ivan');
$user->setPassword('USSR');
echo $user;

$user = new \Freematiq\User();
$user->setName('Ivan')->setPassword('USSR');
echo $user;

