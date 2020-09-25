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
            'team_id' => factory(\App\Models\Team::class),
            'title' => $faker->sentence(4),
            'tagline' => $faker->word,
            'description' => $faker->text,
            'remote' => $faker->boolean,
            'compensation' => '{}',
            'type' => $faker->randomElement(["full-time","part-time","contract","task","bugfix"]),
        ];
    }
}
