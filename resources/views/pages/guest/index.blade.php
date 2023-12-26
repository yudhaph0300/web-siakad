@extends('layouts.guest.index')

@section('content-guest')
    {{-- Carousel --}}
    <div>
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/images/hero.png') }}" class="d-block w-100" alt="hero-image">
                    <div class="carousel-caption d-none d-md-block">
                        <p class="p-text text-white">Selamat datang di,</p>
                        <h3 class="heading-1">MTs Riyadlatul Fallah</h3>
                        <p class="p-text">"Menyongsong Ilmu dengan Kehidupan Beragama"</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/images/hero.png') }}" class="d-block w-100" alt="hero-image">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p class="p-text">Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/images/hero.png') }}" class="d-block w-100" alt="hero-image">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p class="p-text">Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    {{-- Berita Terbaru --}}
    <div class="container-news">
        <div class="container">
            <h5 class="heading-2">Berita Terbaru</h5>
            <div class="line my-4"></div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-news shadow">
                        <img src="https://images.unsplash.com/photo-1531742903308-ce1ef1631c3b?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="card-img-news" alt="news image">
                        <div class="card-body">
                            <p class="card-title raleway heading-5 fw-bold">Juara 1 Gerak Jalan Kecamatan
                                Plandaan Jombang
                            </p>
                            <p class="p-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde optio
                                necessitatibus non
                                recusandae dignissimos cupiditate, possimus magni distinctio ad itaque...</p>
                            <button class="btn btn-primary w-100">Baca Artikel</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card card-news shadow">
                        <img src="https://images.unsplash.com/photo-1531742903308-ce1ef1631c3b?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="card-img-news" alt="news image">
                        <div class="card-body">
                            <h5 class="card-title raleway heading-5 fw-bold">Juara 1 Gerak Jalan...</h5>
                            <p class="p-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                            <button class="btn btn-primary w-100">Lihat Berita</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-news shadow">
                        <img src="https://images.unsplash.com/photo-1531742903308-ce1ef1631c3b?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="card-img-news" alt="news image">
                        <div class="card-body">
                            <h5 class="card-title raleway heading-5 fw-bold">Juara 1 Gerak Jalan...</h5>
                            <p class="p-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                            <button class="btn btn-primary w-100">Lihat Berita</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Profil Sekolah --}}
    <div class="container-profile">
        <div class="container">
            <h5 class="heading-2">Profil Sekolah</h5>
            <div class="my-3"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-profile shadow">
                        <p class="card-title raleway heading-5 fw-bold">MTs Riyadlatul Fallah</p>
                        <p class="p-text" class="card-text">MTs Riyadlatul Fallah adalah lembaga pendidikan tingkat
                            menengah yang
                            menitikberatkan pada pembelajaran akademis yang seimbang dengan pendidikan agama. Terletak di
                            lingkungan yang nyaman, sekolah kami menyediakan lingkungan belajar yang kondusif untuk
                            mengembangkan potensi siswa dalam berbagai aspek kehidupan. Kami menekankan nilai-nilai Islam
                            dalam setiap aspek pembelajaran, serta mendorong siswa untuk meraih prestasi akademis dan
                            non-akademis yang gemilang.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile shadow">
                        <p class="card-title raleway heading-5 fw-bold">Ekstrakurikuler</p>
                        <p class="p-text" class="card-text">Kami menyediakan berbagai kegiatan ekstrakurikuler seperti
                            seni, olahraga,
                            kegiatan keagamaan, klub ilmiah, dan lainnya untuk membantu siswa mengembangkan bakat dan minat
                            mereka di luar kurikulum akademis.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile shadow">
                        <p class="card-title raleway heading-5 fw-bold">Sarana Pengembangan Siswa</p>
                        <p class="p-text" class="card-text">MTs Riyadlatul Fallah memberikan perhatian khusus pada
                            pengembangan karakter
                            siswa. Kami menyelenggarakan beragam kegiatan pembinaan kepribadian dan keterampilan sosial
                            untuk membentuk siswa menjadi individu yang tangguh, bertanggung jawab, dan berakhlak mulia.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <h5 class="heading-2">Galeri</h5>
            <div class="my-3"></div>
            <div class="gallery-container">
                <div class="gallery">
                    <img src="https://images.unsplash.com/photo-1620764840976-a6752f359c46?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8Y2hhbXBpb258ZW58MHx8MHx8fDA%3D"
                        alt="galery image">
                    <img src="https://images.unsplash.com/photo-1620764840976-a6752f359c46?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8Y2hhbXBpb258ZW58MHx8MHx8fDA%3D"
                        alt="galery image">
                    <img src="https://images.unsplash.com/photo-1620764840976-a6752f359c46?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8Y2hhbXBpb258ZW58MHx8MHx8fDA%3D"
                        alt="galery image">
                    <img src="https://images.unsplash.com/photo-1620764840976-a6752f359c46?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8Y2hhbXBpb258ZW58MHx8MHx8fDA%3D"
                        alt="galery image">
                    <img src="https://images.unsplash.com/photo-1620764840976-a6752f359c46?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8Y2hhbXBpb258ZW58MHx8MHx8fDA%3D"
                        alt="galery image">
                    <img src="https://images.unsplash.com/photo-1620764840976-a6752f359c46?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8Y2hhbXBpb258ZW58MHx8MHx8fDA%3D"
                        alt="galery image">
                    <img src="https://images.unsplash.com/photo-1620764840976-a6752f359c46?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8Y2hhbXBpb258ZW58MHx8MHx8fDA%3D"
                        alt="galery image">
                    <img src="https://images.unsplash.com/photo-1620764840976-a6752f359c46?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8Y2hhbXBpb258ZW58MHx8MHx8fDA%3D"
                        alt="galery image">
                    <img src="https://images.unsplash.com/photo-1620764840976-a6752f359c46?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8Y2hhbXBpb258ZW58MHx8MHx8fDA%3D"
                        alt="galery image">
                    <img src="https://images.unsplash.com/photo-1620764840976-a6752f359c46?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8Y2hhbXBpb258ZW58MHx8MHx8fDA%3D"
                        alt="galery image">
                    <img src="https://images.unsplash.com/photo-1620764840976-a6752f359c46?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8Y2hhbXBpb258ZW58MHx8MHx8fDA%3D"
                        alt="galery image">
                    <img src="https://images.unsplash.com/photo-1620764840976-a6752f359c46?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8Y2hhbXBpb258ZW58MHx8MHx8fDA%3D"
                        alt="galery image">
                    <img src="https://images.unsplash.com/photo-1620764840976-a6752f359c46?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8Y2hhbXBpb258ZW58MHx8MHx8fDA%3D"
                        alt="galery image">
                    <img src="https://images.unsplash.com/photo-1620764840976-a6752f359c46?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8Y2hhbXBpb258ZW58MHx8MHx8fDA%3D"
                        alt="galery image">
                </div>
            </div>

        </div>
    </div>

    {{-- Artikel --}}
    <div class="container-article">
        <div class="container">
            <h5 class="heading-2">Artikel</h5>
            <div class="line my-4"></div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-article shadow">
                        <img src="https://images.unsplash.com/photo-1543002588-bfa74002ed7e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Ym9va3xlbnwwfHwwfHx8MA%3D%3D"
                            class="card-img-article" alt="article image">
                        <div class="tag-article text-center">
                            John Doe, 12 Maret 2019
                        </div>
                        <div class="card-body">
                            <h5 class="card-title raleway heading-5 fw-bold">Menuntut Ilmu</h5>
                            <p class="p-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sit veritatis
                                corporis sequi? Ipsa
                                deserunt optio enim rem reprehenderit quibusdam vel dignissimos ratione recusandae soluta
                                corrupti quod eveniet, quo natus debitis fuga veritatis repellat eius architecto....</p>
                            <button class="btn btn-primary w-100">Lihat Berita</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-article shadow">
                        <img src="https://images.unsplash.com/photo-1543002588-bfa74002ed7e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Ym9va3xlbnwwfHwwfHx8MA%3D%3D"
                            class="card-img-article" alt="article image">
                        <div class="tag-article text-center">
                            John Doe, 12 Maret 2019
                        </div>
                        <div class="card-body">
                            <h5 class="card-title raleway heading-5 fw-bold">Menuntut Ilmu</h5>
                            <p class="p-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sit veritatis
                                corporis sequi? Ipsa
                                deserunt optio enim rem reprehenderit quibusdam vel dignissimos ratione recusandae soluta
                                corrupti quod eveniet, quo natus debitis fuga veritatis repellat eius architecto....</p>
                            <button class="btn btn-primary w-100">Baca Artikel</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-article shadow">
                        <img src="https://images.unsplash.com/photo-1543002588-bfa74002ed7e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Ym9va3xlbnwwfHwwfHx8MA%3D%3D"
                            class="card-img-article" alt="article image">
                        <div class="tag-article text-center">
                            John Doe, 12 Maret 2019
                        </div>
                        <div class="card-body">
                            <h5 class="card-title raleway heading-5 fw-bold">Menuntut Ilmu</h5>
                            <p class="p-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sit veritatis
                                corporis sequi? Ipsa
                                deserunt optio enim rem reprehenderit quibusdam vel dignissimos ratione recusandae soluta
                                corrupti quod eveniet, quo natus debitis fuga veritatis repellat eius architecto....</p>
                            <button class="btn btn-primary w-100">Baca Artikel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
