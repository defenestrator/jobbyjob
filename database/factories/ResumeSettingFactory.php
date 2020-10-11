<?php

namespace Database\Factories;

use App\Models\ResumeSetting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ResumeSettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ResumeSetting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'resume_id' => \App\Models\Resume::factory()->make(),
            'stack_overflow' => $this->faker->boolean,
            'cv' => $this->faker->boolean,
            'address' => $this->faker->boolean,
            'phone' => $this->faker->phoneNumber,
            'github' => $this->faker->boolean,
            'linked_in' => $this->faker->boolean,
            'facebook' => $this->faker->boolean,
            'instagram' => $this->faker->boolean,
            'twitter' => $this->faker->boolean,
            'snapchat' => $this->faker->boolean,
        ];
    }
}
