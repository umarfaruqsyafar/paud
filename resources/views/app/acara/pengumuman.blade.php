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
                <a data-toggle="modal" data-target="#pengumuman" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Pengumuman</span>
                </a>
            </div>
            <div class="col-lg-4 mb-3">
                <form action="/acara/pengumuman" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 small" id="cari_pengumuman"
                            name="cari_pengumuman" placeholder="Cari pengumuman..." aria-label="Search"
                            aria-describedby="basic-addon2">
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
            <?php foreach ($pengumuman as $p) : ?>
            <?php
            if ($p['file']) {
                $file = 'file.pdf';
            } else {
                $file = '';
            }
            ?>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><?= $p['judul'] ?></h6>
                    </div>
                    <div class="card-body">
                        <h6>Pada : <?= date('d F Y', strtotime($p['created_at'])) ?></h6>
                        <?= $p['isi'] ?>. <a class="text-white" href="">{{ $file }}</a>
                        <div class="row mt-2">
                            <div class="col">
                                <a class="btn btn-danger tombol-min btn-sm datapengumuman" data-toggle="modal"
                                    data-target="#hapus" data-idpengumuman="{{ $p['id'] }}"
                                    data-pengumuman="{{ $p['judul'] }}" data-file="{{ $p['file'] }}">
                                    <span class="text-white">Hapus
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $i++; ?>
            <?php endforeach; ?>
        </div>

    </div>


    <div class="modal fade" id="pengumuman" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: grey;">Tambah Pengumuman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/acara/pengumuman/tambah/" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="judul">Judul Pengumuman</label>
                            <input type="hidden" class="form-control" id="nama" name="nama"
                                aria-describedby="basic-addon2" value="{{ $user->nama }}">
                            <input type="text" class="form-control" id="judul" name="judul"
                                aria-describedby="basic-addon2">
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi Pengumuman</label>
                            <textarea class="form-control" id="isi" name="isi" aria-describedby="basic-addon2"></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <label for="file">File Tambahan</label>
                        </div>
                        <div class="custom-file">
                            <input type="file" id="file" name="file" class="custom-file-input">
                            <label class="custom-file-label" aria-describedby="basic-addon2" for="file">Pilih file
                                (*.pdf)</label>
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

    <!-- MODAL HAPUS -->
    <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: grey;">Hapus Pengumuman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/acara/pengumuman/hapus" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="idpengumuman" name="idpengumuman"
                                aria-describedby="basic-addon2">
                            <input type="hidden" class="form-control" id="fileHapus" name="fileHapus"
                                aria-describedby="basic-addon2">

                            <label for="judul" style="color: grey;">Yakin ingin menghapus
                                "<span id="pengumumanHapus"></span>"?</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Lanjut</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const datapengumuman = document.querySelectorAll(".datapengumuman");
        datapengumuman.forEach(function(button) {
            button.addEventListener("click", function() {
                // Dapatkan data ID siswa dari atribut data
                var idpengumuman = this.getAttribute("data-idpengumuman");
                var pengumuman = this.getAttribute("data-pengumuman");
                var file = this.getAttribute("data-file");
                $('#idpengumuman').val(idpengumuman);
                $('#fileHapus').val(file);
                document.getElementById('pengumumanHapus').innerHTML = pengumuman;
            });
        });
    </script>
@endsection
