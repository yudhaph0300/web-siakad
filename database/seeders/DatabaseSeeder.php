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

        \App\Models\Teacher::factory(50)->create();
        \App\Models\Teacher::factory()->create([
            'name' => 'John Doe',
            'username' => '121212',
            'password' => bcrypt('teacher'),
            'role' => 'teacher',
            'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
        ]);
        \App\Models\AcademicYear::factory()->create([
            'name' => '2023/2024',
            'semester' => 1,
        ]);
        \App\Models\AcademicYear::factory()->create([
            'name' => '2023/2024',
            'semester' => 2,
        ]);

        \App\Models\ClassName::factory()->create([
            'name' => '1 A',
            'id_teacher' => 1,
            'id_year' => 1
        ]);
        \App\Models\ClassName::factory()->create([
            'name' => '1 B',
            'id_teacher' => 2,
            'id_year' => 1
        ]);
        \App\Models\ClassName::factory()->create([
            'name' => '2 A',
            'id_teacher' => 3,
            'id_year' => 1
        ]);
        \App\Models\ClassName::factory()->create([
            'name' => '2 B',
            'id_teacher' => 4,
            'id_year' => 1
        ]);
        \App\Models\ClassName::factory()->create([
            'name' => '3 A',
            'id_teacher' => 5,
            'id_year' => 1
        ]);
        \App\Models\ClassName::factory()->create([
            'name' => '3 B',
            'id_teacher' => 6,
            'id_year' => 1
        ]);

        \App\Models\Student::factory()->create([
            'username' => '123123',
            'password' => bcrypt('student'),
            'nis' => '123123',
            'name' => 'Mohammad Yudha Pamungkas',
            'gender' => 1,
            'birthday' => '2015-03-31',
            'address' => 'Klampisan, Tondowulan, Plandaan, Jombang',
            'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'role' => 'student',
            'id_class' => 1
        ]);

        \App\Models\Student::factory(250)->create();

        \App\Models\Admin::factory()->create([
            'name' => 'Admin',
            'username' => '123123',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);
    }
}
