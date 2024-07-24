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
                                    <td>Nomor Telpon</td>
                                    <td>+62{{ $student->telp }}</td>
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


                    <div class="card card-dashboard mt-2">

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif



                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#change-password">
                            Ubah Password
                        </button>
                    </div>
                </div>



            </div>

        </div>
    </div>

    {{-- Start Modal Ubah Password --}}
    <div class="modal fade" id="change-password" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="/student/dashboard/change-password" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Ubah Password</h5>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="currentPassword" class="form-label">Password Lama</label>
                            <input type="password" class="form-control custom-search" id="currentPassword"
                                name="currentPassword" placeholder="Masukan password lama" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">Password Baru</label>
                            <input type="password" class="form-control custom-search" id="newPassword" name="newPassword"
                                placeholder="Masukan password baru" required autofocus>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Modal Ubah Password --}}
@endsection
