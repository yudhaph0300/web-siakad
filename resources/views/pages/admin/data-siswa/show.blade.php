@extends('layouts.admin.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Detail Siswa</h1>
            <button class="btn btn-primary">
                Action
            </button>
        </div>

        <div class="content-body">

            <div class="card shadow mt-3">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <img src="{{ $student->image }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-8">
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
                                        <td>{{ $student->classname->name }}</td>
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
    </div>
@endsection
