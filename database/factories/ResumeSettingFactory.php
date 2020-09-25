<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ResumeSetting;
use Faker\Generator as Faker;

$factory->define(ResumeSetting::class, function (Faker $faker) {
    return [
        'resume_id' => factory(\App\Models\Resume::class),
        'stack_overflow' => $faker->boolean,
        'cv' => $faker->boolean,
        'address' => $faker->boolean,
        'phone' => $faker->phoneNumber,
        'github' => $faker->boolean,
        'linked_in' => $faker->boolean,
        'facebook' => $faker->boolean,
        'instagram' => $faker->boolean,
        'twitter' => $faker->boolean,
        'snapchat' => $faker->boolean,
    ];
});
