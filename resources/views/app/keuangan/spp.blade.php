<?php
if ($tingkat == 'tk_a') {
    $tkt = 'TK A';
} elseif ($tingkat == 'tk_b') {
    $tkt = 'TK B';
} elseif ($tingkat == 'kb_a') {
    $tkt = 'KB A';
} elseif ($tingkat == 'kb_b') {
    $tkt = 'KB B';
} else {
    $tkt = 'Day Care';
}

?>
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
            <div class="col-lg-6 mb-2">
                <a class="btn btn-info btn-icon-split" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="text">Pilih Tingkat</span>
                    <span class="icon text-white-50">
                        <i class="fas fa-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-center" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="/keuangan/spp/tk_a">
                        TK A
                    </a>
                    <a class="dropdown-item" href="/keuangan/spp/tk_b">
                        TK B
                    </a>
                    <a class="dropdown-item" href="/keuangan/spp/kb_a">
                        KB A
                    </a>
                    <a class="dropdown-item" href="/keuangan/spp/kb_b">
                        KB B
                    </a>
                    <a class="dropdown-item" href="/keuangan/spp/dc">
                        Day Care
                    </a>
                </div>
                <a class="btn btn-info btn-icon-split">
                    <span class="text">{{ $tkt }}</span>
                </a>

            </div>
            <div class="col-lg-6 text-align-hp">
                <a data-toggle="modal" data-target="#tambah_spp" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Penambahan</span>
                </a>
                <a data-toggle="modal" data-target="#kurang_spp" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Pengurangan</span>
                </a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card border-left-primary h-100 py-0">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    SPP {{ $tkt }}</div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">
                                    {{ 'Rp ' . number_format($spp->biaya, 2, ',', '.') }}</div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <a class="btn btn-success tombol-edit databank btn-sm" data-toggle="modal"
                                    data-target="#ubah_spp">
                                    <span class="text-white">Ubah
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Penambahan Biaya SPP {{ $tkt }}</h6>
                    </div>
                    <div class="card-body side-com">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th style="vertical-align: middle; width: 5%;">No</th>
                                        <th style="vertical-align: middle; width: 35%;">Uraian</th>
                                        <th style="vertical-align: middle;">Biaya</th>
                                        <th style="vertical-align: middle; width: 20%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($penambahan as $adm) : ?>
                                    <tr>
                                        <td class="text-center" style="vertical-align: middle;"><?= $i ?>
                                        </td>
                                        <td class="text-left" style="vertical-align: middle;">
                                            <?= $adm['uraian'] ?>
                                        </td>
                                        <td class="text-right" style="vertical-align: middle;">
                                            <?= 'Rp ' . number_format($adm['tambah'], 2, ',', '.') ?>
                                        </td>
                                        <td class="text-center">
                                            <a style="background-color: #d03672; border-color: #d03672;"
                                                class="btn-circle btn-sm btn btn-danger dataspp" data-toggle="modal"
                                                data-target="#hapusSpp" data-idadmin="<?= $adm['id'] ?>"
                                                data-uraian="<?= $adm['uraian'] ?>">
                                                <span class="icon text-white-100">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-body side-hp">
                        <?php $i = 1; ?>
                        <?php foreach ($penambahan as $adm) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative;">
                            <div style="width:10vw;">
                                <div><?= $i ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><?= $adm['uraian'] ?></p>
                                <p style="margin-top:-18px;"><?= 'Rp ' . number_format($adm['tambah'], 2, ',', '.') ?>
                                </p>
                            </div>
                            <div class="btnMenuSiswa" style="width:10vw; display: flex; justify-content:right;"
                                id="btnMenuSiswa" data-idsiswa="<?= $adm['id'] ?>">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>
                            <div class="menuSiswaD"
                                style="display:none; width:25vw; position:absolute; right:0; top:0; z-index:9; background-color:white;"
                                id="menuSiswaD<?= $adm['id'] ?>">
                                <div class="shadow" style="border-radius:10px;">
                                    <a class="dropdown-item text-gray-800 dataspp" data-toggle="modal"
                                        data-target="#hapusSpp" data-idadmin="<?= $adm['id'] ?>"
                                        data-uraian="<?= $adm['uraian'] ?>">
                                        Hapus
                                    </a>
                                </div>
                            </div>

                        </div>
                        <hr style="background-color: white; margin-top:-10px;">
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pengurangan Biaya SPP {{ $tkt }}</h6>
                    </div>
                    <div class="card-body side-com">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th style="vertical-align: middle; width: 5%;">No</th>
                                        <th style="vertical-align: middle; width: 35%;">Uraian</th>
                                        <th style="vertical-align: middle;">Biaya</th>
                                        <th style="vertical-align: middle; width: 20%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pengurangan as $adm) : ?>
                                    <tr>
                                        <td class="text-center" style="vertical-align: middle;"><?= $i ?>
                                        </td>
                                        <td class="text-left" style="vertical-align: middle;">
                                            <?= $adm['uraian'] ?>
                                        </td>
                                        <td class="text-right" style="vertical-align: middle;">
                                            <?= 'Rp ' . number_format($adm['kurang'], 2, ',', '.') ?>
                                        </td>
                                        <td class="text-center">
                                            <a style="background-color: #d03672; border-color: #d03672;"
                                                class="btn-circle btn-sm btn btn-danger dataspp" data-toggle="modal"
                                                data-target="#hapusSpp" data-idadmin="<?= $adm['id'] ?>"
                                                data-uraian="<?= $adm['uraian'] ?>">
                                                <span class="icon text-white-100">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-body side-hp">
                        <?php $i = 1; ?>
                        <?php foreach ($pengurangan as $adm) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative;">
                            <div style="width:10vw;">
                                <div><?= $i ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><?= $adm['uraian'] ?></p>
                                <p style="margin-top:-18px;"><?= 'Rp ' . number_format($adm['kurang'], 2, ',', '.') ?>
                                </p>
                            </div>
                            <div class="btnMenuSiswa" style="width:10vw; display: flex; justify-content:right;"
                                id="btnMenuSiswa" data-idsiswa="<?= $adm['id'] ?>">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>
                            <div class="menuSiswaD"
                                style="display:none; width:25vw; position:absolute; right:0; top:0; z-index:9; background-color:white;"
                                id="menuSiswaD<?= $adm['id'] ?>">
                                <div class="shadow" style="border-radius:10px;">
                                    <a class="dropdown-item text-gray-800 dataspp" data-toggle="modal"
                                        data-target="#hapusSpp" data-idadmin="<?= $adm['id'] ?>"
                                        data-uraian="<?= $adm['uraian'] ?>">
                                        Hapus
                                    </a>
                                </div>
                            </div>

                        </div>
                        <hr style="background-color: white; margin-top:-10px;">
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </div>


                </div>
            </div>
        </div>

    </div>

    <!-- /.container-fluid -->
    <!-- Modal Ubah SPP -->
    <div class="modal fade" id="ubah_spp" tabindex="-1" role="dialog" aria-labelledby="gol_adminLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gol_adminLabel">Ubah Biaya SPP</h5>
                    <a data-dismiss="modal" class="close" aria-label="Close">
                        <i aria-hidden="true">&times;</i>
                    </a>
                </div>
                <form action="/keuangan/spp/ubah" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="tingkat" name="tingkat"
                            value="{{ $tingkat }}">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="rupiahubah" name="rupiahubah"
                                value="{{ 'Rp ' . number_format($spp->biaya, 0, ',', '.') }}">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a data-dismiss="modal" class="btn btn-secondary" data-modal="dismiss"
                            style="background-color: #d03672; border-color: #d03672;">Batal</a>
                        <button type="submit" class="btn btn-primary"
                            style="background-color: #226462; border-color: #226462;">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal Tambah Paket -->
    <div class="modal fade" id="tambah_spp" tabindex="-1" role="dialog" aria-labelledby="gol_adminLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gol_adminLabel">Penambahan Biaya SPP</h5>
                    <a data-dismiss="modal" class="close" aria-label="Close">
                        <i aria-hidden="true">&times;</i>
                    </a>
                </div>
                <form action="/keuangan/spp/tambah" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="tingkat" name="tingkat"
                                value="{{ $tingkat }}">
                            <input type="text" class="form-control" id="uraian" name="uraian"
                                placeholder="Uraian biaya">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="rupiah" name="rupiah"
                                placeholder="Biaya">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a data-dismiss="modal" class="btn btn-secondary" data-modal="dismiss"
                            style="background-color: #d03672; border-color: #d03672;">Batal</a>
                        <button type="submit" class="btn btn-primary"
                            style="background-color: #226462; border-color: #226462;">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Paket -->
    <div class="modal fade" id="kurang_spp" tabindex="-1" role="dialog" aria-labelledby="gol_adminLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gol_adminLabel">Pengurangan Biaya SPP</h5>
                    <a data-dismiss="modal" class="close" aria-label="Close">
                        <i aria-hidden="true">&times;</i>
                    </a>
                </div>
                <form action="/keuangan/spp/kurang" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="tingkat" name="tingkat"
                                value="{{ $tingkat }}">
                            <input type="text" class="form-control" id="uraian" name="uraian"
                                placeholder="Uraian biaya">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="rupiah1" name="rupiah1"
                                placeholder="Biaya">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a data-dismiss="modal" class="btn btn-secondary" data-modal="dismiss"
                            style="background-color: #d03672; border-color: #d03672;">Batal</a>
                        <button type="submit" class="btn btn-primary"
                            style="background-color: #226462; border-color: #226462;">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Paket -->
    <div class="modal fade" id="hapusSpp" tabindex="-1" role="dialog" aria-labelledby="gol_adminLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gol_adminLabel">Hapus Biaya SPP</h5>
                    <a data-dismiss="modal" class="close" aria-label="Close">
                        <i aria-hidden="true">&times;</i>
                    </a>
                </div>
                <form action="/keuangan/spp/hapus" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="tingkat" name="tingkat"
                            value="{{ $tingkat }}">
                        <input type="hidden" class="form-control" id="idubah" name="idubah">
                        <div class="mb-3">
                            <p>Yakin ingin menghapus <span id="spphapus"></span> ?</p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a data-dismiss="modal" class="btn btn-secondary" data-modal="dismiss"
                            style="background-color: #d03672; border-color: #d03672;">Batal</a>
                        <button type="submit" class="btn btn-primary"
                            style="background-color: #226462; border-color: #226462;">Lanjut</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        const dataspp = document.querySelectorAll(".dataspp");
        dataspp.forEach(function(button) {
            button.addEventListener("click", function() {
                // Dapatkan data ID siswa dari atribut data
                var idadmin = this.getAttribute("data-idadmin");
                var uraian = this.getAttribute("data-uraian");
                $('#idubah').val(idadmin);
                document.getElementById('spphapus').innerHTML = '"' + uraian + '"';
            });
        });
    </script>
@endsection
