@extends('layouts.admin.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Data Guru</h1>
            <button class="btn btn-primary">
                Action
            </button>
        </div>

        <div class="content-body">
            <div class="card shadow">
                <div class="card-body">
                    <form class="row align-items-end g-3" method="GET" action="{{ url('/admin/data-guru') }}">
                        @csrf
                        <div class="col-md-3">
                            <div class="mb-3">
                                <select id="sort" name="sort" class="form-select custom-select">
                                    <option value="desc" {{ $sort === 'desc' || !$sort ? 'selected' : '' }}>Terbaru
                                    </option>
                                    <option value="asc" {{ $sort === 'asc' ? 'selected' : '' }}>Terlama</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <input type="text" value="{{ $search }}" class="form-control custom-search"
                                    id="search" name="search" placeholder="Masukan keyword">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary btn-filter w-100"><i
                                        class="bi bi-filter me-2"></i>Filter</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="card shadow mt-3">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <p class="raleway  mb-4 mt-3">
                                Menampilkan {{ $dataLength }} data dari data guru dengan filter
                                {{ $search ? $search . ', ' : '' }}
                                {{ $sort === 'desc' ? 'terbaru.' : 'terlama.' }}
                            </p>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-outline-primary rounded-pill w-100"><i
                                    class="bi bi-file-earmark-text me-2"></i>Import</button>
                        </div>
                        <div class="col-md-2">
                            <a href="/admin/data-guru/create" class="btn btn-outline-primary rounded-pill w-100"><i
                                    class="bi bi-person-add me-2"></i>Tambah</a>
                        </div>
                    </div>


                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Username</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($dataLength === 0)
                                <tr class="text-center">
                                    <td colspan="5">Data not found</td>
                                </tr>
                            @endif
                            @foreach ($data as $index => $teacher)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>{{ $teacher->nik }}</td>
                                    <td>{{ $teacher->name }}</td>
                                    <td>{{ $teacher->username }}</td>
                                    <td class="text-center">
                                        <a href="/admin/data-guru/{{ $teacher->id }}"
                                            class="btn-custom-icon color-primary"><i class="bi bi-info-circle"></i></a>
                                        <a href="/admin/data-guru/{{ $teacher->id }}/edit"
                                            class="btn-custom-icon color-warning"><i class="bi bi-pencil-square"></i></a>

                                        <form action="/admin/data-guru/{{ $teacher->id }}" method="POST"
                                            class="d-inline-block m-0 p-0 border-0">
                                            @method('delete')
                                            @csrf
                                            <button class="btn-custom-icon color-danger p-0 m-0 border-0 bg-transparent"
                                                onclick="return confirm('Delete Data?')"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>

                                    </td>
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
