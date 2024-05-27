@extends('layouts.admin.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Data Kelas</h1>
            <button class="btn-hamburger" id="btn-hamburger">
                <i class="bi bi-grid-3x3-gap"></i>
            </button>
        </div>

        <div class="content-body">


            <div class="card shadow mt-3">
                <div class="card-body">
                    <div class="text-end mb-3">
                        <button class="btn btn-outline-primary rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#add-class-form">
                            <i class="bi bi-person-add me-2"></i>Tambah Kelas
                        </button>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif


                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Nama Kelas</th>
                                <th scope="col" class="text-center">Jumlah Siswa</th>
                                <th scope="col" class="text-center">Wali Kelas</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if ($data_class->isEmpty())
                                <tr>
                                    <td class="text-center" colspan="5">Belum ada kelas pada tahun pelajaran
                                        {{ $academic_year->tahun_pelajaran }} semester {{ $academic_year->semester }}</td>
                                </tr>
                            @else
                                @foreach ($data_class as $index => $class)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td class="text-center">{{ $class->name }}</td>
                                        <td class="text-center">{{ $class->total_student }}</td>
                                        <td>{{ $class->teacher ? $class->teacher->name : 'Wali kelas belum ditambahkan' }}
                                        </td>
                                        <td class="text-center">
                                            <a class="btn-custom-icon color-warning" data-bs-toggle="modal"
                                                data-bs-target="#modal-edit-{{ $class->id }}"><i
                                                    class="bi bi-pencil-square"></i></a>
                                            <form action="/admin/data-kelas/{{ $class->id }}" method="POST"
                                                class="d-inline-block m-0 p-0 border-0">
                                                @method('delete')
                                                @csrf
                                                <button class="btn-custom-icon color-danger p-0 m-0 border-0 bg-transparent"
                                                    onclick="return confirm('Hapus Kelas {{ $class->name }}?')"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>

                                    {{-- Start Modal Edit --}}
                                    <div class="modal fade edit-class-form" id="modal-edit-{{ $class->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form method="post" action="/admin/data-kelas/{{ $class->id }}"
                                                    enctype="multipart/form-data">
                                                    @method('put')
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Kelas</h5>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Nama Kelas</label>
                                                            <input type="text" class="form-control custom-search"
                                                                id="name" name="name" value="{{ $class->name }}"
                                                                placeholder="Masukan nama kelas" required autofocus>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="id_teacher" class="form-label">Wali Kelas</label>
                                                            <select name="id_teacher" class="form-select"
                                                                aria-label="Pilih Wali Kelas" required>
                                                                <option value="" selected disabled>-- Pilih Wali Kelas
                                                                    --</option>
                                                                @foreach ($data_teacher as $item)
                                                                    <option value="{{ $item->id }}"
                                                                        @if ($item->id == $class->teacher->id) selected @endif>
                                                                        {{ $item->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
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
    <div class="modal fade" id="add-class-form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="/admin/data-kelas" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Kelas</h5>
                    </div>

                    {{-- Sisipkan id tahun pelajaran --}}
                    <input type="hidden" class="form-control" name="id_academic_year" value="{{ $academic_year->id }}"
                        readonly>


                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Kelas</label>
                            <input type="text" class="form-control custom-search" id="name" name="name"
                                placeholder="Masukan nama kelas" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="id_teacher" class="form-label">Wali Kelas</label>
                            <select name="id_teacher" class="form-select" aria-label="Pilih Wali Kelas" required>
                                <option value="" selected disabled>-- Pilih Wali Kelas --</option>
                                @foreach ($data_teacher as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
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
