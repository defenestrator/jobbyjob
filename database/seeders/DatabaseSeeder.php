<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $skills = explode(PHP_EOL, file_get_contents(base_path('database/seeders/skills.txt')));
        foreach($skills as $skill) {
            \App\Models\Skill::create(['name' => $skill]);
        }

        \App\Models\Application::factory()->times(10)->create();
        $skillables = ['App\Models\Resume', 'App\Models\Position'];
        // the final countdooooown
        for($i = 50; $i > 0; $i -=1 ) {
            DB::table('skillables')->insert([
                'skill_id' => rand(1,964),
                'skillable_type' => $skillables[array_rand($skillables)],
                'skillable_id' => rand(1, 10),
            ]);
        }
    }
}
