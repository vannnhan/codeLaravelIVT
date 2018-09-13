<?php

use Faker\Generator as Faker;

$factory->define(App\UserProfile::class, function (Faker $faker) {
    $users = App\User::pluck('id');
    return [
        'user_id' => $faker->randomElement($users),
        'address' => $faker->address,
        'phoneNumber' => $faker->phoneNumber
    ];
});
