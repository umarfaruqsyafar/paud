@extends('app.layouts.main')
@section('container')
    <?php
    $administrasi = 0;
    $tambah = 0;
    $kurang = 0;
    $terbayar = 0;
    foreach ($administrasi_siswa as $as) {
        if ($siswa->id == $as->siswa_id) {
            $administrasi = $as->administrasi;
        }
    }
    foreach ($perubahan as $p) {
        if ($siswa->id == $p->siswa_id) {
            $tambah = $p->tambah;
            $kurang = $p->kurang;
        }
    }
    foreach ($administrasi_terbayar as $at) {
        if ($siswa->id == $at->siswa_id) {
            $terbayar = $at->total;
        }
    }
    ?>


    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="alert bg-warning text-white" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <!-- Page Heading -->

        <div>
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pembayaran Administrasi {{ $siswa->nama }}</h6>
                </div>
                <div class="row mt-3 ml-3 mr-3">
                    <div class="col-lg-4">
                        <p class="text-hp" style="margin:0;"><b>Keterangan</b></p>
                        <li class="text-hp">Administrasi :
                            <span
                                style="float: right;">{{ 'Rp ' . number_format($administrasi + $tambah - $kurang, 2, ',', '.') }}</span>
                        </li>
                        <li class="text-hp">Terbayar :
                            <span style="float: right;">{{ 'Rp ' . number_format($terbayar, 2, ',', '.') }}</span>
                        </li>
                        <li class="text-hp">Sisa pembayaran :
                            <span
                                style="float: right;"><b>{{ 'Rp ' . number_format($administrasi + $tambah - $kurang - $terbayar, 2, ',', '.') }}</b></span>
                        </li>
                    </div>
                </div>
                <div class="card-body side-com">
                    
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 20%;">Tanggal Pembayaran</th>
                                    <th style="width: 20%;">Pembayaran</th>
                                    <th>Catatan</th>
                                    <th style="width: 10%;">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($administrasi_siswa_detail as $sm) : ?>
                                <tr>
                                    <td class="text-center"><?= $i ?></td>
                                    <td class="text-center"><?= date('d-m-Y', strtotime($sm['created_at'])) ?></td>
                                    <td class="text-right">
                                        <?= 'Rp ' . number_format($sm['nominal'], 2, ',', '.') ?></td>
                                    <td class="text-left"><?= $sm['catatan'] ?></td>
                                    <td class="text-center">
                                        <a data-toggle="modal" data-target="#hapus{{ $sm->id }}"
                                            class="btn btn-circle btn-sm btn-danger tombol-min">
                                            <span class="icon text-white-100">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                <!-- Modal Ubah Paket -->
                                <div class="modal fade" id="hapus{{ $sm->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="plusadminLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header mb-3">
                                                <h5 class="modal-title" id="plusadminLabel">Hapus Pembayaran Administrasi
                                                </h5>
                                                <a class="close" aria-label="Close" data-dismiss="modal">
                                                    <i aria-hidden="true">&times;</i>
                                                </a>
                                            </div>
                                            <form action="/keuangan/pembayaran_adm/siswa/hapus" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" class="form-control" id="idsiswa" name="idsiswa"
                                                        value="{{ $siswa->id }}">
                                                    <input type="hidden" class="form-control" id="idpembaya"
                                                        name="idpembayaran" value="{{ $sm->id }}">
                                                    <div class="mb-3">
                                                        <p>Yakin ingin membatalkan pembayaran ini ?</p>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-secondary" data-dismiss="modal"
                                                        style="background-color: #d03672; border-color: #d03672;">Tutup</a>
                                                    <button type="submit" class="btn btn-primary"
                                                        style="background-color: #226462; border-color: #226462;">Lanjut</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-body side-hp">
                    <?php $i = 1; ?>
                    <?php foreach ($administrasi_siswa_detail as $sm) : ?>

                    <div class="text-hp topFileSiswa" id="topFile"
                        style="display:flex; margin-top:-10px; position:relative;">
                        <div style="width:10vw;">
                            <div><?= $i ?></div>
                        </div>
                        <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <p><?= date('d-m-Y', strtotime($sm['created_at'])) ?></p>
                            <p style="margin-top:-18px;"><?= 'Rp ' . number_format($sm['nominal'], 2, ',' , '.' ) ?></p>
                            <p style="margin-top:-18px;">Catatan : {{ $sm['catatan'] }}</p>
                        </div>
                        <div class="btnMenuSiswa" style="width:10vw; display: flex; justify-content:right;"
                            id="btnMenuSiswa" data-idsiswa="<?= $sm['id'] ?>">
                            <i class="fas fa-info-circle text-warning"></i>
                        </div>
                        <div class="menuSiswaD shadow"
                            style="display:none; position:absolute; right:0; top:0; z-index:3; background-color:white;"
                            id="menuSiswaD{{ $sm->id }}">

                            <div style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                <a class="dropdown-item text-gray-800" data-toggle="modal"
                                    data-target="#hapushp{{ $sm->id }}">
                                    Hapus
                                </a>
                            </div>
                        </div>

                    </div>
                    <hr style="background-color: white; margin-top:-10px;">
                    <div class="modal fade" id="hapushp{{ $sm->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="plusadminLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header mb-3">
                                    <h5 class="modal-title" id="plusadminLabel">Hapus Pembayaran Administrasi</h5>
                                    <a class="close" aria-label="Close" data-dismiss="modal">
                                        <i aria-hidden="true">&times;</i>
                                    </a>
                                </div>
                                <form action="/keuangan/pembayaran_adm/siswa/hapus" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" id="idsiswa" name="idsiswa"
                                            value="{{ $siswa->id }}">
                                        <input type="hidden" class="form-control" id="idpembaya" name="idpembayaran"
                                            value="{{ $sm->id }}">
                                        <div class="mb-3">
                                            <p>Yakin ingin membatalkan pembayaran ini ?</p>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-secondary" data-dismiss="modal"
                                            style="background-color: #d03672; border-color: #d03672;">Tutup</a>
                                        <button type="submit" class="btn btn-primary"
                                            style="background-color: #226462; border-color: #226462;">Lanjut</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>

    </div>

@endsection
