<?php
$usia = null;
$fase = null;
$tahun = null;
$semester = null;
$kurikulum = null;
$tanggal_raport = date('d F Y');
if ($raport_awal !== 0) {
    $usia = $raport_awal->usia;
    $fase = $raport_awal->fase;
    $tahun = $raport_awal->tahun;
    $semester = $raport_awal->semester;
    $kurikulum = $raport_awal->kurikulum;
    $tanggal_raport = $raport_awal->tanggal_raport;
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
            <div class="col-lg-8 mb-3">
                <a href="/siswa/format_raport"
                    class="btn btn-icon-split {{ Request::is('siswa/format_raport') ? 'bg-secondary' : 'bg-info' }}">

                    <span class="text text-white {{ Request::is('siswa/format_raport') ? 'bg-secondary' : 'bg-info' }}">Nilai
                        1</span>
                </a>
                <a href="/siswa/format_raport2"
                    class="btn btn-icon-split {{ Request::is('siswa/format_raport2') ? 'bg-secondary' : 'bg-info' }}">

                    <span
                        class="text text-white {{ Request::is('siswa/format_raport2') ? 'bg-secondary' : 'bg-info' }}">Nilai
                        2</span>
                </a>
                <a href="/siswa/format_raport3"
                    class="btn btn-icon-split {{ Request::is('siswa/format_raport3') ? 'bg-secondary' : 'bg-info' }}">

                    <span
                        class="text text-white {{ Request::is('siswa/format_raport3') ? 'bg-secondary' : 'bg-info' }}">Nilai
                        3</span>
                </a>
                <a href="/siswa/format_raport4"
                    class="btn btn-icon-split {{ Request::is('siswa/format_raport4') ? 'bg-secondary' : 'bg-info' }}">

                    <span
                        class="text text-white {{ Request::is('siswa/format_raport4') ? 'bg-secondary' : 'bg-info' }}">Nilai
                        4</span>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Format Raport</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <div class="row text-hp">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-4">
                                                <p>Usia<span style="position: absolute; right:0;">:</span></p>
                                            </div>
                                            <div class="col-8">
                                                <p>{{ $usia }}</p>
                                                <hr class="garis-sekolah">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p>Fase<span style="position: absolute; right:0;">:</span></p>
                                            </div>
                                            <div class="col-8">
                                                <p>{{ $fase }}</p>
                                                <hr class="garis-sekolah">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p>Semester<span style="position: absolute; right:0;">:</span></p>
                                            </div>
                                            <div class="col-8">
                                                <p>{{ $semester }}</p>
                                                <hr class="garis-sekolah">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p>Tahun Ajaran<span style="position: absolute; right:0;">:</span></p>
                                            </div>
                                            <div class="col-8">
                                                <p>{{ $tahun }}</p>
                                                <hr class="garis-sekolah">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p>Kurikulum<span style="position: absolute; right:0;">:</span></p>
                                            </div>
                                            <div class="col-8">
                                                <p>{{ $kurikulum }}</p>
                                                <hr class="garis-sekolah">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p>Tanggal Raport<span style="position: absolute; right:0;">:</span></p>
                                            </div>
                                            <div class="col-8">
                                                <p>{{ date('d F Y', strtotime($tanggal_raport)) }}</p>
                                                <hr class="garis-sekolah">
                                            </div>
                                        </div>
                                        <div class="row" style="justify-content: right;">
                                            <div class="col-md-4">

                                            </div>
                                            <div class="col-md-8 mb-3">
                                                <a data-toggle="modal" data-target="#raport_awal"
                                                    class="btn btn-secondary btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-recycle"></i>
                                                    </span>
                                                    <span class="text">Ubah</span>
                                                </a>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="row justify-content-center">
                                            <p>Capaian Pembelajaran</p>
                                        </div>
                                        <?php foreach ($raport_capaian as $a) : ?>
                                        <div class="row">
                                            <div class="mb-2 text-center col-md-12">
                                                <a href="/siswa/format_raport/{{ $a->id }}" style="width: 100%;"
                                                    class="btn btn-secondary">
                                                    <span class="text"><?= $a['capaian'] ?></span>
                                                </a>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>








    <!-- End of Main Content -->


    <!-- Modal Ubah Data -->
    <div class="modal fade" id="raport_awal" tabindex="-1" role="dialog" aria-labelledby="raport_awalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header mb-3">
                    <h5 class="modal-title" id="raport_awalLabel">Ubah Raport</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/siswa/format_raport/awal" method="POST">
                    @csrf
                    <div class="container">
                        <div class="form-group row">
                            <label for="sekolah" class="col-sm-2 col-form-label">Usia</label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="idtendik" name="idtendik"
                                    value="{{ $iduser }}">
                                <input type="text" class="form-control" id="usia" name="usia"
                                    value="{{ $usia }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Fase</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fase" name="fase"
                                    value="{{ $fase }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desa" class="col-sm-2 col-form-label">Semester</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="semester" name="semester"
                                    value="{{ $semester }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kecamatan" class="col-sm-2 col-form-label">Tahun</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="tahun" name="tahun"
                                    value="{{ $tahun }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kabupaten" class="col-sm-2 col-form-label">Kurikulum</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kurikulum" name="kurikulum"
                                    value="{{ $kurikulum }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl" class="col-sm-2 col-form-label">Tanggal Raport</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tgl" name="tgl"
                                    value="{{ $tanggal_raport }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- End of Main Content -->
@endsection
