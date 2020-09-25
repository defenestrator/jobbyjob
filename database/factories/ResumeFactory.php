<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Resume;
use Faker\Generator as Faker;

$factory->define(Resume::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\Models\User::class),
        'active' => $faker->boolean,
        'stack_overflow' => $faker->word,
        'cv' => $faker->word,
        'phone' => $faker->phoneNumber,
        'github' => $faker->word,
        'linked_in' => $faker->word,
        'facebook' => $faker->word,
        'instagram' => $faker->word,
        'twitter' => $faker->word,
        'snapchat' => $faker->word,
    ];
});
