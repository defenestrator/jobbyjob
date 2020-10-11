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
            'user_id' => \App\Models\User::factory()->make(),
            'abusable_id' => $this->faker->numberBetween(1,10),
            'abusable_type' => $this->faker->word,
            'message' => $this->faker->text,
            'screenshot' => $this->faker->word,
        ];
    }
}
