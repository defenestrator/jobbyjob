<?php

namespace Database\Factories;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ListingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Listing::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $position = \App\Models\Position::factory()->create();
        return [
            'position_id' => $position->id,
            'expires' => $this->faker->dateTime(),
            'published' => $this->faker->dateTime(),
        ];
    }
}
