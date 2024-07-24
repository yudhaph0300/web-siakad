<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'username' => '153105',
            'telp' => '89698289699',
            'password' => bcrypt('password'),
            'nis' => '153105',
            'name' => 'Andi Permana',
            'gender' => 1,
            'birthday' => '2014-01-15',
            'address' => 'Surabaya',
            'role' => 'student',
            'id_class' => 2
        ]);

        \App\Models\Student::factory()->create([
            'username' => '153106',
            'telp' => '89698289699',
            'password' => bcrypt('password'),
            'nis' => '153106',
            'name' => 'Budi Santoso',
            'gender' => 1,
            'birthday' => '2013-05-23',
            'address' => 'Jakarta',
            'role' => 'student',
            'id_class' => 3
        ]);

        \App\Models\Student::factory()->create([
            'username' => '153107',
            'telp' => '89698289699',
            'password' => bcrypt('password'),
            'nis' => '153107',
            'name' => 'Citra Dewi',
            'gender' => 2,
            'birthday' => '2015-07-12',
            'address' => 'Bandung',
            'role' => 'student',
            'id_class' => 1
        ]);

        \App\Models\Student::factory()->create([
            'username' => '153108',
            'telp' => '89698289699',
            'password' => bcrypt('password'),
            'nis' => '153108',
            'name' => 'Dedi Firmansyah',
            'gender' => 1,
            'birthday' => '2012-11-08',
            'address' => 'Yogyakarta',
            'role' => 'student',
            'id_class' => 2
        ]);

        \App\Models\Student::factory()->create([
            'username' => '153109',
            'telp' => '89698289699',
            'password' => bcrypt('password'),
            'nis' => '153109',
            'name' => 'Eka Lestari',
            'gender' => 2,
            'birthday' => '2014-03-17',
            'address' => 'Semarang',
            'role' => 'student',
            'id_class' => 1
        ]);

        \App\Models\Student::factory()->create([
            'username' => '153110',
            'telp' => '89698289699',
            'password' => bcrypt('password'),
            'nis' => '153110',
            'name' => 'Fajar Nugroho',
            'gender' => 1,
            'birthday' => '2013-09-25',
            'address' => 'Surabaya',
            'role' => 'student',
            'id_class' => 3
        ]);

        \App\Models\Student::factory()->create([
            'username' => '153111',
            'telp' => '89698289699',
            'password' => bcrypt('password'),
            'nis' => '153111',
            'name' => 'Gita Anggraeni',
            'gender' => 2,
            'birthday' => '2015-01-13',
            'address' => 'Malang',
            'role' => 'student',
            'id_class' => 3
        ]);

        \App\Models\Student::factory()->create([
            'username' => '153112',
            'telp' => '89698289699',
            'password' => bcrypt('password'),
            'nis' => '153112',
            'name' => 'Hendra Pratama',
            'gender' => 1,
            'birthday' => '2012-04-18',
            'address' => 'Makassar',
            'role' => 'student',
            'id_class' => 2
        ]);

        \App\Models\Student::factory()->create([
            'username' => '153113',
            'telp' => '89698289699',
            'password' => bcrypt('password'),
            'nis' => '153113',
            'name' => 'Indra Wijaya',
            'gender' => 1,
            'birthday' => '2013-06-21',
            'address' => 'Palembang',
            'role' => 'student',
            'id_class' => 2
        ]);

        \App\Models\Student::factory()->create([
            'username' => '153114',
            'telp' => '89698289699',
            'password' => bcrypt('password'),
            'nis' => '153114',
            'name' => 'Joko Susanto',
            'gender' => 1,
            'birthday' => '2014-08-29',
            'address' => 'Medan',
            'role' => 'student',
            'id_class' => 1
        ]);

        \App\Models\Student::factory()->create([
            'username' => '153115',
            'telp' => '89698289699',
            'password' => bcrypt('password'),
            'nis' => '153115',
            'name' => 'Kartini Putri',
            'gender' => 2,
            'birthday' => '2015-12-12',
            'address' => 'Denpasar',
            'role' => 'student',
            'id_class' => 3
        ]);

        \App\Models\Student::factory()->create([
            'username' => '153116',
            'telp' => '89698289699',
            'password' => bcrypt('password'),
            'nis' => '153116',
            'name' => 'Lina Oktaviani',
            'gender' => 2,
            'birthday' => '2013-02-15',
            'address' => 'Banda Aceh',
            'role' => 'student',
            'id_class' => 1
        ]);

        \App\Models\Student::factory()->create([
            'username' => '153117',
            'telp' => '89698289699',
            'password' => bcrypt('password'),
            'nis' => '153117',
            'name' => 'Mira Utami',
            'gender' => 2,
            'birthday' => '2014-05-06',
            'address' => 'Pontianak',
            'role' => 'student',
            'id_class' => 3
        ]);

        \App\Models\Student::factory()->create([
            'username' => '153118',
            'telp' => '89698289699',
            'password' => bcrypt('password'),
            'nis' => '153118',
            'name' => 'Nanda Fadhilah',
            'gender' => 2,
            'birthday' => '2012-09-18',
            'address' => 'Pekanbaru',
            'role' => 'student',
            'id_class' => 2
        ]);

        \App\Models\Student::factory()->create([
            'username' => '153119',
            'telp' => '89698289699',
            'password' => bcrypt('password'),
            'nis' => '153119',
            'name' => 'Omar Sharif',
            'gender' => 1,
            'birthday' => '2013-11-30',
            'address' => 'Banjarmasin',
            'role' => 'student',
            'id_class' => 3
        ]);

        \App\Models\Student::factory()->create([
            'username' => '153120',
            'telp' => '89698289699',
            'password' => bcrypt('password'),
            'nis' => '153120',
            'name' => 'Putra Aditya',
            'gender' => 1,
            'birthday' => '2014-04-20',
            'address' => 'Batam',
            'role' => 'student',
            'id_class' => 1
        ]);

        \App\Models\Student::factory()->create([
            'username' => '153121',
            'telp' => '89698289699',
            'password' => bcrypt('password'),
            'nis' => '153121',
            'name' => 'Qory Mawar',
            'gender' => 2,
            'birthday' => '2015-06-10',
            'address' => 'Manado',
            'role' => 'student',
            'id_class' => 2
        ]);

        \App\Models\Student::factory()->create([
            'username' => '153122',
            'telp' => '89698289699',
            'password' => bcrypt('password'),
            'nis' => '153122',
            'name' => 'Rendi Saputra',
            'gender' => 1,
            'birthday' => '2012-01-08',
            'address' => 'Padang',
            'role' => 'student',
            'id_class' => 1
        ]);

        \App\Models\Student::factory()->create([
            'username' => '153123',
            'telp' => '89698289699',
            'password' => bcrypt('password'),
            'nis' => '153123',
            'name' => 'Siti Aminah',
            'gender' => 2,
            'birthday' => '2013-03-11',
            'address' => 'Mataram',
            'role' => 'student',
            'id_class' => 3
        ]);

        \App\Models\Student::factory()->create([
            'username' => '153124',
            'telp' => '89698289699',
            'password' => bcrypt('password'),
            'nis' => '153124',
            'name' => 'Teguh Santoso',
            'gender' => 1,
            'birthday' => '2014-07-23',
            'address' => 'Ambon',
            'role' => 'student',
            'id_class' => 2
        ]);

        \App\Models\Student::factory()->create([
            'username' => '153125',
            'telp' => '89698289699',
            'password' => bcrypt('password'),
            'nis' => '153125',
            'name' => 'Umi Kalsum',
            'gender' => 2,
            'birthday' => '2015-02-17',
            'address' => 'Kupang',
            'role' => 'student',
            'id_class' => 1
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
            'telp' => '89698289699',
            'password' => bcrypt('password'),
            'role' => 'teacher'
        ]);
        \App\Models\Teacher::factory()->create([
            'nik' => '22222',
            'name' => 'Sriyono',
            'gender' => 1,
            'address' => 'Klampisan Tondowulan Plandaan Jombang',
            'username' => '22222',
            'telp' => '89698289699',
            'password' => bcrypt('password'),
            'role' => 'teacher'
        ]);
        \App\Models\Teacher::factory()->create([
            'nik' => '33333',
            'name' => 'Ratna',
            'gender' => 2,
            'address' => 'Klampisan Tondowulan Plandaan Jombang',
            'username' => '33333',
            'telp' => '89698289699',
            'password' => bcrypt('password'),
            'role' => 'teacher'
        ]);
        \App\Models\Teacher::factory()->create([
            'nik' => '44444',
            'name' => 'Hermanto',
            'gender' => 1,
            'address' => 'Klampisan Tondowulan Plandaan Jombang',
            'username' => '44444',
            'telp' => '89698289699',
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
