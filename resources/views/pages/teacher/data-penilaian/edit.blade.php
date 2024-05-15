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

                    <form action="{{ route('data-penilaian.update', $learning->id) }}" method="POST">
                        {{ method_field('PATCH') }}
                        @csrf

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
                                @foreach ($data_nilai as $item)
                                    <tr>
                                        <td class="text-center" style="vertical-align: middle;">{{ $loop->iteration }}</td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            {{ $item->student->name }}</td>

                                        <input type="hidden" name="anggota_kelas_id[]" value="{{ $item->id_student }}">
                                        <td>
                                            <input type="number" class="form-control" name="ko1[]"
                                                value="{{ $item->ko1 }}" min="0" max="100" step="0.01"
                                                required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="ko2[]"
                                                value="{{ $item->ko2 }}" min="0" max="100" step="0.01"
                                                required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="sub1[]"
                                                value="{{ $item->sub1 }}" min="0" max="100" step="0.01"
                                                required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="sub2[]"
                                                value="{{ $item->sub2 }}" min="0" max="100" step="0.01"
                                                required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="praktik[]"
                                                value="{{ $item->praktik }}" min="0" max="100" step="0.01"
                                                required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="uts_uas[]"
                                                value="{{ $item->uts_uas }}" min="0" max="100" step="0.01"
                                                required>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <div class="line my-4"></div>

                        <div>
                            <a href="/teacher/data-penilaian" class="btn btn-outline-primary me-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
