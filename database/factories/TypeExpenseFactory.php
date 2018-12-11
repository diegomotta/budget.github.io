<?php

use Faker\Generator as Faker;

$factory->define(\App\TypeExpense::class, function (Faker $faker) {
    return [
        //
        'type' => $faker->name,
        'type_amount_id' =>$faker->unique()->numberBetween(1, 10000)
    ];
});
