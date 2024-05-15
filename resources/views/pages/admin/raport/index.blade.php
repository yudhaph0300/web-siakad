@extends('layouts.admin.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Data Tahun Pelajaran</h1>
            <button class="btn btn-primary">
                Action
            </button>
        </div>

        <div class="content-body">


            <div class="card shadow mt-3">
                <div class="card-body">
                    <div class="text-end mb-3">
                        <button class="btn btn-outline-primary rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#modal-tambah">
                            <i class="bi bi-person-add me-2"></i>Tambah Tahun Pelajaran
                        </button>
                    </div>

                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>

                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Nama siswa</th>
                                <th scope="col" class="text-center">Kelas</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="col" class="text-center" style="vertical-align: middle;">1</td>
                                <td scope="col" class="text-center" style="vertical-align: middle;">Nama siswa</td>
                                <td scope="col" class="text-center" style="vertical-align: middle;">Kelas</td>
                                <td scope="col" class="text-center" style="vertical-align: middle;">
                                    <button class="btn btn-primary">
                                        Lihat Raport
                                    </button>
                                </td>
                            </tr>


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
