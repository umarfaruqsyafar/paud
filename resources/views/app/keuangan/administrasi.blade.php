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
    $tkt = 'DAY CARE';
}

?>
@extends('app.layouts.main')
@section('container')
    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="row">
                <div class="col-lg-8">
                    <div class="alert bg-warning text-white" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-8 mb-3">
                <a class="btn btn-info btn-icon-split" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="text">Pilih Tingkat</span>
                    <span class="icon text-white-50">
                        <i class="fas fa-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-center" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="/keuangan/administrasi/tk_a">
                        TK A
                    </a>
                    <a class="dropdown-item" href="/keuangan/administrasi/tk_b">
                        TK B
                    </a>
                    <a class="dropdown-item" href="/keuangan/administrasi/kb_a">
                        KB A
                    </a>
                    <a class="dropdown-item" href="/keuangan/administrasi/kb_b">
                        KB B
                    </a>
                    <a class="dropdown-item" href="/keuangan/administrasi/dc">
                        Day Care
                    </a>
                </div>
                <a class="btn btn-info btn-icon-split">
                    <span class="text">{{ $tkt }}</span>
                </a>
                <a data-toggle="modal" data-target="#gol_admin" class="btn btn-primary btn-icon-split"
                    style="float: right;">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Biaya</span>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Rincian Biaya Administrasi {{ $tkt }}</h6>
                    </div>
                    <div class="card-body side-com">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th style="vertical-align: middle; width: 5%;">No</th>
                                        <th style="vertical-align: middle; width: 40%;">Uraian</th>
                                        <th style="vertical-align: middle;">Biaya</th>
                                        <th style="vertical-align: middle; width: 25%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($administrasi as $adm) : ?>
                                    <tr>
                                        <td class="text-center" style="vertical-align: middle;"><?= $i ?></td>
                                        <td class="text-left" style="vertical-align: middle;">
                                            <?= $adm['uraian'] ?>
                                        </td>
                                        <td class="text-right" style="vertical-align: middle;">
                                            <?= 'Rp ' . number_format($adm['biaya'], 2, ',', '.') ?>
                                        </td>
                                        <td class="text-center">
                                            <a data-toggle="modal" data-target="#ubahAdmin"
                                                class="btn btn-circle btn-sm btn-success tombol-edit dataadmin"
                                                data-idadmin="<?= $adm['id'] ?>" data-uraian="<?= $adm['uraian'] ?>"
                                                data-biaya="{{ 'Rp ' . number_format($adm['biaya'], 0, ',', '.') }}">
                                                <span class="icon text-white-100">
                                                    <i class="fas fa-recycle"></i>
                                                </span>
                                            </a>
                                            <a class="btn btn-circle btn-sm btn-danger tombol-min dataadmin"
                                                data-toggle="modal" data-target="#hapusAdmin"
                                                data-idadmin="<?= $adm['id'] ?>" data-uraian="<?= $adm['uraian'] ?>">
                                                <span class="icon text-white-100">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td class="text-center" style="vertical-align: middle;"></td>
                                        <td class="text-center" style="vertical-align: middle;">
                                            <b>JUMLAH</b>
                                        </td>
                                        <td class="text-right" style="vertical-align: middle;">
                                            <b>{{ 'Rp ' . number_format($total, 2, ',', '.') }}</b>
                                        </td>
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-body side-hp">
                        <?php $i = 1; ?>
                        <?php foreach ($administrasi as $adm) : ?>
                        <div class="topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative; font-size:14px;">
                            <div style="width:10vw;">
                                <div><?= $i ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><?= $adm['uraian'] ?></p>
                                <p style="margin-top:-18px;"><?= 'Rp ' . number_format($adm['biaya'], 2, ',', '.') ?></p>
                            </div>
                            <div class="btnMenuSiswa" style="width:10vw; display: flex; justify-content:right;"
                                id="btnMenuSiswa" data-idsiswa="<?= $adm['id'] ?>">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>
                            <div class="menuSiswaD shadow"
                                style="display:none; position:absolute; right:0; top:0; z-index:3; background-color:white;"
                                id="menuSiswaD{{ $adm->id }}">

                                <div style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                    <a class="dropdown-item text-gray-800 dataadmin" data-toggle="modal"
                                        data-target="#ubahAdmin" class="btn btn-primary dataadmin"
                                        data-idadmin="<?= $adm['id'] ?>" data-uraian="<?= $adm['uraian'] ?>"
                                        data-biaya="{{ 'Rp ' . number_format($adm['biaya'], 0, ',', '.') }}">
                                        Ubah
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-gray-800 dataadmin" data-toggle="modal"
                                        data-target="#hapusAdmin" data-idadmin="<?= $adm['id'] ?>"
                                        data-uraian="<?= $adm['uraian'] ?>">
                                        Hapus
                                    </a>
                                </div>
                            </div>

                        </div>
                        <hr style="background-color: white; margin-top:-10px;">
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        <div class="topFileSiswa text-hp" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative;">
                            <div style="width:10vw;">
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p>Jumlah Total</p>
                                <p style="margin-top:-18px;">{{ 'Rp ' . number_format($total, 2, ',', '.') }}</p>
                            </div>

                        </div>
                        <hr style="background-color: white; margin-top:-10px;">
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Modal Tambah Paket -->
    <div class="modal fade" id="gol_admin" tabindex="-1" role="dialog" aria-labelledby="gol_adminLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gol_adminLabel">Tambah Biaya Administrasi</h5>
                    <a data-dismiss="modal" class="close" aria-label="Close">
                        <i aria-hidden="true">&times;</i>
                    </a>
                </div>
                <form action="/keuangan/administrasi/tambah" method="POST">
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

    <!-- Modal Ubah Paket -->
    <div class="modal fade" id="ubahAdmin" tabindex="-1" role="dialog" aria-labelledby="ubahAdminLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ubahAdminLabel">Ubah Biaya Administrasi</h5>
                    <a class="close" aria-label="Close" data-dismiss="modal">
                        <i aria-hidden="true">&times;</i>
                    </a>
                </div>
                <form action="/keuangan/administrasi/ubah" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="tingkat" name="tingkat"
                                value="{{ $tingkat }}">
                            <input type="hidden" class="form-control" id="idubah" name="idubah">
                            <input type="text" class="form-control" id="uraian1" name="uraian1"
                                placeholder="Uraian biaya">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="rupiahubah" name="rupiahubah"
                                placeholder="Biaya mandiri">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" data-dismiss="modal"
                            style="background-color: #d03672; border-color: #d03672;">Batal</a>
                        <button type="submit" class="btn btn-primary"
                            style="background-color: #226462; border-color: #226462;">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Hapus Paket -->
    <div class="modal fade" id="hapusAdmin" tabindex="-1" role="dialog" aria-labelledby="hapusAdminLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusAdminLabel">Hapus Biaya Administrasi</h5>
                    <a data-dismiss="modal" class="close" aria-label="Close">
                        <i aria-hidden="true">&times;</i>
                    </a>
                </div>
                <form action="/keuangan/administrasi/hapus" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="tingkat" name="tingkat"
                                value="{{ $tingkat }}">
                            <input type="hidden" class="form-control" id="idhapus" name="idhapus">
                            <p>Hapus biaya <span id="admhapus"></span> ?</p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" data-dismiss="modal"
                            style="background-color: #d03672; border-color: #d03672;">Batal</a>
                        <button type="submit" class="btn btn-primary"
                            style="background-color: #226462; border-color: #226462;">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const dataadmin = document.querySelectorAll(".dataadmin");
        dataadmin.forEach(function(button) {
            button.addEventListener("click", function() {
                // Dapatkan data ID siswa dari atribut data
                var idadmin = this.getAttribute("data-idadmin");
                var uraian = this.getAttribute("data-uraian");
                var biaya = this.getAttribute("data-biaya");
                $('#idubah').val(idadmin);
                $('#idhapus').val(idadmin);
                $('#uraian1').val(uraian);
                $('#rupiahubah').val(biaya);
                document.getElementById('admhapus').innerHTML = uraian;
            });
        });
    </script>
@endsection
