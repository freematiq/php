<?php

require "vendor/autoload.php";

use Freematiq\User;

// $user = new User('php', 'php123');
//
// $user->hello('param1', 42);


$users[] = new User('user', '123');
$users[] = new \Freematiq\Manager('manager', 'passwd');

foreach ($users as $user) {
    $user->printName();
}
//
//
// interface I {
//     public function f();
// }
