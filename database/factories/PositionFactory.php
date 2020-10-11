<?php

namespace Database\Factories;

use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PositionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Position::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'team_id' => \App\Models\Team::factory()->create()->id,
            'title' => $this->faker->sentence(4),
            'tagline' => $this->faker->word,
            'description' => $this->faker->text,
            'remote' => $this->faker->boolean,
            'compensation' => '{}',
            'type' => $this->faker->randomElement(["full-time","part-time","contract","task","bugfix"]),
        ];
    }
}
