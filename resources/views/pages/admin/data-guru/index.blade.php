@extends('layouts.admin.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Data Guru</h1>
            <button class="btn-hamburger" id="btn-hamburger">
                <i class="bi bi-grid-3x3-gap"></i>
            </button>
        </div>

        <div class="content-body">
            <div class="card shadow">
                <div class="card-body">
                    <form class="row align-items-end g-3" method="GET" action="{{ url('/admin/data-guru') }}">
                        @csrf

                        <div class="col-md-9">
                            <div class="">
                                <input type="text" value="{{ session('filter_search') }}"
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
            </div>

            <div class="card shadow mt-3">
                <div class="card-body">
                    <div class="row g-3 d-flex justify-content-between mb-3">
                        <div class="col-7 d-flex justify-content-start align-items-center">
                            <p class="raleway ">
                                Jumlah data guru yang ditemukan adalah {{ $dataLength }}
                            </p>
                        </div>
                        <div class="col-5 d-flex justify-content-end align-items-center">
                            <a href="/admin/data-guru/create" class="btn btn-outline-primary rounded-pill"><i
                                    class="bi bi-person-add me-2"></i>Tambah</a>
                        </div>
                    </div>



                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
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
                                    @if ($teacher->gender === 1)
                                        <td>Laki-laki</td>
                                    @endif
                                    @if ($teacher->gender === 2)
                                        <td>Perempuan</td>
                                    @endif
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
