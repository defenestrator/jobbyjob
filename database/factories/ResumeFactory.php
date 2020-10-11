<?php

namespace Database\Factories;

use App\Models\Resume;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ResumeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resume::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $team = \App\Models\Team::factory()->create();
        return [
            'user_id' => $team->user_id,
            'active' => $this->faker->boolean,
            'stack_overflow' => $this->faker->word,
            'cv' => $this->faker->word,
            'phone' => $this->faker->phoneNumber,
            'github' => $this->faker->word,
            'linked_in' => $this->faker->word,
            'facebook' => $this->faker->word,
            'instagram' => $this->faker->word,
            'twitter' => $this->faker->word,
            'snapchat' => $this->faker->word,
        ];
    }
}
