@extends('layouts.admin.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Edit Siswa</h1>
            <button class="btn btn-primary">
                Action
            </button>
        </div>

        <div class="content-body">

            <div class="card shadow mt-3">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <img src="{{ $student->image }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-md-8">
                            <form action="/admin/data-siswa/{{ $student->id }}" method="POST"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label for="nis" class="form-label">NIS</label>
                                    <input type="text" value="{{ $student->nis }}" class="form-control custom-search"
                                        id="nis" name="nis" placeholder="Masukan nis siswa">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" value="{{ $student->name }}" class="form-control custom-search"
                                        id="name" name="name" placeholder="Masukan nama siswa">
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" value="{{ $student->username }}"
                                        class="form-control custom-search" id="username" name="username"
                                        placeholder="Masukan username siswa">
                                </div>



                                <div class="mb-3">
                                    <label for="id_class" class="form-label">Kelas</label>
                                    <select id="id_class" name="id_class" class="form-select custom-select"
                                        aria-label="Default select example">
                                        @foreach ($classnames as $class)
                                            <option value="{{ $class->id }}"
                                                {{ $class->id == $student->classname->id ? 'selected' : '' }}>
                                                Kelas {{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="mb-3">
                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                    <select id="gender" name="gender" class="form-select custom-select"
                                        aria-label="Default select example">

                                        <option value="{{ 1 }}" {{ $student->gender == 1 ? 'selected' : '' }}>
                                            Laki-Laki
                                        </option>
                                        <option value="{{ 2 }}" {{ $student->gender == 2 ? 'selected' : '' }}>
                                            Perempuan
                                        </option>


                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="birthday" class="form-label">Tanggal Lahir</label>
                                    <input type="text" value="{{ $student->birthday }}"
                                        class="form-control custom-search" id="birthday" name="birthday"
                                        placeholder="Masukan tanggal lahir siswa">
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <input type="text" value="{{ $student->address }}"
                                        class="form-control custom-search" id="address" name="address"
                                        placeholder="Masukan alamat siswa">
                                </div>

                                <div class="mb-3">
                                    <div class="row g-2">
                                        <div class="col">
                                            <a href="/admin/data-siswa" class="btn btn-danger btn-filter w-100"><i
                                                    class="bi bi-arrow-left-circle me-2"></i>Cancel</a>
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary btn-filter w-100"><i
                                                    class="bi bi-save me-2"></i>Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
