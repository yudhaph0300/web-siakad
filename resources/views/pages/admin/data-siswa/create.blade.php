@extends('layouts.admin.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Tambah Siswa</h1>
            <button class="btn-hamburger" id="btn-hamburger">
                <i class="bi bi-grid-3x3-gap"></i>
            </button>
        </div>

        <div class="content-body">

            <div class="card shadow mt-3">
                <div class="card-body">

                    <form id="add-student-form" action="/admin/data-siswa" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="number" class="form-control custom-search" id="nis" name="nis"
                                placeholder="Masukan nis siswa" value="{{ old('nis') }}" required>
                            @error('nis')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control custom-search" id="name" name="name"
                                placeholder="Masukan nama siswa" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                <select name="gender" id="gender" class="form-select custom-search" required>
                                    <option value="1" {{ old('gender') == 1 ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="2" {{ old('gender') == 2 ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('gender')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <label for="birthday" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control custom-search" id="birthday" name="birthday"
                                    value="{{ old('birthday') }}" required>
                                @error('birthday')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">+62</span>
                            <div class="form-floating">
                                <input type="number" class="form-control" id="telp" name="telp"
                                    placeholder="Nomor Telpon" value="{{ old('telp') }}" required>
                                <label for="telp">Nomor Telpon</label>
                                @error('telp')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Foto</label>
                            <input class="form-control" type="file" id="image" name="image">
                            @error('image')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" class="form-control custom-search" id="address" name="address"
                                placeholder="Masukan alamat siswa" value="{{ old('address') }}" required>
                            @error('address')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
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
@endsection
