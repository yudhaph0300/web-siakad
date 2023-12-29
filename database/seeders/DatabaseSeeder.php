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

        \App\Models\Student::factory(48)->create();
        \App\Models\Admin::factory()->create([
            'name' => 'Admin',
            'username' => '123123',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);
        \App\Models\Student::factory()->create([
            'name' => 'Student',
            'username' => '123123',
            'password' => bcrypt('student'),
            'role' => 'student'
        ]);
    }
}
