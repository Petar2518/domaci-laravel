<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Language::truncate();
        \App\Models\User::truncate();

        \App\Models\User::factory(10)->create();


        \App\Models\Language::create([
            'language'=>"English",
            'description'=>"Globally known language"
        ]);
        \App\Models\Language::create([
            'language'=>"French",
            'description'=>"Very popular language"
        ]);
        \App\Models\Language::create([
            'language'=>"German",
            'description'=>"Increasingly popular language considering workpower Germany needs"
        ]);
    }
}
