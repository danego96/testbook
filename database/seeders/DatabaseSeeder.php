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
        \App\Models\Group::factory(12)->has(\App\Models\Student::factory()->count(11))->create();
        \App\Models\Subject::factory(6)->create();
        \App\Models\Mark::factory(400)->create();
    }
}
