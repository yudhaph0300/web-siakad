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
            'name' => 'Mohammad Yudha Pamungkas',
            'username' => '123123',
            'password' => bcrypt('student'),
            'role' => 'student',
            'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
        ]);
        \App\Models\Student::factory()->create([
            'name' => 'Rafi Sabyan',
            'username' => '121212',
            'password' => bcrypt('student'),
            'role' => 'student',
            'image' => 'https://ik.imagekit.io/yudha/image%20siakad/WhatsApp%20Image%202024-01-02%20at%2016.28.53_5a6fb5d5_mYG3hO5m1.jpg?updatedAt=1704187847297'
        ]);
    }
}
