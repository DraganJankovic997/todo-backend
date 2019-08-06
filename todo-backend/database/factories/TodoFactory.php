<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Todo as Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        'title'=>$faker->text(20),
        'description'=>$faker->text(40),
        'user_id'=>$faker->numberBetween(1, 50),
        'priority'=>Todo::ARRAY[array_rand(Todo::ARRAY)],
        'done'=>false,
    ];
});


