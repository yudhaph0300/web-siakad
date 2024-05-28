@extends('layouts.admin.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Data Tahun Pelajaran</h1>
            <button class="btn-hamburger" id="btn-hamburger">
                <i class="bi bi-grid-3x3-gap"></i>
            </button>
        </div>

        <div class="content-body">


            <div class="card shadow mt-3">
                <div class="card-body">
                    <div class="text-end mb-3">
                        <button class="btn btn-outline-primary rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#add-tapel-form">
                            <i class="bi bi-person-add me-2"></i>Tambah Tahun Pelajaran
                        </button>
                    </div>

                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Tahun Pelajaran</th>
                                <th scope="col" class="text-center">Semester</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if ($tapels->isEmpty())
                                <tr>
                                    <td class="text-center" colspan="5">Belum ada tahun pelajaran yang ditambahkan</td>
                                </tr>
                            @else
                                @foreach ($tapels as $index => $tapel)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td class="text-center">{{ $tapel->tahun_pelajaran }}</td>
                                        <td class="text-center">{{ $tapel->semester == 1 ? 'Ganjil' : 'Genap' }}</td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    {{-- Start Modal Tambah --}}
    <div class="modal fade" id="add-tapel-form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="/admin/data-tahun-pelajaran" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Tahun Pelajaran</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tahun_pelajaran" class="form-label">Tahun Pelajaran</label>
                            <input type="text" class="form-control custom-search" id="tahun_pelajaran"
                                name="tahun_pelajaran" placeholder="Masukan tahun pelajaran" required autofocus>
                        </div>
                        <div class="mb-3">
                            <div>
                                <label class="form-label">Semester</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="semester" id="semester"
                                    value="1">
                                <label class="form-check-label" for="semester">Ganjil</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="semester" id="semester"
                                    value="2">
                                <label class="form-check-label" for="semester">Genap</label>
                            </div>

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
    {{-- End Modal Tambah --}}
@endsection
