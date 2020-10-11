<?php

namespace Database\Factories;

use App\Models\Skillable;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SkillableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Skillable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $skillables = ['App\Models\Resume', 'App\Models\Position'];
        return [
            'skill_id' => $this->faker->numberBetween(1,964),
            'skillable_type' => $this->faker->randomElement($skillables),
            'skillable_id' => $this->faker->numberBetween(1, 30),
        ];
    }
}
