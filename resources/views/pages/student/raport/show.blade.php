@extends('layouts.student.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Rapor Siswa</h1>
            <button class="btn-hamburger" id="btn-hamburger">
                <i class="bi bi-grid-3x3-gap"></i>
            </button>
        </div>

        <div class="content-body">

            @if ($raport->isEmpty() || $raport[0]->class_name === null)
                <h5>Belum ada nilai yang masuk</h5>
            @else
                <div class="card shadow mt-3">
                    <div class="card-body">
                        <table class="table table-bordered mb-3">
                            <tbody>
                                <tr>
                                    <td class="py-2" style="width: 25%">Nama</td>
                                    <td class="py-2">{{ $student->name }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2" style="width: 25%">NIS</td>
                                    <td class="py-2">{{ $student->nis }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2" style="width: 25%">Kelas</td>
                                    <td class="py-2">{{ $raport[0]->class_name }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2" style="width: 25%">Tahun Pelajaran</td>
                                    <td class="py-2">{{ $academic_year->tahun_pelajaran }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2" style="width: 25%">Semester</td>
                                    <td class="py-2">{{ $academic_year->semester }}
                                        ({{ $academic_year->semester == 1 ? 'Ganjil' : 'Genap' }})</td>
                                </tr>
                            </tbody>
                        </table>


                        <table class="table table-bordered table-hover mb-3">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Mata Pelajaran</th>
                                    <th scope="col" class="text-center">NILAI</th>
                                    <th scope="col" class="text-center">PREDIKAT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($raport as $index => $item)
                                    <tr>
                                        <td scope='col' class="text-center">{{ $index + 1 }}</td>
                                        <td scope='col'>{{ $item->lesson_name }}</td>
                                        <td scope='col' class="text-center">{{ $item->nilai }}</td>
                                        <td scope='col' class="text-center">{{ $item->predikat }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mb-3 mt-5 text-end  ">
                            <a href="/student/raport" class="btn btn-outline-primary">Kembali</a>

                        </div>
                    </div>
                </div>
            @endif




        </div>
    </div>
@endsection
