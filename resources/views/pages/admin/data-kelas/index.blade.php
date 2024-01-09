@extends('layouts.admin.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Data Kelas</h1>
            <button class="btn btn-primary">
                Action
            </button>
        </div>

        <div class="content-body">


            <div class="card shadow mt-3">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-10">
                            <p class="raleway  mb-4 mt-3">
                                Total seluruh kelas {{ count($data) }}
                            </p>
                        </div>
                        <div class="col-md-2">
                            <a href="/admin/data-siswa/create" class="btn btn-outline-primary rounded-pill w-100"><i
                                    class="bi bi-person-add me-2"></i>Tambah</a>
                        </div>
                    </div>


                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Nama Kelas</th>
                                <th scope="col" class="text-center">Jumlah Siswa</th>
                                <th scope="col" class="text-center">Wali Kelas</th>
                                <th scope="col" class="text-center">Tahun Pelajaran</th>
                                <th scope="col" class="text-center">Semester</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $index => $class)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td class="text-center">{{ $class->name }}</td>
                                    <td class="text-center">{{ $class->students_count }}</td>
                                    <td>{{ $class->teacher->name }}</td>
                                    <td class="text-center">{{ $class->year->name }}</td>
                                    <td class="text-center">{{ $class->year->semester }}</td>
                                    <td class="text-center">
                                        <a href="/admin/data-kelas/{{ $class->id }}"
                                            class="btn-custom-icon color-primary"><i class="bi bi-info-circle"></i></a>
                                        <a href="/admin/data-kelas/{{ $class->id }}/edit"
                                            class="btn-custom-icon color-warning"><i class="bi bi-pencil-square"></i></a>

                                        <form action="/admin/data-kelas/{{ $class->id }}" method="POST"
                                            class="d-inline-block m-0 p-0 border-0">
                                            @method('delete')
                                            @csrf
                                            <button class="btn-custom-icon color-danger p-0 m-0 border-0 bg-transparent"
                                                onclick="return confirm('Delete Data?')"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
