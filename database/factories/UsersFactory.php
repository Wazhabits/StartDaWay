<?php

use Faker\Generator as Faker;

$factory->define(App\Users::class, function (Faker $faker) {
    return [
        'login' => $faker->userName,
        'password' => md5($faker->password(20)),

        'email' => $faker->email,
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'phone' => '0123456789',

        'image' => 'null',
        'level' => 1,

        'unicode' => $faker->randomAscii,
        'validate' => rand(0, 1),
    ];
});