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
            'role' => 'student',
            'id_class' => 1
        ]);
        \App\Models\Student::factory()->create([
            'username' => 'solikin',
            'password' => bcrypt('password'),
            'nis' => '141414',
            'name' => 'Solikin Nikilos',
            'gender' => 1,
            'birthday' => '2015-03-31',
            'address' => 'Klampisan, Tondowulan, Plandaan, Jombang',
            'role' => 'student',
            'id_class' => 2
        ]);
        \App\Models\Student::factory()->create([
            'username' => 'fadwa',
            'password' => bcrypt('password'),
            'nis' => '141614',
            'name' => 'Fadwa Nazirah',
            'gender' => 2,
            'birthday' => '2015-03-31',
            'address' => 'Malang',
            'role' => 'student',
            'id_class' => 2
        ]);
        \App\Models\Student::factory()->create([
            'username' => 'maria',
            'password' => bcrypt('password'),
            'nis' => '110614',
            'name' => 'Maria Astrid',
            'gender' => 2,
            'birthday' => '2015-03-31',
            'address' => 'Malang',
            'role' => 'student',
            'id_class' => 2
        ]);
        \App\Models\Student::factory()->create([
            'username' => 'hedara',
            'password' => bcrypt('password'),
            'nis' => '140814',
            'name' => 'Hedara Putri',
            'gender' => 2,
            'birthday' => '2015-03-31',
            'address' => 'Malang',
            'role' => 'student',
            'id_class' => 3
        ]);
        \App\Models\Student::factory()->create([
            'username' => 'bela',
            'password' => bcrypt('password'),
            'nis' => '140104',
            'name' => 'Nabela Zakaria',
            'gender' => 2,
            'birthday' => '2015-03-31',
            'address' => 'Malang',
            'role' => 'student',
            'id_class' => 3
        ]);
        \App\Models\Student::factory()->create([
            'username' => 'abdillah',
            'password' => bcrypt('password'),
            'nis' => '153104',
            'name' => 'Muhammad Abdilllah',
            'gender' => 1,
            'birthday' => '2015-03-31',
            'address' => 'Malang',
            'role' => 'student',
            'id_class' => 3
        ]);


        \App\Models\Admin::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        \App\Models\Teacher::factory()->create([
            'nik' => '11111',
            'name' => 'Samuji',
            'gender' => 1,
            'address' => 'Klampisan Tondowulan Plandaan Jombang',
            'username' => '11111',
            'password' => bcrypt('password'),
            'role' => 'teacher'
        ]);
        \App\Models\Teacher::factory()->create([
            'nik' => '22222',
            'name' => 'Sriyono',
            'gender' => 1,
            'address' => 'Klampisan Tondowulan Plandaan Jombang',
            'username' => '22222',
            'password' => bcrypt('password'),
            'role' => 'teacher'
        ]);
        \App\Models\Teacher::factory()->create([
            'nik' => '33333',
            'name' => 'Ratna',
            'gender' => 2,
            'address' => 'Klampisan Tondowulan Plandaan Jombang',
            'username' => '33333',
            'password' => bcrypt('password'),
            'role' => 'teacher'
        ]);
        \App\Models\Teacher::factory()->create([
            'nik' => '44444',
            'name' => 'Hermanto',
            'gender' => 1,
            'address' => 'Klampisan Tondowulan Plandaan Jombang',
            'username' => '44444',
            'password' => bcrypt('password'),
            'role' => 'teacher'
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
        \App\Models\ClassName::factory()->create([
            'name' => '9A',
            'id_academic_year' => '1',
            'id_teacher' => '3'
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
            'id_teacher' => '1',
            'id_academic_year' => '1'
        ]);
        Learning::create([
            'id_class' => '1',
            'id_lesson' => '2',
            'id_teacher' => '2',
            'id_academic_year' => '1'
        ]);
        Learning::create([
            'id_class' => '1',
            'id_lesson' => '3',
            'id_teacher' => '3',
            'id_academic_year' => '1'
        ]);
        Learning::create([
            'id_class' => '1',
            'id_lesson' => '4',
            'id_teacher' => '4',
            'id_academic_year' => '1'
        ]);
        Learning::create([
            'id_class' => '2',
            'id_lesson' => '1',
            'id_teacher' => '1',
            'id_academic_year' => '1'
        ]);
        Learning::create([
            'id_class' => '2',
            'id_lesson' => '2',
            'id_teacher' => '2',
            'id_academic_year' => '1'
        ]);
        Learning::create([
            'id_class' => '2',
            'id_lesson' => '3',
            'id_teacher' => '3',
            'id_academic_year' => '1'
        ]);
        Learning::create([
            'id_class' => '2',
            'id_lesson' => '4',
            'id_teacher' => '4',
            'id_academic_year' => '1'
        ]);
        Learning::create([
            'id_class' => '3',
            'id_lesson' => '1',
            'id_teacher' => '1',
            'id_academic_year' => '1'
        ]);
        Learning::create([
            'id_class' => '3',
            'id_lesson' => '2',
            'id_teacher' => '2',
            'id_academic_year' => '1'
        ]);
        Learning::create([
            'id_class' => '3',
            'id_lesson' => '3',
            'id_teacher' => '3',
            'id_academic_year' => '1'
        ]);
        Learning::create([
            'id_class' => '3',
            'id_lesson' => '4',
            'id_teacher' => '4',
            'id_academic_year' => '1'
        ]);


        \App\Models\AcademicYear::factory()->create([
            'tahun_pelajaran' => '2020/2021',
            'semester' => '1',
        ]);
    }
}
