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
        return [
            'skill_id' => factory(\App\Models\Skill::class),
            'skillable_type' => $faker->word,
            'skillable_id' => $faker->randomNumber(),
        ];
    }
}
