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
                        @csrf
                        <div class="col-md-3">
                            <div class="">
                                <select id="kelas" name="kelas" class="form-select custom-select"
                                    aria-label="Default select example">
                                    <option value="" {{ session('filter_kelas') == '' ? 'selected' : '' }}>Semua Kelas
                                    </option>
                                    <option value="__NULL__" {{ session('filter_kelas') === '__NULL__' ? 'selected' : '' }}>
                                        Tidak Memiliki Kelas</option>
                                    @foreach ($data_class as $class)
                                        <option value="{{ $class->id }}"
                                            {{ session('filter_kelas') == $class->id ? 'selected' : '' }}>
                                            {{ $class->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="col-md-6">
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
                    <div class="row g-3">
                        <div class="col-md-8">
                            <p class="raleway  mb-4 mt-3">
                                Jumlah data siswa yang ditemukan adalah {{ $data_student_length }}
                            </p>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-outline-primary rounded-pill w-100"><i
                                    class="bi bi-file-earmark-text me-2"></i>Import</button>
                        </div>
                        <div class="col-md-2">
                            <a href="/admin/data-siswa/create" class="btn btn-outline-primary rounded-pill w-100"><i
                                    class="bi bi-person-add me-2"></i>Tambah</a>
                        </div>
                    </div>


                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col">Nis</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Kelas Saat Ini</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data_student_length === 0)
                                <tr class="text-center">
                                    <td colspan="6">Data not found</td>
                                </tr>
                            @endif
                            @foreach ($data_student as $index => $student)
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
                                    <td>
                                        @if ($student->classname)
                                            {{ $student->classname->name }}
                                        @else
                                            Siswa belum memiliki kelas
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        <a href="/admin/data-siswa/{{ $student->id }}"
                                            class="btn-custom-icon color-primary"><i class="bi bi-info-circle"></i></a>
                                        <a href="/admin/data-siswa/{{ $student->id }}/edit"
                                            class="btn-custom-icon color-warning"><i class="bi bi-pencil-square"></i></a>

                                        <form action="/admin/data-siswa/{{ $student->id }}" method="POST"
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

                    {{-- {{ $data->links() }} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
