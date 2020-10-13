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
        \App\Models\Application::factory()->times(10000)->create();

        $skillable = \App\Models\Skill::all();

        \App\Models\Resume::all()->each( function ($resume) use ($skillable){
            $resume->skills()->attach(
                $skillable->random(rand(5,13))->pluck('id')->toArray()
            );
        });

        \App\Models\Position::all()->each( function ($position) use ($skillable){
            $position->skills()->attach(
                $skillable->random(rand(5,13))->pluck('id')->toArray()
            );
        });

    }

}

