<?php
$tabungan = null;
$penarikan = null;
if ($total_tabungan_siswa) {
    $tabungan = $total_tabungan_siswa->total_tabungan;
    $penarikan = $total_tabungan_siswa->total_penarikan;
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

        <div>
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabungan {{ $siswa->nama }}</h6>
                </div>
                <div class="row mt-3 ml-3 mr-3">
                    <div class="col-lg-4">
                        <li class="text-hp">Tabungan :
                            <b><span style="float: right;">{{ 'Rp ' . number_format($tabungan, 2, ',', '.') }}</span></b>
                        </li>
                        <li class="text-hp">Penarikan :
                            <b><span style="float: right;">{{ 'Rp ' . number_format($penarikan, 2, ',', '.') }}</span></b>
                        </li>
                    </div>
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4 mt-2 mb-2">
                        @can('bendahara')
                            <form action="/keuangan/tabungan/siswa/{{ $siswa->id }}" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control border-0 small bg-light" id="cari_tabungan"
                                        name="cari_tabungan" placeholder="Cari tabungan (YYYY-MM-DD)" aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary border-0" type="submit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @endcan
                    </div>
                </div>
                <div class="card-body side-com">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 17%;">Tanggal</th>
                                    <th style="width: 17%;">Tanggal Perubahan</th>
                                    <th style="width: 18%;">Menabung</th>
                                    <th style="width: 18%;">Penarikan</th>
                                    <th>Catatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($info_tabungan as $it) : ?>
                                <tr>
                                    <td class="text-center"><?= $i ?></td>
                                    <td class="text-center"><?= date('d-m-Y', strtotime($it['created_at'])) ?>
                                    </td>
                                    @if ($it['created_at'] == $it['updated_at'])
                                        <td class="text-center"></td>
                                    @else
                                        <td class="text-center">
                                            <?= date('d-m-Y', strtotime($it['updated_at'])) ?>
                                        </td>
                                    @endif
                                    <td class="text-right">
                                        <?= 'Rp ' . number_format($it['menabung'], 2, ',', '.') ?></td>
                                    <td class="text-right">
                                        <?= 'Rp ' . number_format($it['penarikan'], 2, ',', '.') ?></td>
                                    <td class="text-left"><?= $it['catatan'] ?></td>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-body side-hp">
                    <?php $i = 1; ?>
                    <?php foreach ($info_tabungan as $it) : ?>

                    <div class="text-hp topFileSiswa" id="topFile"
                        style="display:flex; margin-top:-10px; position:relative;">
                        <div style="width:10vw;">
                            <div><?= $i ?></div>
                        </div>
                        <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <p>Tanggal : <?= date('d-m-Y', strtotime($it['created_at'])) ?></p>
                            @if ($it['created_at'] == $it['updated_at'])
                                <p></p>
                            @else
                                <p style="margin-top:-18px;">Tanggal Perubahan :
                                    <?= date('d-m-Y', strtotime($it['updated_at'])) ?>
                                </p>
                            @endif
                            @if ($it['menabung'] == null)
                                <p style="margin-top:-18px;">Penarikan : <?= 'Rp ' . number_format($it['penarikan'], 2,
                                    ',', '.') ?></p>
                            @else
                                <p style="margin-top:-18px;">Menabung : <?= 'Rp ' . number_format($it['menabung'], 2,
                                    ',', '.') ?>
                                </p>
                            @endif
                            @if ($it->catatan !== null)
                                <p style="margin-top:-18px;">Catatan : </p>
                                <p style="margin-top:-18px;"><?= $it['catatan'] ?></p>
                            @endif
                        </div>

                    </div>
                    <hr style="background-color: white; margin-top:-10px;">
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
@endsection
