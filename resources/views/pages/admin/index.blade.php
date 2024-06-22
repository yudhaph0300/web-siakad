@extends('layouts.admin.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Dashboard</h1>
            <button class="btn-hamburger" id="btn-hamburger">
                <i class="bi bi-grid-3x3-gap"></i>
            </button>
        </div>

        <div class="content-body">
            <div class="card card-dashboard mb-3">
                <h4 class="card-title raleway fw-bold">
                    Selamat datang, Admin!
                </h4>
                <h6 class="card-title raleway mt-2">
                    Anda telah masuk pada sesi <span class="fw-bold">Tahun Pelajaran {{ $academic_year->tahun_pelajaran }},
                        Semester {{ $academic_year->semester }}.</span>
                </h6>
                <h6 class="card-title raleway mt-4 ">
                    Mari awali hari ini dengan bacaan basmalah, semangat, dan optimisme. Bersama, kita akan mencapai
                    kesuksesan yang gemilang!
                </h6>


            </div>
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="card card-dashboard text-center">
                        <p class="card-title raleway heading-5 fw-bold">Total Siswa</p>
                        <p class="heading-1">{{ $student }}</p>
                        <p>
                            <a href="/admin/data-siswa" class="btn btn-primary w-100">Lihat</a>
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-dashboard text-center">
                        <p class="card-title raleway heading-5 fw-bold">Total Guru</p>
                        <p class="heading-1">{{ $teacher }}</p>
                        <p>
                            <a href="/admin/data-guru" class="btn btn-primary w-100">Lihat</a>
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-dashboard text-center">
                        <p class="card-title raleway heading-5 fw-bold">Total Kelas</p>
                        <p class="heading-1">{{ $class }}</p>
                        <p>
                            <a href="/admin/data-kelas" class="btn btn-primary w-100">Lihat</a>
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-dashboard text-center">
                        <p class="card-title raleway heading-5 fw-bold">Total Mata Pelajaran</p>
                        <p class="heading-1">{{ $lessons }}</p>
                        <p>
                            <a href="/admin/data-mata-pelajaran" class="btn btn-primary w-100">Lihat</a>
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-dashboard text-center">
                        <p class="card-title raleway heading-5 fw-bold">Total Pembelajaran</p>
                        <p class="heading-1">{{ $learnings }}</p>
                        <p>
                            <a href="/admin/data-pembelajaran" class="btn btn-primary w-100">Lihat</a>
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
