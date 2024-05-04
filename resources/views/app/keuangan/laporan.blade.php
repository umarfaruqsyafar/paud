<?php
if ($tingkat == 'tk') {
    $tkt = 'TK';
} elseif ($tingkat == 'kb') {
    $tkt = 'KB';
} else {
    $tkt = 'DAY CARE';
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
                <a href="/keuangan/laporan/tk/in"
                    class="btn btn-icon-split {{ Request::is('keuangan/laporan/tk*') ? 'bg-secondary' : 'bg-info' }}">
                    <span class="icon text-white {{ Request::is('keuangan/laporan/tk*') ? 'bg-secondary' : 'bg-info' }}">
                        <i class="fas fa-home"></i>
                    </span>
                    <span class="text text-white {{ Request::is('keuangan/laporan/tk*') ? 'bg-secondary' : 'bg-info' }}"
                        style="margin-left: -8px;">TK</span>
                </a>
                <a href="/keuangan/laporan/kb/in"
                    class="btn btn-icon-split {{ Request::is('keuangan/laporan/kb*') ? 'bg-secondary' : 'bg-info' }}">
                    <span class="icon text-white {{ Request::is('keuangan/laporan/kb*') ? 'bg-secondary' : 'bg-info' }}">
                        <i class="fas fa-home"></i>
                    </span>
                    <span class="text text-white {{ Request::is('keuangan/laporan/kb*') ? 'bg-secondary' : 'bg-info' }}"
                        style="margin-left: -8px;">KB</span>
                </a>
                <a href="/keuangan/laporan/dc/in"
                    class="btn btn-icon-split {{ Request::is('keuangan/laporan/dc*') ? 'bg-secondary' : 'bg-info' }}">
                    <span class="icon text-white {{ Request::is('keuangan/laporan/dc*') ? 'bg-secondary' : 'bg-info' }}">
                        <i class="fas fa-home"></i>
                    </span>
                    <span class="text text-white {{ Request::is('keuangan/laporan/dc*') ? 'bg-secondary' : 'bg-info' }}"
                        style="margin-left: -8px;">Day Care</span>
                </a>

            </div>
            <div class="col-lg-6 mb-3 text-align-hp">
                <a href="/keuangan/laporan/{{ $tingkat }}/in"
                    class="btn btn-icon-split {{ Request::is('keuangan/laporan/' . $tingkat . '/in') ? 'btn-secondary' : 'btn-info' }}">
                    <span class="icon text-white-50">
                        <i class="fas fa-calculator"></i>
                    </span>
                    <span class="text">Pemasukan</span>
                </a>
                <a href="/keuangan/laporan/{{ $tingkat }}/out"
                    class="btn btn-icon-split {{ Request::is('keuangan/laporan/' . $tingkat . '/out') ? 'btn-secondary' : 'btn-info' }}">
                    <span class="icon text-white-50">
                        <i class="fas fa-calculator"></i>
                    </span>
                    <span class="text">Pengeluaran</span>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-5">
                <div class="card mb-2">
                    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Laporan Keuangan {{ $tkt }}</h6>
                    </a>
                    <div class="collapse row m-3" id="collapseCardExample">
                        <div class="col-lg-12">
                            <div class="text-hp">
                                <!-- Card Content - Collapse -->
                                <div class="row">
                                    <div class="col-4">
                                        <div>
                                            <p class="m-laporan">Pemasukan</p>
                                            <p class="m-laporan" style="margin-top: -12px;">Pengeluaran</p>
                                            <p class="m-laporan" style="margin-top: -12px;"><strong>Total</strong></p>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div>
                                            <p class="m-laporan">:</p>
                                            <p class="m-laporan" style="margin-top: -12px;">:</p>
                                            <p class="m-laporan" style="margin-top: -12px;">:</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <p class="m-laporan"> <?= 'Rp ' . number_format($spp + $administrasi +
                                                $total_masuk, 2, ',', '.') ?>
                                            </p>
                                            <p class="m-laporan" style="margin-top: -12px;">
                                                <?= 'Rp ' . number_format($total_keluar, 2, ',', '.') ?></p>
                                            <p class="m-laporan" style="margin-top: -12px;"><strong>
                                                    <?= 'Rp ' . number_format($spp + $administrasi + $total_masuk -
                                                    $total_keluar, 2, ',', '.') ?></strong>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-3 mt-1 mb-2 text-align-hp">
                @if (Request::is('keuangan/laporan*in'))
                    <a data-toggle="modal" data-target="#pemasukan" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Pemasukan</span>
                    </a>
                @else
                    <a data-toggle="modal" data-target="#pengeluaran" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Pengeluaran</span>
                    </a>
                @endif

            </div>
            <div class="col-lg-4 mb-3">
                <div>
                    @if (Request::is('keuangan/laporan*in'))
                        <form action="/keuangan/laporan/{{ $tingkat }}/in" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control border-0 small" id="cari_laporan"
                                    name="cari_laporan" placeholder="Cari pemasukan..." aria-label="Search"
                                    aria-describedby="basic-addon2" autocomplete="off">
                                <div class="input-group-append">
                                    <button class="btn btn-primary border-0" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>

                            </div>
                        </form>
                    @else
                        <form action="/keuangan/laporan/{{ $tingkat }}/out" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control border-0 small" id="cari_laporan"
                                    name="cari_laporan" placeholder="Cari pengeluaran..." aria-label="Search"
                                    aria-describedby="basic-addon2" autocomplete="off">
                                <div class="input-group-append">
                                    <button class="btn btn-primary border-0" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>

                            </div>
                        </form>
                    @endif

                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 mb-2">
                        <h6 class="m-0 font-weight-bold text-primary">Rincian Laporan Keuangan</h6>
                    </div>

                    <div class="card-body side-com">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                @if (Request::is('keuangan/laporan*in'))
                                    <thead>
                                        <tr class="text-center">
                                            <th style="width: 5%;">No</th>
                                            <th style="width: 20%;">Jenis Pemasukan</th>
                                            <th style="width: 15%;">Tanggal</th>
                                            <th style="width: 20%;">Nominal</th>
                                            <th style="width: 25%;">Keterangan</th>
                                            <th style="width: 15%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td class="text-center">1</td>
                                            <td class="text-left">Total SPP</td>
                                            <td class="text-center">-</td>
                                            <td class="text-right">
                                                <?= 'Rp ' . number_format($spp, 2, ',', '.') ?></td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td class="text-center">2</td>
                                            <td class="text-left">Total administrasi</td>
                                            <td class="text-center">-</td>
                                            <td class="text-right">
                                                <?= 'Rp ' . number_format($administrasi, 2, ',', '.') ?></td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                        </tr>
                                        <?php $i = 3; ?>
                                        <?php foreach ($laporan_masuk as $k) : ?>
                                        <tr class="text-center">
                                            <td style="vertical-align: middle;" class="text-center">
                                                <?= $i ?></td>
                                            <td style="vertical-align: middle;" class="text-left">
                                                <?= $k['jenis'] ?>
                                            </td>
                                            <td style="vertical-align: middle;" class="text-center">
                                                <?= date('d-m-Y', strtotime($k['created_at'])) ?></td>
                                            <td style="vertical-align: middle;" class="text-right">
                                                <?= 'Rp ' . number_format($k['masuk'], 2, ',', '.') ?></td>
                                            <td style="vertical-align: middle;" class="text-left">
                                                <?= $k['keterangan'] ?></td>
                                            <td style="vertical-align: middle;" class="text-center">
                                                <a class="btn btn-circle btn-sm btn-primary tombol-edit dataSiswa"
                                                    data-toggle="modal" data-target="#edit<?= $k['id'] ?>">
                                                    <span class="icon text-white-100">
                                                        <i class="fas fa-recycle"></i>
                                                    </span>
                                                </a>
                                                <div class="modal fade" id="edit<?= $k['id'] ?>" tabindex="-1"
                                                    role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form action="/keuangan/laporan/perubahan" method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <input type="hidden" class="form-control"
                                                                            id="tingkat" name="tingkat"
                                                                            value="{{ $tingkat }}">
                                                                        <input type="hidden" class="form-control"
                                                                            id="ket" name="ket" value="in">
                                                                        <input type="hidden" class="form-control"
                                                                            id="idlaporan" name="idlaporan"
                                                                            value="{{ $k->id }}">
                                                                        <input type="text" class="form-control"
                                                                            id="jenis" name="jenis"
                                                                            value="<?= $k['jenis'] ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input type="text"
                                                                            class="form-control format-rupiah"
                                                                            id="rupiahubah" name="rupiahubah"
                                                                            value="<?= 'Rp ' . number_format($k['masuk'],
                                                                            0, ',' , '.' ) ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input type="text" class="form-control"
                                                                            id="keterangan" name="keterangan"
                                                                            value="<?= $k['keterangan'] ?>"
                                                                            placeholder="Keterangan">
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Tutup</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Ubah</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class=" btn btn-circle btn-sm btn-danger tombol-min"
                                                    data-toggle="modal" data-target="#hapus<?= $k['id'] ?>">
                                                    <span class="icon text-white-100">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </a>
                                                <div class="modal fade" id="hapus<?= $k['id'] ?>" tabindex="-1"
                                                    role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form action="/keuangan/laporan/hapus" method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <input type="hidden" class="form-control"
                                                                            id="tingkat" name="tingkat"
                                                                            value="{{ $tingkat }}">
                                                                        <input type="hidden" class="form-control"
                                                                            id="ket" name="ket" value="in">
                                                                        <input type="hidden" class="form-control"
                                                                            id="idlaporan" name="idlaporan"
                                                                            value="{{ $k->id }}">
                                                                        <p style="color: gray; text-align:left;">Yakin
                                                                            ingin menghapus
                                                                            {{ $k->jenis }} ?</p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Tutup</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Lanjut</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr><?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                @else
                                    <thead>
                                        <tr class="text-center">
                                            <th style="width: 5%;">No</th>
                                            <th style="width: 20%;">Jenis Pengeluaran</th>
                                            <th style="width: 15%;">Tanggal</th>
                                            <th style="width: 20%;">Nominal</th>
                                            <th style="width: 25%;">Keterangan</th>
                                            <th style="width: 15%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 3; ?>
                                        <?php foreach ($laporan_keluar as $k) : ?>
                                        <tr class="text-center">
                                            <td style="vertical-align: middle;" class="text-center"><?= $i ?></td>
                                            <td style="vertical-align: middle;" class="text-left"><?= $k['jenis'] ?>
                                            </td>
                                            <td style="vertical-align: middle;" class="text-center">
                                                <?= date('d-m-Y', strtotime($k['created_at'])) ?></td>
                                            <td style="vertical-align: middle;" class="text-right">
                                                <?= 'Rp ' . number_format($k['keluar'], 2, ',', '.') ?></td>
                                            <td style="vertical-align: middle;" class="text-left">
                                                <?= $k['keterangan'] ?></td>
                                            <td style="vertical-align: middle;" class="text-center">
                                                <a class="btn btn-circle btn-sm btn-primary tombol-edit dataSiswa"
                                                    data-toggle="modal" data-target="#edit<?= $k['id'] ?>">
                                                    <span class="icon text-white-100">
                                                        <i class="fas fa-recycle"></i>
                                                    </span>
                                                </a>
                                                <div class="modal fade" id="edit<?= $k['id'] ?>" tabindex="-1"
                                                    role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form action="/keuangan/laporan/perubahan" method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <input type="hidden" class="form-control"
                                                                            id="tingkat" name="tingkat"
                                                                            value="{{ $tingkat }}">
                                                                        <input type="hidden" class="form-control"
                                                                            id="ket" name="ket" value="out">
                                                                        <input type="hidden" class="form-control"
                                                                            id="idlaporan" name="idlaporan"
                                                                            value="{{ $k->id }}">
                                                                        <input type="text" class="form-control"
                                                                            id="jenis" name="jenis"
                                                                            value="<?= $k['jenis'] ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input type="text"
                                                                            class="form-control format-rupiah"
                                                                            id="rupiahubah" name="rupiahubah"
                                                                            value="<?= 'Rp ' . number_format($k['keluar'],
                                                                            0, ',' , '.' ) ?>">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input type="text" class="form-control"
                                                                            id="keterangan" name="keterangan"
                                                                            value="<?= $k['keterangan'] ?>"
                                                                            placeholder="Keterangan">
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Tutup</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Ubah</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="btn btn-circle btn-sm btn-danger tombol-min" data-toggle="modal"
                                                    data-target="#hapus<?= $k['id'] ?>">
                                                    <span class="icon text-white-100">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </a>
                                                <div class="modal fade" id="hapus<?= $k['id'] ?>" tabindex="-1"
                                                    role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form action="/keuangan/laporan/hapus" method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <input type="hidden" class="form-control"
                                                                            id="tingkat" name="tingkat"
                                                                            value="{{ $tingkat }}">
                                                                        <input type="hidden" class="form-control"
                                                                            id="ket" name="ket" value="out">
                                                                        <input type="hidden" class="form-control"
                                                                            id="idlaporan" name="idlaporan"
                                                                            value="{{ $k->id }}">
                                                                        <p style="color: gray; text-align:left;">Yakin
                                                                            ingin menghapus
                                                                            {{ $k->jenis }} ?</p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Tutup</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Lanjut</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr><?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                @endif
                            </table>
                        </div>
                    </div>

                    <div class="card-body side-hp">
                        @if (Request::is('keuangan/laporan*in'))
                            <div class="text-hp topFileSiswa" id="topFile" style="display:flex; position:relative;">
                                <div style="width:10vw;">
                                    <div>1</div>
                                </div>
                                <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <p>Total SPP : <span
                                            style="float: right;"><?= 'Rp ' . number_format($spp, 2, ',', '.') ?></span>
                                    </p>
                                </div>
                            </div>
                            <hr style="margin-top:-10px;">
                            <div class="text-hp topFileSiswa" id="topFile"
                                style="display:flex; margin-top:-10px; position:relative;">
                                <div style="width:10vw;">
                                    <div>2</div>
                                </div>
                                <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <p>Total administrasi : <span
                                            style="float: right;"><?= 'Rp ' . number_format($administrasi, 2, ',', '.') ?></span>
                                    </p>
                                </div>
                            </div>
                            <hr style="margin-top:-10px;">
                            <?php $i = 3; ?>
                            <?php foreach ($laporan_masuk as $k) : ?>
                            <div class="text-hp topFileSiswa" id="topFile"
                                style="display:flex; margin-top:-10px; position:relative;">
                                <div style="width:10vw;">
                                    <div><?= $i ?></div>
                                </div>
                                <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <p><?= $k['jenis'] ?></p>
                                    <p style="margin-top:-18px;"><?= date('d-m-Y', strtotime($k['created_at'])) ?></p>
                                    <p style="margin-top:-18px;"><?= 'Rp ' . number_format($k['masuk'], 2, ',' , '.' ) ?>
                                    </p>
                                    @if ($k['keterangan'])
                                        <p style="margin-top:-18px;"><?= $k['keterangan'] ?></p>
                                    @endif
                                </div>
                                <div class="btnMenuSiswa" style="width:10vw; display: flex; justify-content:right;"
                                    id="btnMenuSiswa" data-idsiswa="<?= $k['id'] ?>">
                                    <i class="fas fa-info-circle text-warning"></i>
                                </div>
                                <div class="menuSiswaD shadow"
                                    style="display:none; position:absolute; right:0; top:0; z-index:3; background-color:white;"
                                    id="menuSiswaD{{ $k->id }}">

                                    <div style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                        <a class="dropdown-item text-gray-800" data-toggle="modal"
                                            data-target="#edithp<?= $k['id'] ?>">
                                            Ubah
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-gray-800" data-toggle="modal"
                                            data-target="#hapushp<?= $k['id'] ?>">
                                            Hapus
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <hr style="margin-top:-10px;">
                            <div class="modal fade" id="edithp<?= $k['id'] ?>" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="/keuangan/laporan/perubahan" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <input type="hidden" class="form-control" id="tingkat"
                                                        name="tingkat" value="{{ $tingkat }}">
                                                    <input type="hidden" class="form-control" id="ket"
                                                        name="ket" value="in">
                                                    <input type="hidden" class="form-control" id="idlaporan"
                                                        name="idlaporan" value="{{ $k->id }}">
                                                    <input type="text" class="form-control" id="jenis"
                                                        name="jenis" value="<?= $k['jenis'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control format-rupiah"
                                                        id="rupiahubah" name="rupiahubah" value="<?= 'Rp ' .
                                                        number_format($k['masuk'], 0, ',' , '.' ) ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="keterangan"
                                                        name="keterangan" value="<?= $k['keterangan'] ?>"
                                                        placeholder="Keterangan">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Ubah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="hapushp<?= $k['id'] ?>" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="/keuangan/laporan/hapus" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <input type="hidden" class="form-control" id="tingkat"
                                                        name="tingkat" value="{{ $tingkat }}">
                                                    <input type="hidden" class="form-control" id="ket"
                                                        name="ket" value="in">
                                                    <input type="hidden" class="form-control" id="idlaporan"
                                                        name="idlaporan" value="{{ $k->id }}">
                                                    <p style="color: gray; text-align:left;">Yakin ingin menghapus
                                                        {{ $k->jenis }} ?</p>
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
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        @else
                            <?php $i = 1; ?>
                            <?php foreach ($laporan_keluar as $k) : ?>
                            <div class="text-hp topFileSiswa" id="topFile"
                                style="display:flex; margin-top:-10px; position:relative;">
                                <div style="width:10vw;">
                                    <div><?= $i ?></div>
                                </div>
                                <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <p><?= $k['jenis'] ?></p>
                                    <p style="margin-top:-18px;"><?= date('d-m-Y', strtotime($k['created_at'])) ?></p>
                                    <p style="margin-top:-18px;"><?= 'Rp ' . number_format($k['keluar'], 2, ',' , '.' ) ?>
                                    </p>
                                    @if ($k['keterangan'])
                                        <p style="margin-top:-18px;"><?= $k['keterangan'] ?></p>
                                    @endif
                                </div>
                                <div class="btnMenuSiswa" style="width:10vw; display: flex; justify-content:right;"
                                    id="btnMenuSiswa" data-idsiswa="<?= $k['id'] ?>">
                                    <i class="fas fa-info-circle text-warning"></i>
                                </div>
                                
                                <div class="menuSiswaD shadow"
                                    style="display:none; position:absolute; right:0; top:0; z-index:3; background-color:white;"
                                    id="menuSiswaD<?= $k['id'] ?>">
                                    <div style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                        <a class="dropdown-item text-gray-800" class="btn btn-primary" data-toggle="modal"
                                            data-target="#edithp<?= $k['id'] ?>">
                                            Ubah
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-gray-800" data-toggle="modal"
                                            data-target="#hapushp<?= $k['id'] ?>">
                                            Hapus
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <hr style="background-color: white; margin-top:-10px;">
                            <div class="modal fade" id="edithp<?= $k['id'] ?>" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="/keuangan/laporan/perubahan" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <input type="hidden" class="form-control" id="tingkat"
                                                        name="tingkat" value="{{ $tingkat }}">
                                                    <input type="hidden" class="form-control" id="ket"
                                                        name="ket" value="out">
                                                    <input type="hidden" class="form-control" id="idlaporan"
                                                        name="idlaporan" value="{{ $k->id }}">
                                                    <input type="text" class="form-control" id="jenis"
                                                        name="jenis" value="<?= $k['jenis'] ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control format-rupiah"
                                                        id="rupiahubah" name="rupiahubah" value="<?= 'Rp ' .
                                                        number_format($k['keluar'], 0, ',' , '.' ) ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="keterangan"
                                                        name="keterangan" value="<?= $k['keterangan'] ?>"
                                                        placeholder="Keterangan">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Ubah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="hapushp<?= $k['id'] ?>" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="/keuangan/laporan/hapus" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <input type="hidden" class="form-control" id="tingkat"
                                                        name="tingkat" value="{{ $tingkat }}">
                                                    <input type="hidden" class="form-control" id="ket"
                                                        name="ket" value="out">
                                                    <input type="hidden" class="form-control" id="idlaporan"
                                                        name="idlaporan" value="{{ $k->id }}">
                                                    <p style="color: gray; text-align:left;">Yakin ingin menghapus
                                                        {{ $k->jenis }} ?</p>
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
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>





    <!-- Modal Tambah Data Kelas -->
    <div class="modal fade" id="pemasukan" tabindex="-1" role="dialog" aria-labelledby="pemasukanTKLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pemasukanTKLabel">Tambah Pemasukan {{ $tkt }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/keuangan/laporan/masuk" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="tingkat" name="tingkat"
                                value="{{ $tingkat }}">
                            <input type="text" class="form-control" id="jenis" name="jenis"
                                placeholder="Jenis Pemasukan">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="rupiah" name="rupiah"
                                placeholder="Nominal Pemasukan">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="keterangan" name="keterangan"
                                placeholder="Keterangan">
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
    <div class="modal fade" id="pengeluaran" tabindex="-1" role="dialog" aria-labelledby="pengeluaranLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="peengeluaranLabel">Tambah Pengeluaran {{ $tkt }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/keuangan/laporan/keluar" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="tingkat" name="tingkat"
                                value="{{ $tingkat }}">
                            <input type="text" class="form-control" id="jenis" name="jenis"
                                placeholder="Jenis Peengeluaran">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="rupiah1" name="rupiah1"
                                placeholder="Nominal Peengeluaran">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="keterangan" name="keterangan"
                                placeholder="Keterangan">
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
