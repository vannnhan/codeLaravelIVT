<?php

use Faker\Generator as Faker;
use App\Cat;

$factory->define(Cat::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'dob' => $faker->date(),
        'breed_id' => 1,
        'created_at'=>$faker->dateTime(),
		'updated_at'=>$faker->dateTime()
    ];
});
