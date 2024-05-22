@extends('layouts.teacher.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Input Nilai Siswa</h1>
            <button class="btn btn-primary">
                Action
            </button>
        </div>

        <div class="content-body">

            <div class="card shadow mt-3">
                <div class="card-body">

                    <div>
                        <p class="raleway heading-5 fw-bold">Mata Pelajaran {{ $learning->lesson->name }}</p>
                        <p class="p-text">Kelas {{ $learning->classname->name }}</p>
                    </div>

                    <div class="line my-4"></div>

                    <form action="/teacher/data-penilaian" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_learning" value="{{ $learning->id }}">

                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Nama Siswa</th>
                                    <th scope="col" class="text-center">Nilai KO 1</th>
                                    <th scope="col" class="text-center">Nilai KO 2</th>
                                    <th scope="col" class="text-center">Nilai SUB 1</th>
                                    <th scope="col" class="text-center">Nilai SUB 2</th>
                                    <th scope="col" class="text-center">Nilai Praktik</th>
                                    <th scope="col" class="text-center">UTS UAS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_anggota_kelas as $item)
                                    <tr>
                                        <td class="text-center" style="vertical-align: middle;">{{ $loop->iteration }}</td>
                                        <td class="text-left" style="vertical-align: middle;">{{ $item->name }}
                                        </td>
                                        <input type="hidden" name="anggota_kelas_id[]" value="{{ $item->id }}">
                                        <td class="text-center" style="vertical-align: middle;">
                                            <input type="number" class="form-control" name="ko1[]" min="0"
                                                max="100" step="0.01" required>
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <input type="number" class="form-control" name="ko2[]" min="0"
                                                max="100" step="0.01" required>
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <input type="number" class="form-control" name="sub1[]" min="0"
                                                max="100" step="0.01" required>
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <input type="number" class="form-control" name="sub2[]" min="0"
                                                max="100" step="0.01" required>
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <input type="number" class="form-control" name="praktik[]" min="0"
                                                max="100" step="0.01" required>
                                        </td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <input type="number" class="form-control" name="uts_uas[]" min="0"
                                                max="100" step="0.01" required>
                                        </td>

                                    </tr>
                                @endforeach



                            </tbody>
                        </table>

                        <div class="line my-4"></div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <a href="/teacher/export-nilai/{{ $learning->id }}" class="btn btn-primary">Download
                                    Template
                                    Import</a>
                                <a href="/teacher/import-nilai/{{ $learning->id }}" class="btn btn-primary">Import Nilai</a>
                            </div>
                            <div>
                                <a href="/teacher/data-penilaian" class="btn btn-outline-primary me-2">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
