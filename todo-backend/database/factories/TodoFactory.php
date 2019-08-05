<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        'do'=>$faker->text(40),
        'untill_date'=>$faker->date(),
        'untill_time'=>$faker->time('H:i'),
        'user_id'=>$faker->numberBetween(1, 50),
        'done'=>false,
    ];
});


//id, do, date, time,user_id, done
