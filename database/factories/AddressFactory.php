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
        $addressables = ['App\Models\Team', 'App\Models\User', 'App\Models\Resume'];
        return [
            'addressable_id' => $this->faker->numberBetween(1,10),
            'addressable_type' => $this->faker->randomElement($addressables),
            'address_1' => $this->faker->address,
            'address_2' => $this->faker->buildingNumber,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'postcode' => $this->faker->postcode,
        ];
    }
}
