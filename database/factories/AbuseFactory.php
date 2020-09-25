<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Abuse;
use Faker\Generator as Faker;

$factory->define(Abuse::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\Models\User::class),
        'abusable_id' => $faker->randomNumber(),
        'abusable_type' => $faker->word,
        'message' => $faker->text,
        'screenshot' => $faker->word,
    ];
});
