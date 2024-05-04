@extends('app.layouts.main')
@section('container')

    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="alert bg-warning text-white" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-8 mb-3">
                <a data-toggle="modal" data-target="#prestasi" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Prestasi</span>
                </a>
            </div>
            <div class="col-lg-4 mb-3">
                <form action="/acara/prestasi" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 small" id="cari_prestasi" name="cari_prestasi"
                            placeholder="Cari prestasi..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary border-0" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <?php $i = 1; ?>
            <?php foreach ($prestasi as $p) : ?>
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
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><?= $p['judul'] ?></h6>
                    </div>
                    <div class="card-body">
                        <h6>Jenis : <?= $p['jenis'] ?></h6>
                        @if (count($dok) > 0)
                            <div id="carouselExampleControls<?= $p['id'] ?>"
                                class="carousel slide gambar_prestasi mb-1 mt-0 ml-0" data-ride="carousel<?= $p['id'] ?>"
                                style="float: left; margin: 20px;">
                                <div class="carousel-inner">
                                    <div class="carousel-item active gambar_prestasi">
                                        <img src="{{ asset('storage/' . $dok[0]->gambar) }}"
                                            class="d-block w-100 modified-gambar" alt="...">
                                    </div>
                                    @foreach ($dok->skip(1) as $d)
                                        <div class="carousel-item gambar_prestasi">
                                            <img src="{{ asset('storage/' . $d->gambar) }}"
                                                class="d-block w-100 modified-gambar" alt="...">
                                        </div>
                                    @endforeach
                                </div>
                                <button style="border: 0; background:rgba(0, 0, 0, 0);" class="carousel-control-prev"
                                    type="button" data-target="#carouselExampleControls<?= $p['id'] ?>" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </button>
                                <button style="border: 0; background:rgba(0, 0, 0, 0);" class="carousel-control-next"
                                    type="button" data-target="#carouselExampleControls<?= $p['id'] ?>" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </button>
                            </div>
                        @else
                            <div class="gambar_prestasi mb-1 mt-0 ml-0" style="float: left; margin: 20px;">
                                <img class="modified-gambar" src="/img/app/image.png">
                            </div>
                        @endif
                        <div class="entry-content mt-0">
                            <p><?= $p['isi'] ?></a></p>
                        </div><!-- .entry-content -->
                        <a data-toggle="modal" data-target="#plusfoto<?= $p['id'] ?>"
                            class="btn btn-primary btn-sm tombol-tambah mt-0 mb-2">
                            <span class="icon text-white">
                                <i class="fas fa-plus mr-2"></i>
                            </span>
                            <span class="text text-white">Foto</span></a>
                        <a data-toggle="modal" data-target="#hapus<?= $p['id'] ?>"
                            class="btn btn-danger btn-sm tombol-min mt-0 mb-2">Hapus</a>

                            <div class="modal fade" id="plusfoto<?= $p['id'] ?>" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="color: grey;">Tambah Foto</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="/acara/prestasi/tambah_dok" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-footer">
                                                <input type="hidden" class="form-control" id="idprestasi"
                                                    name="idprestasi" value="<?= $p['id'] ?>">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"
                                                        id="file" name="file">
                                                    <label class="custom-file-label" for="file">Pilih
                                                        foto</label>
                                                </div>
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- MODAL HAPUS -->
                            <div class="modal fade" id="hapus<?= $p['id'] ?>" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="color: grey;">Hapus Prestasi</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="/acara/prestasi/hapus" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control" id="idprestasi"
                                                        name="idprestasi" aria-describedby="basic-addon2"
                                                        value="<?= $p['id'] ?>">

                                                    <label for="judul" style="color: grey;">Yakin ingin
                                                        menghapus
                                                        "<?= $p['judul'] ?>"?</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Lanjut</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <?php $i++; ?>
            <?php endforeach; ?>
        </div>

    </div>

    <div class="modal fade" id="prestasi" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: grey;">Tambah Prestasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/acara/prestasi/tambah" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="jenis">Jenis Prestasi</label>
                            <select id="jenis" name="jenis" class="form-control" aria-describedby="basic-addon2">
                                <option value="">Jenis</option>
                                <option value="sekolah">sekolah</option>
                                <option value="guru">guru</option>
                                <option value="siswa">siswa</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul Prestasi</label>
                            <input type="text" class="form-control" id="judul" name="judul"
                                aria-describedby="basic-addon2">
                        </div>
                        <div class="form-group">
                            <label for="isi">Deskripsi Prestasi</label>
                            <textarea class="form-control" id="isi" name="isi" aria-describedby="basic-addon2"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
