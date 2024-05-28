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
                                    <input type="text" value="{{ $teacher->nik }}" class="form-control custom-search"
                                        id="nik" name="nik" placeholder="Masukan nik guru" required>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" value="{{ $teacher->name }}" class="form-control custom-search"
                                        id="name" name="name" placeholder="Masukan nama guru" required>
                                </div>
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                    <select name="gender" id="gender" class="form-select custom-search" required>
                                        <option value="1">Laki-laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" name="oldImage" value="{{ $teacher->image }}">
                                    <label for="image" class="form-label">Foto</label>
                                    <input class="form-control" type="file" id="image" name="image">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Alamat</label>
                                    <input type="text" class="form-control custom-search" id="address" name="address"
                                        placeholder="Masukan alamat guru" value="{{ $teacher->address }}" required>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
