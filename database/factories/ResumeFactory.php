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
        return [
            'user_id' => factory(\App\Models\User::class),
            'active' => $faker->boolean,
            'stack_overflow' => $faker->word,
            'cv' => $faker->word,
            'phone' => $faker->phoneNumber,
            'github' => $faker->word,
            'linked_in' => $faker->word,
            'facebook' => $faker->word,
            'instagram' => $faker->word,
            'twitter' => $faker->word,
            'snapchat' => $faker->word,
        ];
    }
}
