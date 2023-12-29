@extends('layouts.admin.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Data Siswa</h1>
            <button class="btn btn-primary">
                Action
            </button>
        </div>

        <div class="content-body">

            <div class="card shadow">
                <div class="card-body">
                    <form class="row align-items-end g-3" method="GET" action="{{ url('/admin/data-siswa') }}">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="kelas" class="form-label">Pilih Kelas</label>
                                <select id="kelas" name="kelas" class="form-select"
                                    aria-label="Default select example">
                                    <option value="" selected>Semua Kelas</option>
                                    <option value="1">Kelas 1</option>
                                    <option value="2">Kelas 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="sort" class="form-label">Urutkan</label>
                                <select id="sort" name="sort" class="form-select">
                                    <option value="desc" {{ $sort === 'desc' || !$sort ? 'selected' : '' }}>Terbaru
                                    </option>
                                    <option value="asc" {{ $sort === 'asc' ? 'selected' : '' }}>Terlama</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="search" class="form-label">Cari</label>
                                <input type="text" value="{{ $search }}" class="form-control" id="search"
                                    name="search" placeholder="Masukan keyword">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </div>
                        </div>

                    </form>
                    <p class="raleway  mb-4 mt-3">
                        Menampilkan {{ $dataLength }} data dari data siswa dengan filter
                        {{ $search ? $search . ', ' : '' }}
                        {{ $kelas ? 'kelas ' . $kelas . ', ' : 'semua kelas, ' }}
                        {{ $sort === 'desc' ? 'terbaru.' : 'terlama.' }}
                    </p>

                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nis</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Username</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $student)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $student->nis }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->username }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
