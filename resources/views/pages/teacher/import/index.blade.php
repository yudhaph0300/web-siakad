@extends('layouts.teacher.index')

@section('main-content')
    <div class="app-content">
        <div class="app-content-header shadow-sm">
            <h1 class="app-content-headerText raleway fw-bold">Import Nilai</h1>
            <button class="btn-hamburger" id="btn-hamburger">
                <i class="bi bi-grid-3x3-gap"></i>
            </button>
        </div>
        <div class="content-body">



            <div class="card shadow mt-3">
                <div class="card-body">
                    <div>
                        <p class="raleway heading-5 fw-bold">Mata Pelajaran {{ $lesson->name }}</p>
                        <p class="p-text">Kelas {{ $classname->name }}</p>
                    </div>

                    <div class="line my-4"></div>

                    @if (session('success'))
                        <p>{{ session('success') }}</p>
                    @endif

                    <div class="mb-3">
                        <form action="{{ route('import-lesson-value') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="file" class="form-label">Masukan Data Excell</label>
                            <input class="form-control" type="file" id="file" name="file" required>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
