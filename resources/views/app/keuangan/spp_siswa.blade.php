@extends('app.layouts.main')
@section('container')
    <?php
    $tambah = 0;
    $kurang = 0;
    foreach ($perubahan as $p) {
        if ($siswa->id == $p->siswa_id) {
            $tambah = $p->tambah;
            $kurang = $p->kurang;
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
                    <h6 class="m-0 font-weight-bold text-primary">Pembayaran SPP {{ $siswa->nama }}</h6>
                </div>
                <div class="row mt-3 ml-3 mr-3">
                    <div class="col-lg-4">
                        <p class="text-hp" style="margin:0;"><b>Keterangan</b></p>
                        <li class="text-hp">SPP :
                            <span
                                style="float: right;">{{ 'Rp ' . number_format($spp_siswa->biaya + $tambah - $kurang, 2, ',', '.') }}</span>
                        </li>
                        <li class="text-hp">Terakhir pembayaran :
                            <span style="float: right;">{{ $spp_terbayar_akhir->bulan }}</span>
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
                                    @can('bendahara_walas')
                                        <th style="width: 10%;">Hapus</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($spp_siswa_detail as $sm) : ?>
                                <tr>
                                    <td class="text-center"><?= $i ?></td>
                                    <td class="text-center"><?= date('d-m-Y', strtotime($sm['created_at'])) ?></td>
                                    <td class="text-right">
                                        <?= 'Rp ' . number_format($sm['nominal'], 2, ',', '.') ?></td>
                                    <td class="text-left"><?= $sm['catatan'] ?></td>
                                    @can('bendahara_walas')
                                        <td class="text-center">
                                            <a data-toggle="modal" data-target="#hapus{{ $sm->id }}"
                                                class="btn btn-circle btn-sm btn-danger tombol-min">
                                                <span class="icon text-white-100">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </a>
                                        </td>
                                    @endcan
                                </tr>
                                <!-- Modal Ubah Paket -->
                                <div class="modal fade" id="hapus{{ $sm->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="plusadminLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header mb-3">
                                                <h5 class="modal-title" id="plusadminLabel">Hapus Pembayaran SPP</h5>
                                                <a class="close" aria-label="Close" data-dismiss="modal">
                                                    <i aria-hidden="true">&times;</i>
                                                </a>
                                            </div>
                                            <form action="/keuangan/pembayaran_spp/siswa/hapus" method="POST">
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
                                                    <a class="btn btn-secondary" data-dismiss="modal">Tutup</a>
                                                    <button type="submit" class="btn btn-primary">Lanjut</button>
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
                    <?php foreach ($spp_siswa_detail as $sm) : ?>

                    <div class="text-hp topFileSiswa" id="topFile"
                        style="display:flex; margin-top:-10px; position:relative;">
                        <div style="width:10vw;">
                            <div><?= $i ?></div>
                        </div>
                        @can('bendahara_walas')
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
                        @endcan

                    </div>
                    <hr style="background-color: white; margin-top:-10px;">
                    <div class="modal fade" id="hapushp{{ $sm->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="plusadminLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header mb-3">
                                    <h5 class="modal-title" id="plusadminLabel">Hapus Pembayaran SPP</h5>
                                    <a class="close" aria-label="Close" data-dismiss="modal">
                                        <i aria-hidden="true">&times;</i>
                                    </a>
                                </div>
                                <form action="/keuangan/pembayaran_spp/siswa/hapus" method="POST">
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



    <!-- Begin Page Content -->
    <div class="container side-hp m-footer">

        <div style="margin-bottom: 20px;">
            <h6 class="m-0 font-weight-bold text-white text-uppercase text-center">Pembayaran SPP
                <?= $siswa['nama'] ?></h6>
            @if (session()->has('success'))
                <div class="alert warna-3 text-white" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="row mb-3">
            <div class="col-lg-4">
                <div class="ml-1">
                    <p class="text-white" style="margin:0;"><b>Keterangan</b></p>
                    <li class="text-white">SPP :
                        <span
                            style="float: right;">{{ 'Rp ' . number_format($spp_siswa->biaya + $tambah - $kurang, 2, ',', '.') }}</span>
                    </li>
                    <li class="text-white">Terakhir pembayaran :
                        <span style="float: right;">{{ $spp_terbayar_akhir->bulan }}</span>
                    </li>
                </div>
            </div>
        </div>

        <div style="margin-top: 30px;"></div>
        <?php $i = 1; ?>
        <?php foreach ($spp_siswa_detail as $sm) : ?>

        <div class="text-white topFileSiswa" id="topFile" style="display:flex; margin-top:-10px; position:relative;">
            <div style="width:10vw;">
                <div><?= $i ?></div>
            </div>
            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <p><?= date('d-m-Y', strtotime($sm['created_at'])) ?></p>
                <p style="margin-top:-18px;"><?= 'Rp ' . number_format($sm['nominal'], 2, ',' , '.' ) ?></p>
                <p style="margin-top:-18px;">Catatan : {{ $sm['catatan'] }}</p>
            </div>
            <div class="btnMenuSiswa" style="width:10vw; display: flex; justify-content:right;" id="btnMenuSiswa"
                data-idsiswa="<?= $sm['id'] ?>">
                <img style="width:6px; height:20px; margin-top:3px;" src="/img/app/titiktiga.png" alt="titik tiga">
            </div>
            <div class="menuSiswaD" style="display:none; width:30vw; position:absolute; right:0; top:0; z-index: 9;"
                id="menuSiswaD<?= $sm['id'] ?>">
                <div class="warna-1" style="border-radius:10px;">
                    <a class="dropdown-item text-white" <a href="" class="btn btn-danger tombol-min"
                        data-toggle="modal" data-target="#hapushp{{ $sm->id }}">
                        hapus
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
                        <h5 class="modal-title" id="plusadminLabel">Hapus Pembayaran SPP</h5>
                        <a class="close" aria-label="Close" data-dismiss="modal">
                            <i aria-hidden="true">&times;</i>
                        </a>
                    </div>
                    <form action="/keuangan/pembayaran_spp/siswa/hapus" method="POST">
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
@endsection
