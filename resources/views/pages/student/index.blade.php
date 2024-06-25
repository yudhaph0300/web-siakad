@extends('layouts.student.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Dashboard Siswa</h1>
            <button class="btn-hamburger" id="btn-hamburger">
                <i class="bi bi-grid-3x3-gap"></i>
            </button>
        </div>

        <div class="content-body">
            <div class="card card-dashboard mb-3">
                <h4 class="card-title raleway fw-bold">
                    Selamat datang, {{ $student->name }}!
                </h4>

                <h6 class="card-title raleway mt-4 ">
                    Mari awali hari ini dengan bacaan basmalah, semangat, dan optimisme. Bersama, kita akan mencapai
                    kesuksesan yang gemilang!
                </h6>


            </div>
            <div class="row g-3">
                <div class="col-md-4">
                    @if ($student->image)
                        <img src="{{ asset('storage/' . $student->image) }}" class="img-fluid" alt="">
                    @else
                        <img src="{{ asset('assets/images/person.jpg') }}" class="img-fluid" alt="">
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="card card-dashboard">
                        <p class="card-title raleway heading-5 fw-bold">Profil Siswa</p>
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <td>NIS</td>
                                    <td>{{ $student->nis }}</td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $student->name }}</td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>{{ $student->username }}</td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>
                                        @if ($student->classname)
                                            {{ $student->classname->name }}
                                        @else
                                            Siswa belum memiliki kelas
                                        @endif
                                    </td>

                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>

                                    @if ($student->gender === 1)
                                        <td>Laki-laki</td>
                                    @endif
                                    @if ($student->gender === 2)
                                        <td>Perempuan</td>
                                    @endif

                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>{{ $student->birthday }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ $student->address }}</td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>



            </div>

        </div>
    </div>
@endsection
