@extends('landing.layouts.main')

@section('container')
    {{-- Layanan --}}
    <section id="layanan" class="bg-dasar">
        <div class="container px-4 py-5">
            <h2 class="pb-2 writertext text-title">Prestasi Sekolah
            </h2>
            <h2 class="border-bottom"></h2>

            <div class="row">
                <div class="col-md-6">
                    <a class="dropdown-toggle btn bg-primary" style="color: white" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Jenis Prestasi
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/about_us/prestasi/*" class="dropdown-item" href="#">Semua Prestasi</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href="/about_us/prestasi/sekolah" class="dropdown-item"
                                href="#">Sekolah</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href="/about_us/prestasi/guru" class="dropdown-item"
                                href="#">Guru</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href="/about_us/prestasi/siswa" class="dropdown-item"
                                href="#">Siswa</a></li>
                    </ul>
                    <a class="btn bg-primary text-white">{{ $kegiatan_aktif }}</a>
                </div>
            </div>

            <div class="row">
                @foreach ($prestasi as $p)
                    <?php
                    $cek = optional($p->dokumenPrestasi);
                    // dd($p->dokumenPrestasi);
                    if ($cek !== null) {
                        // Siswa memiliki relasi dengan masuk kelas.
                        $dok = $p->dokumenPrestasi;
                    } else {
                        // Siswa tidak memiliki relasi dengan masuk kelas.
                        $dok = '';
                    }
                    ?>
                    <div class="col-md-4 mt-4">
                        <div class="card shadow-sm">
                            <div style="width:100%;">

                                @if (count($dok) > 0)
                                    <div id="carouselExampleControls<?= $p['id'] ?>"
                                        class="carousel slide card-img-top img-tendik"
                                        data-bs-ride="carousel<?= $p['id'] ?>">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{ asset('storage/' . $dok[0]->gambar) }}"
                                                    class="card-img-top img-tendik">
                                            </div>
                                            @foreach ($dok->skip(1) as $d)
                                                <div class="carousel-item">
                                                    <img src="{{ asset('storage/' . $d->gambar) }}"
                                                        class="card-img-top img-tendik">
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleControls{{ $p->id }}"
                                            data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleControls{{ $p->id }}"
                                            data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                @else
                                    <img class="card-img-top img-tendik" src="/img/app/image.png">
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="isi-card mb-1" style="height:150px; overflow:hidden;">
                                    <h5 class="card-title">{{ $p->judul }}</h5>
                                    <p>Jenis : {{ $p->jenis }}</p>
                                    <p class="card-text">{{ $p->isi }}</p>
                                </div>
                                <a data-bs-toggle="modal" data-bs-target="#view{{ $p->id }}"
                                    class="btn btn-outline-primary">More</a>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="view{{ $p->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $p->judul }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>

                                </div>
                                <div class="gambar-modal modal-body">
                                    @if (count($dok) > 0)
                                        <div id="carouselExampleControlsModal<?= $p['id'] ?>" class="carousel slide"
                                            data-bs-ride="carousel<?= $p['id'] ?>">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="{{ asset('storage/' . $dok[0]->gambar) }}"
                                                        style="width: 100%; height:100%; object-fit:contain;">
                                                </div>
                                                @foreach ($dok->skip(1) as $d)
                                                    <div class="carousel-item">
                                                        <img src="{{ asset('storage/' . $d->gambar) }}"
                                                            style="width: 100%; height:100%; object-fit:contain;">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExampleControlsModal{{ $p->id }}"
                                                data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExampleControlsModal{{ $p->id }}"
                                                data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    @else
                                        <img style="width: 100%; height:100%; object-fit:contain;"
                                            src="/img/app/image.png">
                                    @endif
                                    <p class="mt-2">{{ $p->isi }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endsection
