@extends('layouts.admin.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Data Tahun Pelajaran</h1>
            <button class="btn btn-primary">
                Action
            </button>
        </div>

        <div class="content-body">


            <div class="card shadow mt-3">
                <div class="card-body">
                    <table class="table table-bordered mb-3">
                        <tbody>

                            <tr>
                                <td style="width: 25%">Nama</td>
                                <td>{{ $student->name }}</td>
                            </tr>
                            <tr>
                                <td style="width: 25%">Tahun Pelajaran</td>
                                <td>{{ $academic_year->tahun_pelajaran }}</td>
                            </tr>
                            <tr>
                                <td style="width: 25%">Semester</td>
                                <td>{{ $academic_year->semester }}
                                    ({{ $academic_year->semester == 1 ? 'Ganjil' : 'Genap' }})</td>
                            </tr>
                        </tbody>
                    </table>


                    <table class="table table-bordered table-hover mb-3">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Mata Pelajaran</th>
                                <th scope="col" class="text-center">KO 1</th>
                                <th scope="col" class="text-center">KO 2</th>
                                <th scope="col" class="text-center">SUB 1</th>
                                <th scope="col" class="text-center">SUB 2</th>
                                <th scope="col" class="text-center">Praktik</th>
                                <th scope="col" class="text-center">UTS UAS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($raport as $index => $item)
                                <tr>
                                    <td scope='col' class="text-center">{{ $index + 1 }}</td>
                                    <td scope='col'>{{ $item->lesson_name }}</td>
                                    <td scope='col' class="text-center">{{ $item->ko1 }}</td>
                                    <td scope='col' class="text-center">{{ $item->ko2 }}</td>
                                    <td scope='col' class="text-center">{{ $item->sub1 }}</td>
                                    <td scope='col' class="text-center">{{ $item->sub2 }}</td>
                                    <td scope='col' class="text-center">{{ $item->praktik }}</td>
                                    <td scope='col' class="text-center">{{ $item->uts_uas }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
