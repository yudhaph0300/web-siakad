@extends('layouts.admin.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Edit Kelas</h1>
            <button class="btn btn-primary">
                Action
            </button>
        </div>

        <div class="content-body">

            <div class="card shadow mt-3">
                <form action="/admin/data-kelas/{{ $class->id }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Kelas</label>
                            <input type="text" value="{{ $class->name }}" class="form-control custom-search"
                                id="name" name="name" placeholder="Masukan nama siswa">
                        </div>

                        <div class="mb-3">
                            <label for="wali-kelas" class="form-label">Wali Kelas</label>
                            <select id="wali-kelas" name="wali-kelas" class="form-select custom-select"
                                aria-label="Default select example">
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}"
                                        {{ $class->teacher->name == $teacher->name ? 'selected' : '' }}>
                                        {{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="years" class="form-label">Tahun Pelajaran</label>
                            <select id="years" name="years" class="form-select custom-select"
                                aria-label="Default select example">
                                @foreach ($years as $year)
                                    <option value="{{ $year->id }}"
                                        {{ $class->year->name == $year->name ? 'selected' : '' }}>
                                        Tahun Pelajaran {{ $year->name }}, Semester {{ $year->semester }}</option>
                                @endforeach
                            </select>
                        </div>

                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col">Nis</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis Kelamin</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($class->students as $index => $student)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $student->nis }}</td>
                                        <td>{{ $student->name }}</td>
                                        @if ($student->gender === 1)
                                            <td>Laki-laki</td>
                                        @endif
                                        @if ($student->gender === 2)
                                            <td>Perempuan</td>
                                        @endif


                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
