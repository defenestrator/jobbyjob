<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
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
    }
}
