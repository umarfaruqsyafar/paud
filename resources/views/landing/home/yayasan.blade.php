@extends('landing.layouts.main')

@section('container')
    {{-- Jumbotron --}}
    <section id="jumbotron" class="bg-dasar">
        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row align-items-center g-5 py-3">
                <div class="col-lg-6 text-center">
                    <img class="text-satu" style="width: 22rem; height:10rem;" src="{{ asset('storage/' . $yayasan->logo) }}"
                        alt="">
                    <h3 class="text-satu display-5 fw-bold mb-5">
                        <b><span
                                style="font-family: 'DM Serif Display', serif; font-size:25px;">{{ $yayasan->nama }}</span></b>
                    </h3>
                </div>
                <div class="col-12 col-sm-8 col-lg-6 py-5">
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
                                <img src="{{ asset('storage/' . $landing[3]['gambar']) }}"
                                    class="d-block img-fluid img-carousel" alt="Bootstrap Themes"loading="lazy">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('storage/' . $landing[4]['gambar']) }}"
                                    class="d-block img-fluid img-carousel" alt="Bootstrap Themes"loading="lazy">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('storage/' . $landing[5]['gambar']) }}"
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
            <h2 class="pb-2 writertext text-title">Kegiatan Bersama Yayasan
            </h2>
            <h2 class="border-bottom"></h2>

            <div class="row">
                <div class="col-md-6">
                    <a class="dropdown-toggle btn bg-primary" style="color: white" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Pilih Kegiatan
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/sekolah/yayasan/*" class="dropdown-item" href="#">Semua Siswa</a></li>
                        @foreach ($kegiatan as $k)
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a href="/sekolah/yayasan/{{ $k->id }}" class="dropdown-item"
                                    href="#">{{ $k->judul }}</a></li>
                        @endforeach
                    </ul>
                    <a class="btn bg-primary text-white">{{ $kegiatan_aktif }}</a>
                </div>
            </div>

            <div class="row">
                @foreach ($dokumentasi as $dok)
                    <?php
                    $gambar = false;
                    foreach ($img as $i) {
                        if ($dok->id == $i['id']) {
                            $gambar = true;
                            break;
                        }
                    }
                    ?>
                    <div class="col-6 col-md-3">
                        <div class="card mt-4 shadow-sm">
                            <div style="width: 100%; height:70%;">
                                @if ($gambar)
                                    <img src="{{ asset('storage/' . $dok->gambar) }}" class="card-img-top img-kegiatan">
                                @else
                                    <video style="margin-bottom: -5px;" controls="true" class="card-img-top img-kegiatan">
                                        <source src="{{ asset('storage/' . $dok->gambar) }}" type="video/webm">
                                    </video>
                                @endif
                            </div>
                            <div class="card-body p-2 btn-dok">
                                <p class="side-com">{{ $dok->judul }}</p>
                                <a data-bs-toggle="modal" data-bs-target="#view{{ $dok->id }}"
                                    class="btn btn-outline-primary btn-sm btn-dok">View</a>
                                <span class="side-com"
                                    style="float: right; font-size:10px; margin-top:15px; color: #5da698;">{{ date('d M Y', strtotime($dok->created_at)) }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="view{{ $dok->id }}" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $dok->judul }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>

                                </div>
                                <div class="gambar-modal modal-body">
                                    @if ($gambar)
                                        <img style="width: 100%; height:100%; object-fit:contain;"
                                            src="{{ asset('storage/' . $dok->gambar) }}">
                                    @else
                                        <video controls="true" style="width: 100%; height:100%; object-fit:contain;">
                                            <source src="{{ asset('storage/' . $dok->gambar) }}" type="video/webm">
                                        </video>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
