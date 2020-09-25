<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Position;
use Faker\Generator as Faker;

$factory->define(Position::class, function (Faker $faker) {
    return [
        'team_id' => factory(\App\Models\Team::class),
        'title' => $faker->sentence(4),
        'tagline' => $faker->word,
        'description' => $faker->text,
        'remote' => $faker->boolean,
        'compensation' => '{}',
        'type' => $faker->randomElement(["full-time","part-time","contract","task","bugfix"]),
    ];
});
