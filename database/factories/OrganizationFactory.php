<?php

use Faker\Generator as Faker;

$factory->define(App\Organizations::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->text(500),
        'email' => $faker->companyEmail,
        'phone' => str_random(10),
        'website' => $faker->url,
        'logo' => $faker->imageUrl(),
        'siren' => str_random(9),
        'ad_nbr' => str_random(2),
        'ad_type' => str_random(10),
        'ad_name' => str_random(20),
        'ad_pc' => str_random(5),
        'ad_city' => $faker->city,
        'unicode' => str_random(5),
        'owner_id' => $faker->randomDigit % 20,
    ];
});