@extends('layouts.admin.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Data Mata Pelajaran</h1>
            <button class="btn-hamburger" id="btn-hamburger">
                <i class="bi bi-grid-3x3-gap"></i>
            </button>
        </div>

        <div class="content-body">


            <div class="card shadow mt-3">
                <div class="card-body">

                    <div class="text-end mb-3">
                        <button class="btn btn-outline-primary rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#modal-tambah">
                            <i class="bi bi-person-add me-2"></i>Tambah Mata Pelajaran
                        </button>
                    </div>

                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Nama Mata Pelajaran</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if ($lessons->isEmpty())
                                <tr>
                                    <td class="text-center" colspan="5">Belum ada mata pelajaran pada tahun pelajaran
                                        {{ $academic_year->tahun_pelajaran }} semester {{ $academic_year->semester }}</td>
                                </tr>
                            @else
                                @foreach ($lessons as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $item->name }}</td>

                                        <td class="text-center">
                                            <a class="btn-custom-icon color-warning" data-bs-toggle="modal"
                                                data-bs-target="#modal-edit-mapel-{{ $item->id }}"><i
                                                    class="bi bi-pencil-square"></i></a>
                                            <form action="/admin/data-mata-pelajaran/{{ $item->id }}" method="POST"
                                                class="d-inline-block m-0 p-0 border-0">
                                                @method('delete')
                                                @csrf
                                                <button class="btn-custom-icon color-danger p-0 m-0 border-0 bg-transparent"
                                                    onclick="return confirm('Hapus Mata Pelajaran {{ $item->name }}?')"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>

                                    {{-- Start Modal Edit --}}

                                    <div class="modal fade" id="modal-edit-mapel-{{ $item->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form method="post" action="/admin/data-mata-pelajaran/{{ $item->id }}"
                                                    enctype="multipart/form-data">
                                                    @method('put')
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Data Mata
                                                            Pelajaran</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Nama Mata
                                                                Pelajaran</label>
                                                            <input type="text" class="form-control custom-search"
                                                                id="name" name="name" value="{{ $item->name }}"
                                                                placeholder="Masukan mata pelajaran" required autofocus>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- End Modal Edit --}}
                                @endforeach
                            @endif

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


    {{-- Start Modal Tambah --}}
    <div class="modal fade" id="modal-tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="/admin/data-mata-pelajaran" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Mata Pelajaran</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Mata Pelajaran</label>
                            <input type="text" class="form-control custom-search" id="name" name="name"
                                placeholder="Masukan tahun pelajaran" required autofocus>
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
