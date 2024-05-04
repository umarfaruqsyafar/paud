<?php
function cek_indikator($idsiswa, $indikator)
{
    $query = DB::select('SELECT * FROM raport_indikator_siswas WHERE siswa_id = ' . $idsiswa . ' AND indikator = "' . $indikator . '"');
    if (count($query) > 0) {
        return 'checked';
    } else {
        return '';
    }
}
if (count($nilai_siswa_fix) < 1) {
    $image1 = '/img/app/image.png';
    $image2 = '/img/app/image.png';
    $dataimage1 = null;
    $dataimage2 = null;
} else {
    $dataimage1 = $nilai_siswa_fix[0]->image1;
    $dataimage2 = $nilai_siswa_fix[0]->image2;
    if ($nilai_siswa_fix[0]->image1 == null and $nilai_siswa_fix[0]->image2 == null) {
        $image1 = '/img/app/image.png';
        $image2 = '/img/app/image.png';
    } elseif ($nilai_siswa_fix[0]->image1 == null) {
        $image1 = '/img/app/image.png';
        $image2 = asset('storage/' . $nilai_siswa_fix[0]->image2);
    } elseif ($nilai_siswa_fix[0]->image2 == null) {
        $image2 = '/img/app/image.png';
        $image1 = asset('storage/' . $nilai_siswa_fix[0]->image1);
    } else {
        $image1 = asset('storage/' . $nilai_siswa_fix[0]->image1);
        $image2 = asset('storage/' . $nilai_siswa_fix[0]->image2);
        # code...
    }
}

function kemunculan_ya($idsiswa, $idtujuan)
{
    $query = DB::select('SELECT * FROM raport_kemunculans WHERE siswa_id = ' . $idsiswa . ' AND tujuan_id =' . $idtujuan);
    if (count($query) > 0) {
        if ($query[0]->ya == 1) {
            return 'checked';
        } else {
            return '';
        }
    } else {
        return '';
    }
}

