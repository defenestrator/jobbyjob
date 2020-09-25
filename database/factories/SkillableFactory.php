<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Skillable;
use Faker\Generator as Faker;

$factory->define(Skillable::class, function (Faker $faker) {
    return [
        'skill_id' => factory(\App\Models\Skill::class),
        'skillable_type' => $faker->word,
        'skillable_id' => $faker->randomNumber(),
    ];
});
