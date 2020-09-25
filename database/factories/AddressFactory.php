<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'addressable_id' => $faker->randomNumber(),
        'addressable_type' => $faker->word,
        'location' => $faker->word,
        'address_1' => $faker->word,
        'address_2' => $faker->word,
        'city' => $faker->city,
        'country' => $faker->country,
        'postcode' => $faker->postcode,
    ];
});
