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
            'resume_id' => \App\Models\Resume::factory()->create()->id,
            'stack_overflow_visible' => $this->faker->boolean,
            'cv_visible' => $this->faker->boolean,
            'address_visible' => $this->faker->boolean,
            'phone_visible' => $this->faker->boolean,
            'github_visible' => $this->faker->boolean,
            'linked_in_visible' => $this->faker->boolean,
        ];
    }
}
