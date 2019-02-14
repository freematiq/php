<?php

$faker = Faker\Factory::create();

return [
    'user1' => [
        'id' => 1,
        'username' => $faker->name(),
        'email' => $faker->email(),
        'auth_key' => 'K3nF70it7tzNsHddEiq0BZ0i-OU8S3xV',
        'password_hash' => '$2y$13$WSyE5hHsG1rWN2jV8LRHzubilrCLI5Ev/iK0r3jRuwQEs2ldRu.a2',
    ],
    'user2' => [
        'id' => 2,
        'username' => 'napoleon69',
        'email' => 'aileen.barton@heaneyschumm.com',
        'auth_key' => 'dZlXsVnIDgIzFgX4EduAqkEPuphhOh9q',
        'password_hash' => '$2y$13$kkgpvJ8lnjKo8RuoR30ay.RjDf15bMcHIF7Vz1zz/6viYG5xJExU6',
    ],
    'php' => [
        'id' => 100,
        'username' => 'php',
        'email' => 'sd@freematiq.com',
        'auth_key' => 'php_auth',
        'password_hash' => '$2y$13$MVweziVsttfK2ldDyMbBF.d82drP2oiUsq1G8S5OHYlRIC1Ey6OdS',
    ],
];