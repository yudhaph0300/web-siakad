@extends('layouts.admin.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Edit Guru</h1>
            <button class="btn-hamburger" id="btn-hamburger">
                <i class="bi bi-grid-3x3-gap"></i>
            </button>
        </div>

        <div class="content-body">

            <div class="card shadow mt-3">
                <div class="card-body">

                    <div class="row g-3">
                        <div class="col-md-6">
                            @if ($teacher->image)
                                <img src="{{ asset('storage/' . $teacher->image) }}" class="img-fluid" alt="">
                            @else
                                <img src="{{ asset('assets/images/person.jpg') }}" class="img-fluid" alt="">
                            @endif
                        </div>
                        <div class="col-md-6">
                            <form id="edit-teacher-form" action="/admin/data-guru/{{ $teacher->id }}" method="POST"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="number" value="{{ old('nik', $teacher->nik) }}"
                                        class="form-control custom-search" id="nik" name="nik"
                                        placeholder="Masukan nik guru" required>
                                    @error('nik')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" value="{{ old('name', $teacher->name) }}"
                                        class="form-control custom-search" id="name" name="name"
                                        placeholder="Masukan nama guru" required>
                                    @error('name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                    <select id="gender" name="gender" class="form-select custom-select"
                                        aria-label="Default select example" required>
                                        <option value="{{ 1 }}"
                                            {{ old('gender', $teacher->gender) == 1 ? 'selected' : '' }}>
                                            Laki-Laki
                                        </option>
                                        <option value="{{ 2 }}"
                                            {{ old('gender', $teacher->gender) == 2 ? 'selected' : '' }}>
                                            Perempuan
                                        </option>
                                    </select>
                                    @error('gender')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">+62</span>
                                    <div class="form-floating">
                                        <input type="number" value="{{ old('telp', $teacher->telp) }}"
                                            class="form-control" id="telp" name="telp" placeholder="Nomor Telpon"
                                            required>
                                        <label for="telp">Nomor Telpon</label>
                                        @error('telp')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <input type="hidden" name="oldImage" value="{{ $teacher->image }}">
                                    <label for="image" class="form-label">Foto</label>
                                    <input class="form-control" type="file" id="image" name="image">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <input type="text" class="form-control custom-search" id="address" name="address"
                                        placeholder="Masukan alamat guru" value="{{ old('address', $teacher->address) }}"
                                        required>
                                    @error('address')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="row g-2">
                                        <div class="col">
                                            <a href="/admin/data-guru" class="btn btn-danger btn-filter w-100"><i
                                                    class="bi bi-arrow-left-circle me-2"></i>Cancel</a>
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary btn-filter w-100"><i
                                                    class="bi bi-save me-2"></i>Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="mb-3 text-center">
                                <form action="/admin/data-guru/reset-password/{{ $teacher->id }}" method="POST"
                                    class="d-inline-block m-0 p-0 border-0">
                                    @csrf
                                    <button class="btn btn-link text-danger p-0"
                                        onclick="return confirm('Reset Password? Password akan direset menjadi {{ $teacher->nik }}{{ substr($teacher->name, 0, 3) }}')"><i
                                            class="bi bi-arrow-clockwise me-2"></i>Reset Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
