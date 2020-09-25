<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Application;
use Faker\Generator as Faker;

$factory->define(Application::class, function (Faker $faker) {
    return [
        'resume_id' => factory(\App\Models\Resume::class),
        'listing_id' => factory(\App\Models\Listing::class),
    ];
});
