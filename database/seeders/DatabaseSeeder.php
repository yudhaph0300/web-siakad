<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ClassMember;
use App\Models\Learning;
use App\Models\Lesson;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\Student::factory()->create([
            'username' => 'yudha',
            'password' => bcrypt('password'),
            'nis' => '123123',
            'name' => 'Mohammad Yudha Pamungkas',
            'gender' => 1,
            'birthday' => '2015-03-31',
            'address' => 'Klampisan, Tondowulan, Plandaan, Jombang',
            'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'role' => 'student',
            'id_class' => 1
        ]);
        \App\Models\Student::factory()->create([
            'username' => 'saipul',
            'password' => bcrypt('password'),
            'nis' => '121212',
            'name' => 'Saipul Akbar',
            'gender' => 1,
            'birthday' => '2015-03-31',
            'address' => 'Klampisan, Tondowulan, Plandaan, Jombang',
            'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'role' => 'student',
            'id_class' => 1
        ]);
        \App\Models\Student::factory()->create([
            'username' => 'rozi',
            'password' => bcrypt('password'),
            'nis' => '131313',
            'name' => 'Rozi Saksono',
            'gender' => 1,
            'birthday' => '2015-03-31',
            'address' => 'Klampisan, Tondowulan, Plandaan, Jombang',
            'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'role' => 'student',
            'id_class' => 2
        ]);
        \App\Models\Student::factory()->create([
            'username' => 'solikin',
            'password' => bcrypt('password'),
            'nis' => '141414',
            'name' => 'Solikin Nikilos',
            'gender' => 1,
            'birthday' => '2015-03-31',
            'address' => 'Klampisan, Tondowulan, Plandaan, Jombang',
            'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'role' => 'student',
            'id_class' => 2
        ]);


        \App\Models\Admin::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        \App\Models\Teacher::factory()->create([
            'name' => 'Samuji',
            'username' => 'samuji',
            'password' => bcrypt('password'),
            'role' => 'teacher',
            'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
        ]);
        \App\Models\Teacher::factory()->create([
            'name' => 'Sriyono',
            'username' => 'sriyono',
            'password' => bcrypt('password'),
            'role' => 'teacher',
            'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
        ]);
        \App\Models\Teacher::factory()->create([
            'name' => 'Ratna',
            'username' => 'ratna',
            'password' => bcrypt('password'),
            'role' => 'teacher',
            'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
        ]);



        \App\Models\ClassName::factory()->create([
            'name' => '7A',
            'id_academic_year' => '1',
            'id_teacher' => '1'
        ]);
        \App\Models\ClassName::factory()->create([
            'name' => '8A',
            'id_academic_year' => '1',
            'id_teacher' => '2'
        ]);




        Lesson::create([
            'id_academic_year' => '1',
            'name' => 'Bahasa Indonesia',
        ]);
        Lesson::create([
            'id_academic_year' => '1',
            'name' => 'Matematika',
        ]);
        Lesson::create([
            'id_academic_year' => '1',
            'name' => 'IPA',
        ]);
        Lesson::create([
            'id_academic_year' => '1',
            'name' => 'IPS',
        ]);


        Learning::create([
            'id_class' => '1',
            'id_lesson' => '1',
            'id_teacher' => '1'
        ]);
        Learning::create([
            'id_class' => '1',
            'id_lesson' => '2',
            'id_teacher' => '2'
        ]);
        Learning::create([
            'id_class' => '1',
            'id_lesson' => '3',
            'id_teacher' => '3'
        ]);
        Learning::create([
            'id_class' => '1',
            'id_lesson' => '4',
            'id_teacher' => '1'
        ]);
        Learning::create([
            'id_class' => '2',
            'id_lesson' => '1',
            'id_teacher' => '1'
        ]);
        Learning::create([
            'id_class' => '2',
            'id_lesson' => '2',
            'id_teacher' => '2'
        ]);
        Learning::create([
            'id_class' => '2',
            'id_lesson' => '3',
            'id_teacher' => '3'
        ]);
        Learning::create([
            'id_class' => '2',
            'id_lesson' => '4',
            'id_teacher' => '1'
        ]);


        \App\Models\AcademicYear::factory()->create([
            'tahun_pelajaran' => '2020/2021',
            'semester' => '1',
        ]);


        ClassMember::create([
            'id_student' => '1',
            'id_class' => '1',
        ]);
        ClassMember::create([
            'id_student' => '2',
            'id_class' => '1',
        ]);
        ClassMember::create([
            'id_student' => '3',
            'id_class' => '2',
        ]);
        ClassMember::create([
            'id_student' => '4',
            'id_class' => '2',
        ]);
    }
}
