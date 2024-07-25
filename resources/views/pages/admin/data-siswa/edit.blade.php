@extends('layouts.admin.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Edit Siswa</h1>
            <button class="btn-hamburger" id="btn-hamburger">
                <i class="bi bi-grid-3x3-gap"></i>
            </button>
        </div>

        <div class="content-body">

            <div class="card shadow mt-3">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            @if ($student->image)
                                <img src="{{ asset('storage/' . $student->image) }}" class="img-fluid" alt="">
                            @else
                                <img src="{{ asset('assets/images/person.jpg') }}" class="img-fluid" alt="">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <form id="edit-student-form" action="/admin/data-siswa/{{ $student->id }}" method="POST"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <!-- NIS -->
                                <div class="mb-3">
                                    <label for="nis" class="form-label">NIS</label>
                                    <input type="number" value="{{ old('nis', $student->nis) }}"
                                        class="form-control custom-search" id="nis" name="nis"
                                        placeholder="Masukan nis siswa" required>
                                    @error('nis')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" value="{{ old('name', $student->name) }}"
                                        class="form-control custom-search" id="name" name="name"
                                        placeholder="Masukan nama siswa" required>
                                    @error('name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Kelas -->
                                <div class="mb-3">
                                    <label for="id_class" class="form-label">Kelas</label>
                                    <select id="id_class" name="id_class" class="form-select custom-select"
                                        aria-label="Default select example">
                                        <option value="" {{ !$student->classname ? 'selected' : '' }}>Pilih Kelas
                                        </option>
                                        @foreach ($classnames as $class)
                                            <option value="{{ $class->id }}"
                                                {{ $student->classname && $class->id == $student->classname->id ? 'selected' : '' }}>
                                                Kelas {{ $class->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_class')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Jenis Kelamin -->
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                    <select id="gender" name="gender" class="form-select custom-select"
                                        aria-label="Default select example" required>
                                        <option value="{{ 1 }}"
                                            {{ old('gender', $student->gender) == 1 ? 'selected' : '' }}>
                                            Laki-Laki
                                        </option>
                                        <option value="{{ 2 }}"
                                            {{ old('gender', $student->gender) == 2 ? 'selected' : '' }}>
                                            Perempuan
                                        </option>
                                    </select>
                                    @error('gender')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Nomor Telepon -->
                                <div class="input-group mb-3">
                                    <span class="input-group-text">+62</span>
                                    <div class="form-floating">
                                        <input type="number" value="{{ old('telp', $student->telp) }}"
                                            class="form-control" id="telp" name="telp" placeholder="Nomor Telpon"
                                            required>
                                        <label for="telp">Nomor Telpon</label>
                                    </div>
                                    @error('telp')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tanggal Lahir -->
                                <div class="mb-3">
                                    <label for="birthday" class="form-label">Tanggal Lahir</label>
                                    <input type="date" value="{{ old('birthday', $student->birthday) }}"
                                        class="form-control custom-search" id="birthday" name="birthday"
                                        placeholder="Masukan tanggal lahir siswa" required>
                                    @error('birthday')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Foto -->
                                <div class="mb-3">
                                    <input type="hidden" name="oldImage" value="{{ $student->image }}">
                                    <label for="image" class="form-label">Foto</label>
                                    <input class="form-control" type="file" id="image" name="image">
                                    @error('image')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Alamat -->
                                <div class="mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <input type="text" value="{{ old('address', $student->address) }}"
                                        class="form-control custom-search" id="address" name="address"
                                        placeholder="Masukan alamat siswa" required>
                                    @error('address')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tombol Submit dan Cancel -->
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

                            <!-- Reset Password -->
                            <div class="mb-3 text-center">
                                <form action="/admin/data-siswa/reset-password/{{ $student->id }}" method="POST"
                                    class="d-inline-block m-0 p-0 border-0">
                                    @csrf
                                    <button class="btn btn-link text-danger mt-1 p-0"
                                        onclick="return confirm('Reset Password? Password akan direset menjadi {{ $student->nis }}{{ substr($student->name, 0, 3) }}')"><i
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
