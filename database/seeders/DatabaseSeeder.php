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

        \App\Models\Student::factory(50)->create();
        \App\Models\Teacher::factory(50)->create();
        \App\Models\Admin::factory()->create([
            'name' => 'Admin',
            'username' => '123123',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);
        \App\Models\Student::factory()->create([
            'name' => 'Mohammad Yudha Pamungkas',
            'username' => '123123',
            'password' => bcrypt('student'),
            'role' => 'student',
            'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
        ]);
        \App\Models\Teacher::factory()->create([
            'name' => 'John Doe',
            'username' => '121212',
            'password' => bcrypt('teacher'),
            'role' => 'teacher',
            'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
        ]);
    }
}
