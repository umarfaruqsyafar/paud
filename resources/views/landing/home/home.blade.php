@extends('landing.layouts.main')

@section('container')
    {{-- Jumbotron --}}
    <section id="jumbotron" class="bg-dasar">
        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-12 col-sm-8 col-lg-6">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner shadow" style="width:100%; border-radius:10px;">
                            <div class="carousel-item active">
                                <img src="{{ asset('storage/' . $landing[0]['gambar']) }}"
                                    class="d-block img-fluid img-carousel" alt="Bootstrap Themes"loading="lazy">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('storage/' . $landing[1]['gambar']) }}"
                                    class="d-block img-fluid img-carousel" alt="Bootstrap Themes"loading="lazy">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('storage/' . $landing[2]['gambar']) }}"
                                    class="d-block img-fluid img-carousel" alt="Bootstrap Themes"loading="lazy">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
                <div class="col-lg-6">
                    <h1 class="text-satu display-5 fw-bold mb-5">
                        <b><span style="font-family: 'DM Serif Display', serif;">{{ $sekolah->nama }}</span> <br>"Cinta
                            <span>KEBAIKAN</span> dan <br>Berhati <span>BERSIH</span>"</b>
                    </h1>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <a href="/register" class="btn btn-primary btn-lg px-4 me-md-2">Join Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#f2f2f2" fill-opacity="1"
            d="M0,160L48,160C96,160,192,160,288,149.3C384,139,480,117,576,96C672,75,768,53,864,64C960,75,1056,117,1152,144C1248,171,1344,181,1392,186.7L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
        </path>
    </svg>

    {{-- Layanan --}}
    <section id="layanan">
        <div class="container px-4 py-5">
            <h2 class="pb-2 writertext text-title">Layanan
                {{ mb_convert_case($sekolah->nama, MB_CASE_TITLE, 'UTF-8') }}
            </h2>
            <h2 class="border-bottom"></h2>

            <div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
                <div class="d-flex flex-column align-items-start gap-2">
                    <h3 class="fw-bold">Kegiatan Ekstra</h3>
                    <p class="text-muted">Selain layanan yang tertera, ada kegiatan ekstra untuk anak sebagai
                        penyaluran bakat yang digemari</p>
                    <a href="/about_us/doc/ekstra/*" class="btn btn-primary">View More</a>
                </div>
                <div class="row row-cols-1 row-cols-sm-2 g-4 px-4">
                    <div class="d-flex flex-column gap-2">
                        <div
                            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-primary bg-gradient fs-4 rounded-3">
                            <i class="bi bi-person-workspace"></i>
                        </div>
                        <h4 class="fw-semibold mb-0">Taman Kanak-Kanak</h4>
                        <p class="text-muted">Lihat lebih banyak kegiatan di Taman Kanak-Kanak
                            {{ mb_convert_case($sekolah->nama, MB_CASE_TITLE, 'UTF-8') }}
                            <a href="/about_us/layanan/tk"><i class="bi bi-arrow-right-square"></i></a>
                        </p>
                    </div>

                    <div class="d-flex flex-column gap-2">
                        <div
                            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-primary bg-gradient fs-4 rounded-3">
                            <i class="bi bi-person-video3"></i>
                        </div>
                        <h4 class="fw-semibold mb-0">Kelompok Bermain</h4>
                        <p class="text-muted">Banyak keseruan di Kelompok Bermain
                            {{ mb_convert_case($sekolah->nama, MB_CASE_TITLE, 'UTF-8') }} <a href="/about_us/layanan/kb"><i
                                    class="bi bi-arrow-right-square"></i></a></p>
                    </div>

                    <div class="d-flex flex-column gap-2">
                        <div
                            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-primary bg-gradient fs-4 rounded-3">
                            <i class="bi bi-emoji-smile"></i>
                        </div>
                        <h4 class="fw-semibold mb-0">Day Care</h4>
                        <p class="text-muted">Bermain dan tertawa bersama di Day Care
                            {{ mb_convert_case($sekolah->nama, MB_CASE_TITLE, 'UTF-8') }} <a
                                href="/about_us/doc/daycare/*"><i class="bi bi-arrow-right-square"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#f2f2f2" fill-opacity="1"
            d="M0,224L48,197.3C96,171,192,117,288,101.3C384,85,480,107,576,128C672,149,768,171,864,181.3C960,192,1056,192,1152,181.3C1248,171,1344,149,1392,138.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
    </svg>

    {{-- Video Profile --}}
    <section id="container" class="bg-dasar">
        <div class="container px-4 py-5">
            <h2 class="pb-2 writertext text-title">Pengenalan Sekolah
            </h2>
            <h2 class="border-bottom"></h2>

            <div class="container col-xxl-8">
                <div class="row flex-lg-row align-items-center g-5 py-5">
                    <div class="col-12 col-sm-8 col-lg-6">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                            <div class="carousel-inner shadow" style="width:100%; border-radius:10px;">
                                <div class="carousel-item active">
                                    <video controls class="d-block img-fluid img-carousel"
                                        alt="Bootstrap Themes"loading="lazy">
                                        <source src="/img/website/vid-profil1.mp4" type="video/webm" />
                                    </video>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <h3 class="fw-bold">Video Profile Sekolah</h3>
                        <p class="text-muted">Video ini mengenalkan secara garis besar apa saja yang ada di sekolah
                            kami, mulai dari layanan, kegiatan ekstra, dan fasilitas yang ada.</p>
                        <a href="/about_us/doc/sekolah/*" class="btn btn-primary">View More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#f2f2f2" fill-opacity="1"
            d="M0,160L48,160C96,160,192,160,288,149.3C384,139,480,117,576,96C672,75,768,53,864,64C960,75,1056,117,1152,144C1248,171,1344,181,1392,186.7L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
        </path>
    </svg>

    {{-- Tenaga Pendidik --}}
    <section id="skill">
        <div class="skill container px-4 py-5">
            <h2 class="pb-2 writertext text-title">Tenaga Kependidikan
            </h2>
            <h2 class="border-bottom"></h2>

            <div class="slide-container-skill swiper">
                <div class="slide-skill pb-3">
                    <div class="card-wrapper swiper-wrapper">
                        @foreach ($tendik as $t)
                            <div class="card-skill swiper-slide shadow">
                                <div class="image-content">
                                    <span class="overlay"></span>

                                    <div class="card-image">
                                        @if ($t->image == null)
                                            <img src="/img/app/default.jpg" class="card-img">
                                        @else
                                            <img src="{{ asset('storage/' . $t['image']) }}" class="card-img" />
                                        @endif

                                    </div>
                                </div>

                                <div class="card-content">
                                    <h2 class="name">{{ $t->nama }}</h2>
                                    <span>"{{ mb_convert_case($t->role, MB_CASE_TITLE, 'UTF-8') }}"</span>

                                    <a href="/sekolah/tendik" class="button btn btn-primary">
                                        View More
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="swiper-button-next swiper-navBtn"></div>
                <div class="swiper-button-prev swiper-navBtn"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#f2f2f2" fill-opacity="1"
            d="M0,224L48,197.3C96,171,192,117,288,101.3C384,85,480,107,576,128C672,149,768,171,864,181.3C960,192,1056,192,1152,181.3C1248,171,1344,149,1392,138.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
    </svg>

    {{-- Mitra --}}
    <section id="mitra" class="bg-dasar">
        <div class="skill container px-4 py-5">
            <h2 class="pb-2 writertext text-title">Kemitraan Sekolah
            </h2>
            <h2 class="border-bottom"></h2>

            <div class="slide-container-skill swiper">
                <div class="slide-skill pb-3" style="border-radius:0;">
                    <div class="card-wrapper swiper-wrapper" style="border-radius:0;">
                        <div class="swiper-slide shadow-sm"style="border-radius:15px;">
                            <div class="card">
                                <div class="card-header">
                                    Himpaudi
                                </div>
                                <div class="card-body">
                                    <img style="width: 100%; height:100%; object-fit:cover;" src="/img/mitra/himpaudi.png"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide shadow-sm"style="border-radius:15px;">
                            <div class="card">
                                <div class="card-header">
                                    Puskesmas
                                </div>
                                <div class="card-body">
                                    <img style="width: 100%; height:100%; object-fit:cover;"
                                        src="/img/mitra/puskesmas.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide shadow-sm"style="border-radius:15px;">
                            <div class="card">
                                <div class="card-header">
                                    IHF
                                </div>
                                <div class="card-body">
                                    <img style="width: 100%; height:100%; object-fit:cover;" src="/img/mitra/ihf.png"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-button-next swiper-navBtn"></div>
                <div class="swiper-button-prev swiper-navBtn"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    {{-- Berita --}}
    <section id="berita" class="bg-dasar">
        <div class="berita container px-4 py-5">
            <h2 class="pb-2 writertext text-title">Pengumuman Terbaru
            </h2>
            <h2 class="border-bottom"></h2>

            <?php foreach ($pengumuman as $p) : ?>
            <?php
            if ($p['file']) {
                $file = 'file.pdf';
            } else {
                $file = '';
            }
            ?>
            <div class="row justify-content-center mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <?= $p['judul'] ?>
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <h6>Pada : <?= date('d F Y', strtotime($p['created_at'])) ?></h6>
                                <p><?= $p['isi'] ?>. <a class="text-white" href="">{{ $file }}</a>
                                </p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>


        </div>
    </section>
@endsection
