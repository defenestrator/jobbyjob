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
            'resume_id' => factory(\App\Models\Resume::class),
            'stack_overflow' => $faker->boolean,
            'cv' => $faker->boolean,
            'address' => $faker->boolean,
            'phone' => $faker->phoneNumber,
            'github' => $faker->boolean,
            'linked_in' => $faker->boolean,
            'facebook' => $faker->boolean,
            'instagram' => $faker->boolean,
            'twitter' => $faker->boolean,
            'snapchat' => $faker->boolean,
        ];
    }
}
