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

                    <div class="mb-3">

                        <form class="row align-items-end g-3" method="GET" action="{{ url('/admin/cetak-raport') }}">
                            @csrf
                            <div class="col-md-3">
                                <div class="">
                                    <select id="kelas" name="kelas" class="form-select custom-select"
                                        aria-label="Default select example">
                                        <option value="" {{ session('raport_filter_kelas') == '' ? 'selected' : '' }}>
                                            Semua
                                            Kelas
                                        </option>
                                        @foreach ($data_class as $class)
                                            <option value="{{ $class->id }}"
                                                {{ session('raport_filter_kelas') == $class->id ? 'selected' : '' }}>
                                                {{ $class->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="">
                                    <input type="text" value="{{ session('raport_filter_search') }}"
                                        class="form-control custom-search" id="search" name="search"
                                        placeholder="Masukan keyword">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="">
                                    <button type="submit" class="btn btn-primary btn-filter w-100"><i
                                            class="bi bi-filter me-2"></i>Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>

                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">NIS</th>
                                <th scope="col" class="text-center">Nama siswa</th>
                                <th scope="col" class="text-center">Kelas</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_student as $index => $item)
                                <tr>
                                    <td scope="col" class="text-center" style="vertical-align: middle;">
                                        {{ $index + 1 }}</td>
                                    <td scope="col" class="text-center" style="vertical-align: middle;">
                                        {{ $item->nis }}</td>
                                    <td scope="col" style="vertical-align: middle;">
                                        {{ $item->name }}</td>
                                    <td scope="col" class="text-center" style="vertical-align: middle;">
                                        {{ $item->classname->name }}</td>
                                    <td scope="col" class="text-center" style="vertical-align: middle;">

                                        <a href="/admin/cetak-raport/{{ $item->id }}" class="btn btn-primary">
                                            Lihat
                                        </a>
                                        <button class="btn btn-primary">
                                            Cetak
                                        </button>
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
