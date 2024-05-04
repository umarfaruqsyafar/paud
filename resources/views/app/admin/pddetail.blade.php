<?php
$lahir = $siswa->lahir;
$lahir1 = new DateTime($lahir);
$today = new DateTime('today');

$umur = $today->diff($lahir1)->y;
$bulan = $today->diff($lahir1)->m;
?>
@extends('app.layouts.main')

@section('container')
    <!-- Begin Page Content -->

    <div class="container-fluid">

        <div>
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-capitalize">Data <?= $siswa['nama'] ?></h6>
                </div>
                <div class="card-body">
                    <div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-4 ml-4 mt-3">
                                        <p class="text-siswa-detail">Nama</p>
                                    </div>
                                    <div class="col-1 mt-3">
                                        <p class="text-siswa-detail">:</p>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <p class="text-siswa-detail"><?= $siswa['nama'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ml-4">
                                        <p class="text-siswa-detail">Panggilan</p>
                                    </div>
                                    <div class="col-1">
                                        <p class="text-siswa-detail">:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-siswa-detail"><?= $siswa['panggilan'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ml-4">
                                        <p class="text-siswa-detail">Jenis Kelamin</p>
                                    </div>
                                    <div class="col-1">
                                        <p class="text-siswa-detail">:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-siswa-detail"><?= $siswa['jk'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ml-4">
                                        <p class="text-siswa-detail">NIK</p>
                                    </div>
                                    <div class="col-1">
                                        <p class="text-siswa-detail">:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-siswa-detail"><?= $siswa['nik'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ml-4">
                                        <p class="text-siswa-detail">NIS</p>
                                    </div>
                                    <div class="col-1">
                                        <p class="text-siswa-detail">:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-siswa-detail"><?= $siswa['nis'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ml-4">
                                        <p class="text-siswa-detail">NISN</p>
                                    </div>
                                    <div class="col-1">
                                        <p class="text-siswa-detail">:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-siswa-detail"><?= $siswa['nisn'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ml-4">
                                        <p class="text-siswa-detail">Anak ke</p>
                                    </div>
                                    <div class="col-1">
                                        <p class="text-siswa-detail">:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-siswa-detail"><?= $siswa['anak_ke'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ml-4">
                                        <p class="text-siswa-detail">TTL</p>
                                    </div>
                                    <div class="col-1">
                                        <p class="text-siswa-detail">:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-siswa-detail"><?= $siswa['tempat'] ?>, <?= date('d-m-Y', strtotime($siswa['lahir'])) ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ml-4">
                                        <p class="text-siswa-detail">Alamat</p>
                                    </div>
                                    <div class="col-1">
                                        <p class="text-siswa-detail">:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-siswa-detail"><?= $siswa['alamat'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ml-4">
                                        <p class="text-siswa-detail">Desa</p>
                                    </div>
                                    <div class="col-1">
                                        <p class="text-siswa-detail">:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-siswa-detail"><?= $siswa['desa'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ml-4">
                                        <p class="text-siswa-detail">Kecamatan</p>
                                    </div>
                                    <div class="col-1">
                                        <p class="text-siswa-detail">:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-siswa-detail"><?= $siswa['kecamatan'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ml-4">
                                        <p class="text-siswa-detail">Kabupaten</p>
                                    </div>
                                    <div class="col-1">
                                        <p class="text-siswa-detail">:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-siswa-detail"><?= $siswa['kabupaten'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ml-4">
                                        <p class="text-siswa-detail">Provinsi</p>
                                    </div>
                                    <div class="col-1">
                                        <p class="text-siswa-detail">:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-siswa-detail"><?= $siswa['provinsi'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ml-4">
                                        <p class="text-siswa-detail">Umur</p>
                                    </div>
                                    <div class="col-1">
                                        <p class="text-siswa-detail">:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-siswa-detail"><?= $umur ?> tahun <?= $bulan ?> bulan</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-4 ml-4 mt-3">
                                        <p class="text-siswa-detail">Nama Ibu</p>
                                    </div>
                                    <div class="col-1 mt-3">
                                        <p class="text-siswa-detail">:</p>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <p class="text-siswa-detail"><?= $siswa['nama_ibu'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ml-4">
                                        <p class="text-siswa-detail">Pendidikan Ibu</p>
                                    </div>
                                    <div class="col-1 ">
                                        <p class="text-siswa-detail">:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-siswa-detail"><?= $siswa['pdd_ibu'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ml-4">
                                        <p class="text-siswa-detail">Pekerjaan Ibu</p>
                                    </div>
                                    <div class="col-1">
                                        <p class="text-siswa-detail">:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-siswa-detail"><?= $siswa['pekerjaan_ibu'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ml-4">
                                        <p class="text-siswa-detail">Agama Ibu</p>
                                    </div>
                                    <div class="col-1">
                                        <p class="text-siswa-detail">:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-siswa-detail"><?= $siswa['agama_ibu'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ml-4">
                                        <p class="text-siswa-detail">No.Hp Ibu</p>
                                    </div>
                                    <div class="col-1">
                                        <p class="text-siswa-detail">:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-siswa-detail"><?= $siswa['no_ibu'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ml-4">
                                        <p class="text-siswa-detail">Nama Ayah</p>
                                    </div>
                                    <div class="col-1">
                                        <p class="text-siswa-detail">:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-siswa-detail"><?= $siswa['nama_ayah'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ml-4">
                                        <p class="text-siswa-detail">Pendidikan Ayah</p>
                                    </div>
                                    <div class="col-1">
                                        <p class="text-siswa-detail">:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-siswa-detail"><?= $siswa['pdd_ayah'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ml-4">
                                        <p class="text-siswa-detail">Pekerjaan Ayah</p>
                                    </div>
                                    <div class="col-1">
                                        <p class="text-siswa-detail">:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-siswa-detail"><?= $siswa['pekerjaan_ayah'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ml-4">
                                        <p class="text-siswa-detail">Agama Ayah</p>
                                    </div>
                                    <div class="col-1">
                                        <p class="text-siswa-detail">:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-siswa-detail"><?= $siswa['agama_ayah'] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 ml-4">
                                        <p class="text-siswa-detail">No.Hp Ayah</p>
                                    </div>
                                    <div class="col-1">
                                        <p class="text-siswa-detail">:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-siswa-detail"><?= $siswa['no_ayah'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
