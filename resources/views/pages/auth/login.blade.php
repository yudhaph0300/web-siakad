@extends('layouts.app')

@section('content')
    <div class="container-login">
        <div class="d-flex justify-content-center w-100">
            <div class="card">
                <div class="card-body">
                    <p class="heading-5 fw-bold my-0 mb-2">Selamat datang di,</p>
                    <h2 class="heading-2 raleway color-primary">MTs Riyadlatul Fallah</h2>
                    <p class="p-text">"Menyongsong Ilmu dengan Kehidupan Beragama"
                    </p>

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif


                    {{-- Form --}}
                    <form method="POST" action="{{ route('auth-post-login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" autofocus required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i id="togglePassword" class="bi bi-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <select name="academic_year" class="form-select" aria-label="Default select example">
                                <option value="" selected>Pilih Tahun Pelajaran</option>
                                <?= $no = 0 ?>

                                @foreach ($data_academic_year as $year)
                                    <?= $no++ ?>
                                    <option value="{{ $year->id }}" @if ($no == 1) selected @endif>
                                        {{ $year->tahun_pelajaran }}
                                        @if ($year->semester == 1)
                                            Ganjil
                                        @else
                                            Genap
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <p class="p-text text-center">Terjadi masalah ketika melakukan login? <span><a
                                    href="https://wa.me/6283833735915?text=**Sistem Informasi Akademik**%0A**MTs Riyadlatul Fallah**%0A%0ANama:%20%0ASiswa/Guru:%20%0AMasalah:%20"
                                    target="_blank">
                                    Hubungi Admin
                                </a>
                            </span>
                        </p>

                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Ganti ikon mata (eye) berdasarkan jenis password yang ditampilkan
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });
    </script>
@endsection
