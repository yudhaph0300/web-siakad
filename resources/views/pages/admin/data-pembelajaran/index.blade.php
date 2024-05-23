@extends('layouts.admin.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Data Pembelajaran</h1>
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
                            <i class="bi bi-person-add me-2"></i>Tambah Pembelajaran
                        </button>
                    </div>

                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Mata Pelajaran</th>
                                <th scope="col" class="text-center">Kelas</th>
                                <th scope="col" class="text-center">Pengajar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($learnings->isEmpty())
                                <tr>
                                    <td class="text-center" colspan="5">Belum ada data pembelajaran yang ditambahkan</td>
                                </tr>
                            @else
                                @foreach ($learnings as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $item->lesson->name }}</td>
                                        <td class="text-center">
                                            {{ $item->classname ? $item->classname->name : 'Belum disetting' }}</td>
                                        <td class="text-center">
                                            {{ $item->teacher ? $item->teacher->name : 'Belum disetting' }}
                                        </td>
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
    <div class="modal fade" id="modal-tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="/admin/data-pembelajaran" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Pembelajaran</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <select id="id_lesson" name="id_lesson" class="form-select" aria-label="Default select example">
                                <option selected>Pilih Mata Pelajaran</option>
                                @foreach ($lessons as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <select id="id_class" name="id_class" class="form-select" aria-label="Default select example">
                                <option selected>Pilih Kelas</option>
                                @foreach ($classnames as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <select id="id_teacher" name="id_teacher" class="form-select"
                                aria-label="Default select example">
                                <option selected>Pilih Pengajar</option>
                                @foreach ($teachers as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
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
