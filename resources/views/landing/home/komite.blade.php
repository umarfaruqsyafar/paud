@extends('landing.layouts.main')

@section('container')
    {{-- Layanan --}}
    <section id="layanan">
        <div class="container px-4 py-5">
            <h2 class="pb-2 writertext text-title">Kegiatan Bersama Komite
            </h2>
            <h2 class="border-bottom"></h2>

            <div class="row">
                <div class="col-md-6">
                    <a class="dropdown-toggle btn bg-primary" style="color: white" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Pilih Kegiatan
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/sekolah/komite/*" class="dropdown-item" href="#">Semua Siswa</a></li>
                        @foreach ($kegiatan as $k)
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a href="/sekolah/komite/{{ $k->id }}" class="dropdown-item"
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

                    <div class="modal fade" id="view{{ $dok->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