function kemunculan_tidak($idsiswa, $idtujuan)
{
    $query = DB::select('SELECT * FROM raport_kemunculans WHERE siswa_id = ' . $idsiswa . ' AND tujuan_id =' . $idtujuan);
    if (count($query) > 0) {
        if ($query[0]->tidak == 1) {
            return 'checked';
        } else {
            return '';
        }
    } else {
        return '';
    }
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
            <div class="col-lg-8 mb-2">
                <a href="/siswa/raport/{{ $siswa->id }}/1"
                    class="btn btn-icon-split {{ Request::is('siswa/raport/*') ? 'bg-secondary' : 'bg-info' }}">
                    <span class="text text-white {{ Request::is('siswa/raport/*') ? 'bg-secondary' : 'bg-info' }}">Nilai
                        1</span>
                </a>
                <a href="/siswa/raport2/{{ $siswa->id }}/1"
                    class="btn btn-icon-split {{ Request::is('siswa/raport2*') ? 'bg-secondary' : 'bg-info' }}">
                    <span class="text text-white {{ Request::is('siswa/raport2*') ? 'bg-secondary' : 'bg-info' }}">Nilai
                        2</span>
                </a>
                <a href="/siswa/raport3/{{ $siswa->id }}"
                    class="btn btn-icon-split {{ Request::is('siswa/raport3*') ? 'bg-secondary' : 'bg-info' }}">
                    <span class="text text-white {{ Request::is('siswa/raport3*') ? 'bg-secondary' : 'bg-info' }}">Nilai
                        3</span>
                </a>
                <a href="/siswa/raport4/{{ $siswa->id }}"
                    class="btn btn-icon-split {{ Request::is('siswa/raport4*') ? 'bg-secondary' : 'bg-info' }}">
                    <span class="text text-white {{ Request::is('siswa/raport4*') ? 'bg-secondary' : 'bg-info' }}">Nilai
                        4</span>
                </a>


            </div>
            <div class="col-lg-4 text-align-hp mb-3">
                <a class="btn btn-info btn-icon-split" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="text">Pilih Capaian</span>
                    <span class="icon text-white-50">
                        <i class="fas fa-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-center" aria-labelledby="userDropdown">

                    @foreach ($capaian as $c)
                        <a class="dropdown-item" href="/siswa/raport/{{ $siswa->id }}/{{ $c->id }}">
                            Capaian {{ $c->id }}
                        </a>
                    @endforeach
                </div>
                <a class="btn btn-info btn-icon-split">
                    <span class="text">Capaian {{ $capaian_aktif->id }}</span>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><?= $capaian_aktif['capaian'] ?></h6>
                    </div>
                    <div class="card-body side-com">
                        <div class="col-lg-12 mb-2">
                            <div class="row" style="justify-content: end;">
                                <div>
                                    <a data-toggle="modal" data-target="#nilai" class="btn btn-info tombol-tambah">
                                        <span class="icon text-white">
                                            <i class="fas fa-pen mr-2"></i>
                                        </span>
                                        <span class="text text-white">Nilai</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" cellspacing="0">
                                <thead class="text-center">
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th style="width: 30%;">Tujuan Pembelajaran</th>
                                        <th style="width: 16%;">Nilai</th>
                                        <th style="width: 29%;">Indikator</th>
                                        <th style="width: 20%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $a = 1; ?>
                                    <?php foreach ($nilai_siswa as $t) : ?>
                                    <tr>
                                        <td class="text-center"><?= $a ?></td>
                                        <td><?= $t['tujuan'] ?></td>
                                        <td class="text-center"><?= $t['skor'] ?></td>
                                        <td>
                                            <?php foreach ($indikator_siswa as $res) : ?>
                                            <?php if($res->nilai_id == $t->id) : ?>
                                            <li><?= $res['indikator'] ?></li>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </td>
                                        <td style="vertical-align: top;" class="text-center">
                                            <button data-toggle="modal" data-target="#plus_indikator<?= $t['id'] ?>"
                                                class="btn btn-circle btn-sm btn-secondary tombol-plus nilai_indikator"
                                                data-idnilai="<?= $t['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>">
                                                <span class="icon text-white">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                            </button>
                                            <button data-toggle="modal" data-target="#hapusnilai<?= $t['id'] ?>"
                                                class="btn btn-circle btn-sm btn-secondary tombol-min">
                                                <span class="icon text-white">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </button>
                                            <div class="modal fade" id="hapusnilai<?= $t['id'] ?>" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" style="color: gray;">Hapus Nilai</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="/siswa/raport/hapus_nilai" method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12">
                                                                        <input type="hidden" id="idcapaian"
                                                                            name="idcapaian"
                                                                            value="{{ $capaian_aktif->id }}">
                                                                        <input type="hidden" id="idsiswa" name="idsiswa"
                                                                            value="{{ $siswa->id }}">
                                                                        <input type="hidden" id="idnilai"
                                                                            name="idnilai" value="<?= $t['id'] ?>">
                                                                        <p style="color: gray; text-align:left;">Yakin
                                                                            ingin
                                                                            menghapus nilai "{{ $t->tujuan }}" ? </p>
                                                                    </div>
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
                                    </tr>
                                    <!-- Modal Ubah Data -->
                                    <div class="modal fade" id="plus_indikator<?= $t['id'] ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="plus_indikatorLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="plus_indikatorLabel">Tambah Indikator</h5>
                                                    <a href="" type="button" class="close" id="close"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </a>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($indikator as $s) : ?>
                                                        <?php if($s->raport_tujuan_id == $t->tujuan_id) : ?>
                                                        <div class="form-group row m-0">
                                                            <div class="col-sm-11 m-0">
                                                                <input style="margin-top: 13px;" type="checkbox"
                                                                    class="form-check-input nilaiIndikator"
                                                                    data-idnilai="{{ $t->id }}"
                                                                    data-indikator="<?= $s['indikator'] ?>"
                                                                    data-idsiswa="{{ $siswa->id }}"
                                                                    {{ cek_indikator($siswa->id, $s->indikator) }}>
                                                                <label for="sekolah"
                                                                    class="col-form-label"><?= $i . '. ' . $s['indikator'] ?></label>
                                                            </div>

                                                        </div>
                                                        <?php endif; ?>
                                                        <?php $i++; ?>
                                                        <?php endforeach; ?>
                                                        <div class="modal-footer">
                                                            <a href="/siswa/raport/{{ $siswa->id }}/{{ $capaian_aktif->id }}"
                                                                type="button" class="btn btn-secondary">Tutup</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $a++; ?>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th colspan="3" style="width: 100%;">
                                            <?= $capaian_aktif['capaian'] ?>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3">
                                            <form action="/siswa/raport/nilai1_fix" method="POST">
                                                @csrf
                                                <input type="hidden" id="idsiswa" name="idsiswa"
                                                    value="{{ $siswa->id }}">
                                                <input type="hidden" id="idcapaian" name="idcapaian"
                                                    value="{{ $capaian_aktif->id }}">
                                                @if (count($nilai_siswa_fix) < 1)
                                                    <textarea class="form-control mb-1" id="deskripsi" name="deskripsi" style="resize:vertical; text-align: left;"><?php foreach ($nilai_siswa as $ns) : ?><?= '* ' . $siswa['panggilan'] . ' ' . $ns['nilai'] ?><?php foreach ($indikator as $s) : ?><?php if($s->raport_tujuan_id == $t->tujuan_id) : ?><?= $s['indikator'] . ', ' ?><?php endif; ?><?php endforeach; ?><?= $ns['nilai2'] . '.' . PHP_EOL ?><?php endforeach; ?>
                                                    </textarea>
                                                @else
                                                    <textarea class="form-control mb-1" id="deskripsi" name="deskripsi" style="resize:vertical; text-align: left;">{{ $nilai_siswa_fix[0]->deskripsi }}
                                                    </textarea>
                                                @endif

                                                <div class="mb-1 mt-2">
                                                    <button type="submit" class="btn btn-info tombol-tambah"
                                                        style="width: 100%;">
                                                        <span class="text text-white">SIMPAN PERUBAHAN</span>
                                                    </button>
                                                </div>
                                            </form>

                                            <div class="mt-2 mb-2 row justify-content-center"
                                                style="border-radius: 10px; margin-left:1px; margin-right:1px;">
                                                <div class="gb" data-toggle="modal" data-target="#hapusfoto1"><img
                                                        class="gb-raport" src="{{ $image1 }}"></div>
                                                <div class="gb" data-toggle="modal" data-target="#hapusfoto2"><img
                                                        class="gb-raport" src="{{ $image2 }}"></div>

                                            </div>
                                            <div class="mb-2">
                                                <a data-toggle="modal" data-target="#cp1"
                                                    class="btn btn-info tombol-tambah" style="width: 100%;">
                                                    <span class="text text-white">TAMBAH FOTO</span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered" cellspacing="0">
                                <thead class="text-center">
                                    <tr>
                                        <th style="vertical-align: middle;" rowspan="2" style="width: 6%;">No
                                        </th>
                                        <th style="vertical-align: middle;" rowspan="2" style="width: 70%;">
                                            Tujuan Pembelajaran</th>
                                        <th colspan="2" style="width: 20%;">Kemunculan</th>
                                    </tr>
                                    <tr>
                                        <th style="width: 10%;">Ya</th>
                                        <th style="width: 10%;">Tidak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($tujuan as $s) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i ?></td>
                                        <td><?= $s['tujuan'] ?></td>
                                        <td class="text-center">
                                            <input type="checkbox" class="form-check-input cektujuan datakemunculan"
                                                data-muncul="ya" data-idtujuan="<?= $s['id'] ?>"
                                                data-idsiswa="<?= $siswa['id'] ?>"
                                                {{ kemunculan_ya($siswa->id, $s->id) }}>
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" class="form-check-input cektujuan datakemunculan"
                                                data-muncul="tidak" data-idtujuan="<?= $s['id'] ?>"
                                                data-idsiswa="<?= $siswa['id'] ?>"
                                                {{ kemunculan_tidak($siswa->id, $s->id) }}>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="card-body side-hp text-hp">
                        <div class="col-lg-12 mb-2">
                            <div class="row" style="justify-content: end;">
                                <div>
                                    <a data-toggle="modal" data-target="#nilai"
                                        class="btn btn-sm btn-info tombol-tambah">
                                        <span class="icon text-white">
                                            <i class="fas fa-pen mr-2"></i>
                                        </span>
                                        <span class="text text-white">Nilai</span>
                                    </a>
                                </div>
                            </div>
                        </div>


                        <?php $a = 1; ?>
                        <?php foreach ($nilai_siswa as $t) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; position:relative;">
                            <div style="width:10vw;">
                                <div><?= $a ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p>Tujuan Pembelajaran : </p>
                                <p style="margin-top: -18px;"><?= $t['tujuan'] ?></p>
                                <p style="margin-top: -18px;">Nilai : <?= $t['skor'] ?></p>
                                <p style="margin-top: -18px;">Indikator : </p>
                                <?php foreach ($indikator_siswa as $res) : ?>
                                <?php if($res->nilai_id == $t->id) : ?>
                                <p style="margin-top: -18px;"><?= $res['indikator'] ?></p>
                                <?php endif; ?>
                                <?php endforeach; ?>

                            </div>
                            <div class="btnMenuSiswa" style="width:10vw; display: flex; justify-content:right;"
                                id="btnMenuSiswa" data-idsiswa="<?= $t['id'] ?>">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>
                            <div class="menuSiswaD"
                                style="display:none; width:30vw; position:absolute; right:0; top:0; z-index: 9; background-color:white;"
                                id="menuSiswaD<?= $t['id'] ?>">
                                <div class="shadow" style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                    <a class="dropdown-item text-hp nilai_indikator" data-toggle="modal"
                                    data-target="#plus_indikatorhp<?= $t['id'] ?>" data-idnilai="<?= $t['id'] ?>"
                                    data-idsiswa="<?= $siswa['id'] ?>">
                                        Indikator
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-hp" data-toggle="modal"
                                    data-target="#hapusnilaihp<?= $t['id'] ?>">
                                        Hapus
                                    </a>

                                </div>
                            </div>

                        </div>
                        <div class="modal fade" id="hapusnilaihp<?= $t['id'] ?>" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" style="color: gray;">Hapus Nilai</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/siswa/raport/hapus_nilai" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="hidden" id="idcapaian" name="idcapaian"
                                                        value="{{ $capaian_aktif->id }}">
                                                    <input type="hidden" id="idsiswa" name="idsiswa"
                                                        value="{{ $siswa->id }}">
                                                    <input type="hidden" id="idnilai" name="idnilai"
                                                        value="<?= $t['id'] ?>">
                                                    <p style="color: gray; text-align:left;">Yakin ingin
                                                        menghapus nilai "{{ $t->tujuan }}" ? </p>
                                                </div>
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
                        <div class="modal fade" id="plus_indikatorhp<?= $t['id'] ?>" tabindex="-1" role="dialog"
                            aria-labelledby="plus_indikatorLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="plus_indikatorLabel">Tambah Indikator</h5>
                                        <a href="" type="button" class="close" id="close"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </a>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <?php $i = 1; ?>
                                            <?php foreach ($indikator as $s) : ?>
                                            <?php if($s->raport_tujuan_id == $t->tujuan_id) : ?>
                                            <div class="form-group row m-0">
                                                <div class="col-sm-11 m-0">
                                                    <input style="margin-top: 13px;" type="checkbox"
                                                        class="form-check-input nilaiIndikator"
                                                        data-idnilai="{{ $t->id }}"
                                                        data-indikator="<?= $s['indikator'] ?>"
                                                        data-idsiswa="{{ $siswa->id }}"
                                                        {{ cek_indikator($siswa->id, $s->indikator) }}>
                                                    <label for="sekolah"
                                                        class="col-form-label"><?= $i . '. ' . $s['indikator'] ?></label>
                                                </div>

                                            </div>
                                            <?php endif; ?>
                                            <?php $i++; ?>
                                            <?php endforeach; ?>
                                            <div class="modal-footer">
                                                <a href="/siswa/raport/{{ $siswa->id }}/{{ $capaian_aktif->id }}"
                                                    type="button" class="btn btn-secondary">Tutup</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="margin-top:-10px;">

                        <?php $a++; ?>
                        <?php endforeach; ?>


                        <h6 class="text-center text-hp" style="margin-top: 30px"><?= $capaian_aktif['capaian'] ?>
                        </h6>
                        <tr>
                            <td colspan="3">
                                <form action="/siswa/raport/nilai1_fix" method="POST">
                                    @csrf
                                    <input type="hidden" id="idsiswa" name="idsiswa" value="{{ $siswa->id }}">
                                    <input type="hidden" id="idcapaian" name="idcapaian"
                                        value="{{ $capaian_aktif->id }}">
                                    @if (count($nilai_siswa_fix) < 1)
                                        <textarea class="form-control mb-1 text-hp" id="deskripsi" name="deskripsi"
                                            style="resize:vertical; text-align: left;"><?php foreach ($nilai_siswa as $ns) : ?><?= '* ' . $siswa['panggilan'] . ' ' . $ns['nilai'] ?><?php foreach ($indikator as $s) : ?><?php if($s->raport_tujuan_id == $t->tujuan_id) : ?><?= $s['indikator'] . ', ' ?><?php endif; ?><?php endforeach; ?><?= $ns['nilai2'] . '.' . PHP_EOL ?><?php endforeach; ?>
                                </textarea>
                                    @else
                                        <textarea class="form-control mb-1 text-hp" id="deskripsi" name="deskripsi"
                                            style="resize:vertical; text-align: left;">{{ $nilai_siswa_fix[0]->deskripsi }}
                                </textarea>
                                    @endif

                                    <div class="mb-1 mt-2">
                                        <button type="submit" class="btn btn-sm btn-info tombol-tambah" style="width: 100%;">
                                            <span class="text text-hp">SIMPAN PERUBAHAN</span>
                                        </button>
                                    </div>
                                </form>

                                <div class="mt-2 mb-2 row justify-content-center"
                                    style="border-radius: 10px; margin-left:1px; margin-right:1px;">
                                    <div class="gb" data-toggle="modal" data-target="#hapusfoto1"><img
                                            class="gb-raport" src="{{ $image1 }}"></div>
                                    <div class="gb" data-toggle="modal" data-target="#hapusfoto2"><img
                                            class="gb-raport" src="{{ $image2 }}"></div>

                                </div>
                                <div class="mb-2">
                                    <a data-toggle="modal" data-target="#cp1" class="btn btn-sm btn-info tombol-tambah"
                                        style="width: 100%;">
                                        <span class="text text-white">TAMBAH FOTO</span>
                                    </a>
                                </div>
                            </td>
                        </tr>


                        <div style="margin-top: 30px;"></div>
                        <?php $a = 1; ?>
                        <?php foreach ($tujuan as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative; z-index:3;">
                            <div style="width:10vw;">
                                <div><?= $a ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p>Tujuan Pembelajaran : </p>
                                <p style="margin-top: -16px;"><?= $s['tujuan'] ?></p>
                                <p style="margin-top: -16px;">Kemunculan : </p>
                            </div>

                        </div>
                        <div
                            style="width:80vw; margin-left:9vw; margin-top: -15px; position:relative; z-index:99;">
                            <div>
                                <div class="mr-2 ml-2" style="display: inline;">
                                    <input type="checkbox" id="ya" name="ya"
                                        class="form-check-input cektujuan datakemunculan" data-muncul="ya"
                                        data-idtujuan="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                        {{ kemunculan_ya($siswa->id, $s->id) }}>
                                    <label for="ya" class="mr-2" style="margin-left:16px;">Ya</label>
                                </div>

                                <div class="mr-2 ml-2" style="display: inline;">
                                    <input type="checkbox" class="form-check-input cektujuan datakemunculan"
                                        id="tidak" name="tidak" data-muncul="tidak"
                                        data-idtujuan="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                        {{ kemunculan_tidak($siswa->id, $s->id) }}>
                                    <label for="tidak" class="mr-2" style="margin-left:16px; ">Tidak</label>
                                </div>
                            </div>

                        </div>

                        <hr style=" margin-top: -8px;">

                        <?php $a++; ?>
                        <?php endforeach; ?>

                    </div>

                </div>
            </div>
        </div>
    </div>





    <!-- End of Main Content -->


    <div class="modal fade" id="nilai" tabindex="-1" role="dialog" aria-labelledby="nilaiLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nilaiLabel">Penilaian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/siswa/raport/nilai1" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="idsiswa" name="idsiswa" value="{{ $siswa->id }}">
                        <input type="hidden" id="idcapaian" name="idcapaian" value="{{ $capaian_aktif->id }}">
                        <div class="mb-3">
                            <select id="idtujuan" name="idtujuan" class="form-control" required>
                                <option value="">Tujuan Pembelajaran</option>
                                <?php foreach ($tujuan as $t) : ?>
                                <option value="<?= $t['id'] ?>"><?= $t['tujuan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select id="skor" name="skor" class="form-control" required>
                                <option value="">Nilai</option>
                                <option value="sm">Sudah Mampu</option>
                                <option value="mm">Mulai Mampu</option>
                                <option value="pd">Perlu Ditingkatkan</option>
                            </select>
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

    <!-- Modal Tambah Foto 1 -->
    <div class="modal fade" id="cp1" tabindex="-1" role="dialog" aria-labelledby="cp1Label"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header mb-3">
                    <h5 class="modal-title" id="cp1Label">Tambah Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/siswa/raport/dokumentasi" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <input type="hidden" class="form-control" id="idsiswa" name="idsiswa"
                            value="<?= $siswa['id'] ?>">
                        <input type="hidden" class="form-control" id="idcapaian" name="idcapaian"
                            value="<?= $capaian_aktif['id'] ?>">

                        <div class="form-group row">
                            <label for="kode_pos" class="col-sm-2 col-form-label">Picture</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image"
                                                name="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Lihat Foto -->
    <div class="modal fade" id="hapusfoto1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="gambar-modal modal-body">
                    <img class="modified-gambar1" src="{{ $image1 }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <a href="/siswa/raport/{{ $siswa->id }}/{{ $capaian_aktif->id }}/dokumentasi/hapus?idsiswa={{ $siswa->id }}&idcapaian={{ $capaian_aktif->id }}&image={{ $dataimage1 }}&idgambar=1"
                        class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hapusfoto2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="gambar-modal modal-body">
                    <img class="modified-gambar1" src="{{ $image2 }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <a href="/siswa/raport/{{ $siswa->id }}/{{ $capaian_aktif->id }}/dokumentasi/hapus?idsiswa={{ $siswa->id }}&idcapaian={{ $capaian_aktif->id }}&image={{ $dataimage2 }}&idgambar=2"
                        class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        const nilaiIndikator = document.querySelectorAll(".nilaiIndikator");
        nilaiIndikator.forEach(function(button) {
            button.addEventListener("click", function() {
                // Dapatkan data ID siswa dari atribut data
                var idsiswa = this.getAttribute("data-idsiswa");
                var idnilai = this.getAttribute("data-idnilai");
                var indikator = this.getAttribute("data-indikator");
                fetch('/siswa/raport/nilai_indikator?idsiswa=' + idsiswa + '&idnilai=' + idnilai +
                    '&indikator=' + indikator);
            });
        });
    </script>
    <script>
        const datakemunculan = document.querySelectorAll(".datakemunculan");
        datakemunculan.forEach(function(button) {
            button.addEventListener("click", function() {
                // Dapatkan data ID siswa dari atribut data
                var idsiswa = this.getAttribute("data-idsiswa");
                var idtujuan = this.getAttribute("data-idtujuan");
                var muncul = this.getAttribute("data-muncul");
                fetch('/siswa/raport/nilai_kemunculan?idsiswa=' + idsiswa + '&idtujuan=' + idtujuan +
                    '&muncul=' + muncul);
            });
        });
    </script>
@endsection
