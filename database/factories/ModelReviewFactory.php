<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(App\Model\Review::class, function (Faker $faker) {
    return [
        "guitar_id"=> App\Model\Guitar::inRandomOrder()->first(),
        "user_id"=> User::all()->random(),
        "review"=> $faker->text(),
        "star"=> random_int(0,5)
    ];

});