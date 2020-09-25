<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Listing;
use Faker\Generator as Faker;

$factory->define(Listing::class, function (Faker $faker) {
    return [
        'position_id' => factory(\App\Models\Position::class),
        'expires' => $faker->dateTime(),
        'published' => $faker->dateTime(),
    ];
});
