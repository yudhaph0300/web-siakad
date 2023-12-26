<nav id="navbar" class="navbar navbar-expand-lg navbar-dark fixed-top navbar-transparent py-3">
    <div class="container">
        <a class="navbar-brand raleway fw-bold" href="#">MTs Riyadlatul Fallah</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <button class="btn btn-primary rounded-pill">Login</button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    window.addEventListener('scroll', function() {
        var navbar = document.getElementById('navbar');
        if (window.scrollY > 5) {
            navbar.classList.remove('navbar-transparent');
            navbar.classList.add('bg-dark');
            navbar.classList.add('shadow');
        } else {
            navbar.classList.remove('bg-dark');
            navbar.classList.add('navbar-transparent');
            navbar.classList.remove('shadow');
        }
    });
</script>
