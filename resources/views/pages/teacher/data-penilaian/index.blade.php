@extends('layouts.teacher.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Data Penilaian</h1>
            <button class="btn btn-primary">
                Action
            </button>
        </div>

        <div class="content-body">


            <div class="card shadow mt-3">
                <div class="card-body">



                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Mata Pelajaran</th>
                                <th scope="col" class="text-center">Kelas</th>
                                <th scope="col" class="text-center">Jumlah Siswa</th>
                                <th scope="col" class="text-center">Telah Dinilai</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $item)
                                <tr>
                                    <td class="text-center" style="vertical-align: middle;">{{ $index + 1 }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $item['mata_pelajaran'] }}
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $item['kelas'] }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $item['jumlah_siswa'] }}
                                        Siswa</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $item['telah_dinilai'] }}
                                        Siswa</td>
                                    <td class="text-center" style="vertical-align: middle;"><button
                                            class="btn btn-primary">Input Nilai</button></td>
                                </tr>
                            @endforeach


                            {{-- @if ($data_mapel->isEmpty())
                                <tr>
                                    <td class="text-center" colspan="5">Belum ada mata pelajaran pada tahun pelajaran
                                        {{ $academic_year->tahun_pelajaran }} semester {{ $academic_year->semester }}</td>
                                </tr>
                            @else
                                @foreach ($data_mapel as $index => $mapel)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td class="text-center">{{ $mapel->name }}</td>

                                    </tr>
                                @endforeach
                            @endif --}}

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
