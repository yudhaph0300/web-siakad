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

                    {{-- Form --}}
                    <form method="POST" action="{{ route('auth-post-login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="number" class="form-control" id="username" name="username">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i id="togglePassword" class="bi bi-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <p class="p-text text-center">Terjadi masalah ketika melakukan login? <span><a href="#"
                                    class="btn-link">hubungi
                                    admin</a></span>
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
