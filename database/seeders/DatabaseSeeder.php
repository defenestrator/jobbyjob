<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        $skills = explode(PHP_EOL, file_get_contents(base_path('database/seeders/skills.txt')));
        foreach($skills as $skill) {
            \App\Models\Skill::create(['name' => $skill]);
        }
    }
}
