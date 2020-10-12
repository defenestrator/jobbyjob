<?php

namespace Database\Factories;

use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

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
            'team_id' => \App\Models\Team::factory()->create()->id,
            'title' => $this->faker->sentence(4),
            'tagline' => $this->faker->word,
            'description' => $this->faker->text,
            'remote' => $this->faker->boolean,
            'compensation' => $this->jsonGenerator(),
            'expires' => now()->addDays(30),
            'published' => now(),
            'type' => $this->faker->randomElement(["full-time","part-time","contract","task","bugfix"]),
        ];
    }

    protected function jsonGenerator()
    {
        $salary_min = $this->faker->numberBetween(60000, 100000);
        $salary_max = $salary_min + $this->faker->numberBetween(1, 900000);
        $compensation = json_encode([
            'salary_min'    => $salary_min,
            'salary_max'    => $salary_max,
            '401k'          => '100% matching',
            'health'        => 'comprehensive',
            'equity'        => true
            ]);

        return $this->faker->randomElement(['banana', json_encode('{donkey: "equine", pigeon: "avian dinosaur"}'), $compensation]);
    }
}
