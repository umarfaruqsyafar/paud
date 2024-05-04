<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $sekolah->nama }}</title>
    <link rel="shortcut icon" href="{{ asset('storage/' . $sekolah['logo']) }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets_landing/css/landing.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Playpen+Sans:wght@500&family=Roboto:wght@300&family=Tilt+Neon&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    {{-- Icon Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


    {{-- Slider --}}
    <link rel="stylesheet" href="/css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/css/slider.css" />
</head>

<body>

    <div id="loading-screen">
        <div class="text-center">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div id="main-content">
        {{-- Navbar --}}
        <section id="navigasi"
            style="position: fixed; z-index: 99; top: 0; right: 0; left: 0; background-color: white;">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container">
                    <img class="logo-sekolah" src="{{ asset('storage/' . $sekolah['logo']) }}" alt="logo-sekolah">
                    <a class="navbar-brand text-title"
                        href="#">{{ mb_convert_case($sekolah->nama, MB_CASE_TITLE, 'UTF-8') }}</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                                    href="/">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ Request::is('sekolah*') ? 'active' : '' }}"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sekolah
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/sekolah/yayasan/*">Yayasan</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/sekolah/komite/*">Komite</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/sekolah/visi">Visi Misi</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/sekolah/tendik">Tenaga Pendidik</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ Request::is('about_us*') ? 'active' : '' }}"
                                    id="tentangkami">
                                    Tentang Kami
                                </a>
                                <ul class="dropdown-menu" id="menu-tentangkami">
                                    <li>
                                        <!-- Default dropend button -->
                                        <div class="dropend dropdown-item" style="width: 100%;">
                                            <a class="dropdown-toggle" style="text-decoration: none; color:black;"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Layanan
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="/about_us/layanan/tk">Taman
                                                        Kanak-Kanak</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="/about_us/layanan/kb">Kelompok
                                                        Bermain</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="/about_us/doc/daycare/*">Day Care</a>
                                                </li>
                                            </ul>
                                        </div>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/about_us/prestasi/*">Prestasi</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/about_us/doc/sarpras/*">Sarana Prasarana</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/about_us/doc/sekolah/*">Kegiatan Sekolah</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/about_us/doc/ekstra/*">Kegiatan Ekstra</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/register">Pendaftaran</a>
                            </li>
                            <li class="nav-item text-center">
                                <a href="/login" class="btn btn-light"
                                    style="padding-left: 25px; padding-right:25px;">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>
        <section id="navigasi">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container">
                    <img class="logo-sekolah" src="{{ asset('storage/' . $sekolah['logo']) }}" alt="logo-sekolah">
                    <a class="navbar-brand text-title"
                        href="#">{{ mb_convert_case($sekolah->nama, MB_CASE_TITLE, 'UTF-8') }}</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Sekolah
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Yayasan</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Komite</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Visi Misi</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Tenaga Pendidik</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Tentang Kami
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Layanan</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Prestasi</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Sarana Prasarana</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Kegiatan Sekolah</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Kegiatan Ekstra</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Pendaftaran</a>
                            </li>
                            <li class="nav-item text-center">
                                <button type="button" class="btn btn-light"
                                    style="padding-left: 25px; padding-right:25px;">Login</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>

        @yield('container')

        <section id="footer">
            <div class="footer navbar-dark bg-primary px-4 py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4" style="color: white;">
                            <img style="width: 30px; height:30px; margin-top:-5px; margin-right:5px;"
                                src="{{ asset('storage/' . $sekolah['logo']) }}" alt="logo-sekolah">
                            <a style="font-size: 25px;" class="navbar-brand text-title"
                                href="#">{{ mb_convert_case($sekolah->nama, MB_CASE_TITLE, 'UTF-8') }}</a>
                            <p class="mt-1">
                                <i class="bi bi-telephone"></i><span
                                    style="margin-left: 1rem;">{{ $sekolah->telepon }}</span><br>
                                <i class="bi bi-envelope"></i></i><span
                                    style="margin-left: 1rem;">{{ $sekolah->email }}</span><br>
                                <a href="" type="button" class="btn btn-outline-light mt-3"
                                    style="margin-right: 10px;"><i class="bi bi-instagram"></i></a>
                                <a href="" type="button" class="btn btn-outline-light mt-3"
                                    style="margin-right: 10px;"><i class="bi bi-youtube"></i></a>
                                <a href="" type="button" class="btn btn-outline-light mt-3"
                                    style="margin-right: 10px;"><i class="bi bi-whatsapp"></i></a>
                                <a href="" type="button" class="btn btn-outline-light mt-3"
                                    style="margin-right: 10px;"><i class="bi bi-facebook"></i></a>
                            </p>
                        </div>
                        <div class="col-md-2 link" style="color: white; margin-top:1rem;">
                            <span style="font-weight: 700; padding-top:2rem;">COMPANY</span>
                            <div class="mt-2"><a href="/about_us/doc/sekolah/*">About Us</a></div>
                            <div class="mt-2"><a href="/sekolah/yayasan/*">Yayasan</a></div>
                            <div class="mt-2"><a href="/sekolah/komite/*">Komite</a></div>
                        </div>
                        <div class="col-md-2 link" style="color: white; margin-top:1rem;">
                            <span style="font-weight: 700; padding-top:2rem;">ACTIVITY</span>
                            <div class="mt-2"><a href="/about_us/doc/ekstra/*">Extracurricular</a></div>
                            <div class="mt-2"><a href="/about_us/doc/sekolah/*">School</a></div>
                            <div class="mt-2"><a href="/#berita">News</a></div>
                        </div>
                        <div class="col-md-2 link" style="color: white; margin-top:1rem;">
                            <span style="font-weight: 700; padding-top:2rem;">FAMILY</span>
                            <div class="mt-2"><a href="/sekolah/tendik">Tenaga Pendidik</a></div>
                            <div class="mt-2"><a href="/sekolah/tendik">Tenaga Kependidikan</a></div>
                        </div>
                        <div class="col-md-2 link" style="color: white; margin-top:1rem;">
                            <span style="font-weight: 700; padding-top:2rem;">Mitra</span>
                            <div class="mt-2"><a href="/#mitra">Kemitraan Sekolah</a></div>
                        </div>
                    </div>
                    <div class="row">
                        <iframe style="width: 100%; height:50vh;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.688439800873!2d112.728091673481!3d-7.0458510690365665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd805e9d1d4b1e7%3A0xd8f8bc10cbedb104!2sPAUD%20Anna%20Husada!5e0!3m2!1sen!2sid!4v1699029287928!5m2!1sen!2sid"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="row mt-4 border-bottom"></div>
                    <div style="color: white; text-align:center; margin-top:1rem; margin-bottom:-3rem;">
                        <p style="font-size: 13px;">Copy Right By Up Development 2022</p>
                    </div>
                </div>
            </div>
        </section>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Simulasikan tampilan loading selama 3 detik
            setTimeout(function() {
                document.getElementById("loading-screen").style.display = "none";
                document.getElementById("main-content").style.display = "block";
            }, 1000);
        });
    </script>
    <script>
        const tentangkami = document.getElementById('tentangkami');
        const menutk = document.getElementById('menu-tentangkami');

        let isMenuVisible = false; // Menandakan apakah menu-tentangkami sedang ditampilkan

        tentangkami.addEventListener('click', () => {
            if (isMenuVisible) {
                menutk.style.display = 'none'; // Sembunyikan class menu-tentangkami
            } else {
                menutk.style.display = 'block'; // Tampilkan class menu-tentangkami
            }
            isMenuVisible = !isMenuVisible; // Toggle nilai isMenuVisible
        });
    </script>

    <script src="/js/swiper-bundle.min.js"></script>
    <script src="/js/script.js"></script>

</body>

</html>
