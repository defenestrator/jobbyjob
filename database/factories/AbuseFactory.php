<?php

namespace Database\Factories;

use App\Models\Abuse;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AbuseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Abuse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => factory(\App\Models\User::class),
            'abusable_id' => $faker->randomNumber(),
            'abusable_type' => $faker->word,
            'message' => $faker->text,
            'screenshot' => $faker->word,
        ];
    }
}
