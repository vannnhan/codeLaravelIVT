<?php

use Faker\Generator as Faker;

$factory->define(App\Cat::class, function (Faker $faker) {
	$breed_ids = App\Breed::pluck('id');
	$user_ids = App\User::pluck('id');
    return [
       	'name'=>$faker->name,
		'date_of_birth'=>$faker->date(),
		'breed_id'=>$faker->randomElement($breed_ids),
		'user_id'=>$faker->randomElement($user_ids),
		'created_at'=>$faker->dateTime(),
		'updated_at'=>$faker->dateTime()
    ];
});
