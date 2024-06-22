@extends('layouts.teacher.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Data Penilaian</h1>
            <button class="btn-hamburger" id="btn-hamburger">
                <i class="bi bi-grid-3x3-gap"></i>
            </button>
        </div>

        <div class="content-body">



            <div class="card shadow mt-3">
                <div class="card-body">


                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif


                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Mata Pelajaran</th>
                                <th scope="col" class="text-center">Kelas</th>
                                <th scope="col" class="text-center">Jumlah Siswa</th>
                                {{-- <th scope="col" class="text-center">Telah Dinilai</th> --}}
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $item)
                                <tr>
                                    <td class="text-center" style="vertical-align: middle;">{{ $index + 1 }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $item->lesson->name }}
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $item->classname->name }}
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        {{ $item->jumlah_anggota_kelas }}
                                        Siswa</td>
                                    {{-- <td class="text-center" style="vertical-align: middle;">
                                        {{ $item->jumlah_telah_dinilai }}
                                        Siswa</td> --}}
                                    <td class="text-center" style="vertical-align: middle;">
                                        <form action="/teacher/data-penilaian/create" method="GET">
                                            @csrf
                                            <input type="hidden" name="id_learning" value="{{ $item->id }}">
                                            <button type="submit" class="btn btn-primary rounded-pill">Input Nilai</button>
                                        </form>
                                    </td>
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
