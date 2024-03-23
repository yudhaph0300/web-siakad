@extends('layouts.admin.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Detail Kelas</h1>
            <button class="btn btn-primary">
                Action
            </button>
        </div>

        <div class="content-body">

            <div class="card shadow mt-3">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td>Nama Kelas</td>
                                <td>{{ $class->name }}</td>
                            </tr>
                            <tr>
                                <td>Wali Kelas</td>
                                <td>{{ $class->teacher->name }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Siswa</td>
                                <td>{{ $class->students_count }}</td>
                            </tr>
                            <tr>
                                <td>Tahun Pelajaran</td>
                                <td>{{ $class->year->name }}</td>
                            </tr>
                        </tbody>
                    </table>

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
            </div>
        </div>
    </div>
@endsection
