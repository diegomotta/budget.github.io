<?php

use Faker\Generator as Faker;

$factory->define(\App\TypeAmount::class, function (Faker $faker) {
    return [
        //
        'value' => $faker->name,

    ];
});
