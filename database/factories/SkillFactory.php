<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Skill;
use Faker\Generator as Faker;

$factory->define(Skill::class, function (Faker $faker) {
    return [
        'category_id' => factory(\App\Models\Category::class),
        'name' => $faker->name,
    ];
});
