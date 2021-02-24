<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Guitar::class, function (Faker $faker) {
    return [
        "model"=> $faker->word(1),
        "pickups"=> (random_int(0,1)==1)?"SSS":"HS",
        "body_shape"=> $faker->name,
        "string"=> random_int(6,9)
    ];
});
