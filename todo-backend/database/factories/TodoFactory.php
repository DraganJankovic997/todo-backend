<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    $arr = ['LOW', 'MEDIUM', 'HIGH'];
    return [
        'title'=>$faker->text(20),
        'description'=>$faker->text(40),
        'user_id'=>$faker->numberBetween(1, 50),
        'priority'=>$arr[array_rand($arr)],
        'done'=>false,
    ];
});


