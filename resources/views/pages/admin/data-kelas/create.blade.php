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
                    <form action="/admin/data-siswa" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="text" class="form-control custom-search" id="nis" name="nis"
                                placeholder="Masukan nis siswa">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control custom-search" id="name" name="name"
                                placeholder="Masukan nama siswa">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control custom-search" id="username" name="username"
                                placeholder="Masukan username siswa">
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
