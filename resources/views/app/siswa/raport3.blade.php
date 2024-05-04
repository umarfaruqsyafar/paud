<?php
function check_pilar($idsiswa, $idpilar, $nilai)
{
    $cek = DB::select('SELECT * FROM raport_pilar_siswas WHERE siswa_id = ' . $idsiswa . ' AND pilar_id = ' . $idpilar . ' AND nilai = "' . $nilai . '"');
    if ($cek == null) {
        return ' ';
    } else {
        return 'checked';
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
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Laporan Penilaian 9 Pilar Karakter dan K4</h6>
                    </div>
                    <div class="card-body side-com">
                        <h6><b>Pilar 1. Cinta Tuhan dan Segenap CiptaanNya</b></h6>
                        <div class="table-responsive">
                            <table class="table table-bordered" cellspacing="0">
                                <thead class="text-center">
                                    <tr class="text-center">
                                        <th rowspan="2" style="vertical-align: middle; width: 10%;">No
                                        </th>
                                        <th rowspan="2" style="vertical-align: middle;">Bidang
                                            Pengembangan
                                            Karakter</th>
                                        <th colspan="4" style="vertical-align: middle; width: 30%;">
                                            Semester 1
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="vertical-align: middle;">BM</th>
                                        <th style="vertical-align: middle;">KM</th>
                                        <th style="vertical-align: middle;">SM</th>
                                        <th style="vertical-align: middle;">K</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pilar1 as $s) : ?>
                                    <tr>
                                        <td style="vertical-align: middle;" class="text-center"><?= $i ?>
                                        </td>
                                        <td style="vertical-align: middle;"><?= $s['keterangan'] ?></td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'bm') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="bm">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'km') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="km">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'sm') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="sm">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'k') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="k">
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <h6><b>Pilar 2. Mandiri, Disiplin, dan Tanggung Jawab</b></h6>
                        <div class="table-responsive">
                            <table class="table table-bordered" cellspacing="0">
                                <thead class="text-center">
                                    <tr class="text-center">
                                        <th rowspan="2" style="vertical-align: middle; width: 10%;">No
                                        </th>
                                        <th rowspan="2" style="vertical-align: middle;">Bidang
                                            Pengembangan
                                            Karakter</th>
                                        <th colspan="4" style="vertical-align: middle; width: 30%;">
                                            Semester 1
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="vertical-align: middle;">BM</th>
                                        <th style="vertical-align: middle;">KM</th>
                                        <th style="vertical-align: middle;">SM</th>
                                        <th style="vertical-align: middle;">K</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pilar2 as $s) : ?>
                                    <tr>
                                        <td style="vertical-align: middle;" class="text-center"><?= $i ?>
                                        </td>
                                        <td style="vertical-align: middle;"><?= $s['keterangan'] ?></td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'bm') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="bm">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'km') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="km">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'sm') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="sm">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'k') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="k">
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <h6><b>Pilar 3. Jujur, Amanah, dan Berkata Bijak</b></h6>
                        <div class="table-responsive">
                            <table class="table table-bordered" cellspacing="0">
                                <thead class="text-center">
                                    <tr class="text-center">
                                        <th rowspan="2" style="vertical-align: middle; width: 10%;">No
                                        </th>
                                        <th rowspan="2" style="vertical-align: middle;">Bidang
                                            Pengembangan
                                            Karakter</th>
                                        <th colspan="4" style="vertical-align: middle; width: 30%;">
                                            Semester 1
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="vertical-align: middle;">BM</th>
                                        <th style="vertical-align: middle;">KM</th>
                                        <th style="vertical-align: middle;">SM</th>
                                        <th style="vertical-align: middle;">K</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pilar3 as $s) : ?>
                                    <tr>
                                        <td style="vertical-align: middle;" class="text-center"><?= $i ?>
                                        </td>
                                        <td style="vertical-align: middle;"><?= $s['keterangan'] ?></td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'bm') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="bm">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'km') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="km">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'sm') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="sm">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'k') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="k">
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <h6><b>Pilar 4. Hormat dan Santun</b></h6>
                        <div class="table-responsive">
                            <table class="table table-bordered" cellspacing="0">
                                <thead class="text-center">
                                    <tr class="text-center">
                                        <th rowspan="2" style="vertical-align: middle; width: 10%;">No
                                        </th>
                                        <th rowspan="2" style="vertical-align: middle;">Bidang
                                            Pengembangan
                                            Karakter</th>
                                        <th colspan="4" style="vertical-align: middle; width: 30%;">
                                            Semester 1
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="vertical-align: middle;">BM</th>
                                        <th style="vertical-align: middle;">KM</th>
                                        <th style="vertical-align: middle;">SM</th>
                                        <th style="vertical-align: middle;">K</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pilar4 as $s) : ?>
                                    <tr>
                                        <td style="vertical-align: middle;" class="text-center"><?= $i ?>
                                        </td>
                                        <td style="vertical-align: middle;"><?= $s['keterangan'] ?></td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'bm') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="bm">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'km') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="km">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'sm') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="sm">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'k') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="k">
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <h6><b>Pilar 5. Dermawan, Suka Menolong, dan Bekerja Sama</b></h6>
                        <div class="table-responsive">
                            <table class="table table-bordered" cellspacing="0">
                                <thead class="text-center">
                                    <tr class="text-center">
                                        <th rowspan="2" style="vertical-align: middle; width: 10%;">No
                                        </th>
                                        <th rowspan="2" style="vertical-align: middle;">Bidang
                                            Pengembangan
                                            Karakter</th>
                                        <th colspan="4" style="vertical-align: middle; width: 30%;">
                                            Semester 1
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="vertical-align: middle;">BM</th>
                                        <th style="vertical-align: middle;">KM</th>
                                        <th style="vertical-align: middle;">SM</th>
                                        <th style="vertical-align: middle;">K</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pilar5 as $s) : ?>
                                    <tr>
                                        <td style="vertical-align: middle;" class="text-center"><?= $i ?>
                                        </td>
                                        <td style="vertical-align: middle;"><?= $s['keterangan'] ?></td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'bm') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="bm">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'km') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="km">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'sm') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="sm">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'k') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="k">
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <h6><b>Pilar 6. Percaya Diri, Kreatif, dan Pantang Menyerah</b></h6>
                        <div class="table-responsive">
                            <table class="table table-bordered" cellspacing="0">
                                <thead class="text-center">
                                    <tr class="text-center">
                                        <th rowspan="2" style="vertical-align: middle; width: 10%;">No
                                        </th>
                                        <th rowspan="2" style="vertical-align: middle;">Bidang
                                            Pengembangan
                                            Karakter</th>
                                        <th colspan="4" style="vertical-align: middle; width: 30%;">
                                            Semester 1
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="vertical-align: middle;">BM</th>
                                        <th style="vertical-align: middle;">KM</th>
                                        <th style="vertical-align: middle;">SM</th>
                                        <th style="vertical-align: middle;">K</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pilar6 as $s) : ?>
                                    <tr>
                                        <td style="vertical-align: middle;" class="text-center"><?= $i ?>
                                        </td>
                                        <td style="vertical-align: middle;"><?= $s['keterangan'] ?></td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'bm') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="bm">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'km') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="km">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'sm') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="sm">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'k') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="k">
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <h6><b>Pilar 7. Pemimpin Yang Baik dan Adil</b></h6>
                        <div class="table-responsive">
                            <table class="table table-bordered" cellspacing="0">
                                <thead class="text-center">
                                    <tr class="text-center">
                                        <th rowspan="2" style="vertical-align: middle; width: 10%;">No
                                        </th>
                                        <th rowspan="2" style="vertical-align: middle;">Bidang
                                            Pengembangan
                                            Karakter</th>
                                        <th colspan="4" style="vertical-align: middle; width: 30%;">
                                            Semester 1
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="vertical-align: middle;">BM</th>
                                        <th style="vertical-align: middle;">KM</th>
                                        <th style="vertical-align: middle;">SM</th>
                                        <th style="vertical-align: middle;">K</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pilar7 as $s) : ?>
                                    <tr>
                                        <td style="vertical-align: middle;" class="text-center"><?= $i ?>
                                        </td>
                                        <td style="vertical-align: middle;"><?= $s['keterangan'] ?></td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'bm') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="bm">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'km') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="km">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'sm') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="sm">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'k') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="k">
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <h6><b>Pilar 8. Baik dan Rendah Hati</b></h6>
                        <div class="table-responsive">
                            <table class="table table-bordered" cellspacing="0">
                                <thead class="text-center">
                                    <tr class="text-center">
                                        <th rowspan="2" style="vertical-align: middle; width: 10%;">No
                                        </th>
                                        <th rowspan="2" style="vertical-align: middle;">Bidang
                                            Pengembangan
                                            Karakter</th>
                                        <th colspan="4" style="vertical-align: middle; width: 30%;">
                                            Semester 1
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="vertical-align: middle;">BM</th>
                                        <th style="vertical-align: middle;">KM</th>
                                        <th style="vertical-align: middle;">SM</th>
                                        <th style="vertical-align: middle;">K</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pilar8 as $s) : ?>
                                    <tr>
                                        <td style="vertical-align: middle;" class="text-center"><?= $i ?>
                                        </td>
                                        <td style="vertical-align: middle;"><?= $s['keterangan'] ?></td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'bm') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="bm">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'km') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="km">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'sm') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="sm">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'k') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="k">
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <h6><b>Pilar 9. Toleran, Cinta Damai, dan Bersatu</b></h6>
                        <div class="table-responsive">
                            <table class="table table-bordered" cellspacing="0">
                                <thead class="text-center">
                                    <tr class="text-center">
                                        <th rowspan="2" style="vertical-align: middle; width: 10%;">No
                                        </th>
                                        <th rowspan="2" style="vertical-align: middle;">Bidang
                                            Pengembangan
                                            Karakter</th>
                                        <th colspan="4" style="vertical-align: middle; width: 30%;">
                                            Semester 1
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="vertical-align: middle;">BM</th>
                                        <th style="vertical-align: middle;">KM</th>
                                        <th style="vertical-align: middle;">SM</th>
                                        <th style="vertical-align: middle;">K</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pilar9 as $s) : ?>
                                    <tr>
                                        <td style="vertical-align: middle;" class="text-center"><?= $i ?>
                                        </td>
                                        <td style="vertical-align: middle;"><?= $s['keterangan'] ?></td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'bm') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="bm">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'km') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="km">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'sm') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="sm">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'k') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="k">
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <h6><b>Kebersihan, Kerapian, Kesehatan, dan Keamanan</b></h6>
                        <div class="table-responsive">
                            <table class="table table-bordered" cellspacing="0">
                                <thead class="text-center">
                                    <tr class="text-center">
                                        <th rowspan="2" style="vertical-align: middle; width: 10%;">No
                                        </th>
                                        <th rowspan="2" style="vertical-align: middle;">Bidang
                                            Pengembangan
                                            Karakter</th>
                                        <th colspan="4" style="vertical-align: middle; width: 30%;">
                                            Semester 1
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="vertical-align: middle;">BM</th>
                                        <th style="vertical-align: middle;">KM</th>
                                        <th style="vertical-align: middle;">SM</th>
                                        <th style="vertical-align: middle;">K</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pilar10 as $s) : ?>
                                    <tr>
                                        <td style="vertical-align: middle;" class="text-center"><?= $i ?>
                                        </td>
                                        <td style="vertical-align: middle;"><?= $s['keterangan'] ?></td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'bm') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="bm">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'km') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="km">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'sm') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="sm">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datapilar"
                                                    <?= check_pilar($siswa['id'], $s['id'], 'k') ?>
                                                    data-idpilar="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-nilai="k">
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-body side-hp">
                        <h6 style="margin-bottom:15px;"><b>Pilar 1. Cinta Tuhan dan Segenap CiptaanNya</b>
                        </h6>
                        <?php $a = 1; ?>
                        <?php foreach ($pilar1 as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative; z-index:3;">
                            <div style="width:10vw;">
                                <div><?= $a ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><?= $s['keterangan'] ?></p>

                            </div>

                        </div>
                        <div style="width:80vw; margin-left:9vw; margin-top: 0px; position:relative; z-index:2;">
                            <div>
                                <p style="margin-bottom: 0px; margin-top:-8px;">Nilai :</p>
                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'bm') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="bm">
                                    <label for="" class="mr-2">BM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'km') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="km">
                                    <label for="" class="mr-2">KM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'sm') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="sm">
                                    <label for="" class="mr-2">SM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'k') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="k">
                                    <label for="" class="mr-2">K</label>
                                </div>
                            </div>

                        </div>

                        <hr style="background-color: white; margin-top: -8px;">

                        <?php $a++; ?>
                        <?php endforeach; ?>

                        <div style="margin-top: 30px;"></div>
                        <h6 style=""><b>Pilar 2. Mandiri, Disiplin, dan Tanggung Jawab</b></h6>
                        <?php $a = 1; ?>
                        <?php foreach ($pilar2 as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative; z-index:3;">
                            <div style="width:10vw; margin-bottom:15px;">
                                <div><?= $a ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><?= $s['keterangan'] ?></p>

                            </div>

                        </div>
                        <div style="width:80vw; margin-left:9vw; margin-top: 0px; position:relative; z-index:2;">
                            <div>
                                <p style="margin-bottom: 0px; margin-top:-8px;">Nilai :</p>
                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'bm') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="bm">
                                    <label for="" class="mr-2">BM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'km') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="km">
                                    <label for="" class="mr-2">KM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'sm') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="sm">
                                    <label for="" class="mr-2">SM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'k') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="k">
                                    <label for="" class="mr-2">K</label>
                                </div>
                            </div>

                        </div>

                        <hr style="background-color: white; margin-top: -8px;">

                        <?php $a++; ?>
                        <?php endforeach; ?>

                        <div style="margin-top: 30px;"></div>
                        <h6 style="margin-bottom:15px;"><b>Pilar 3. Jujur, Amanah, dan Berkata Bijak</b></h6>
                        <?php $a = 1; ?>
                        <?php foreach ($pilar3 as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative; z-index:3;">
                            <div style="width:10vw;">
                                <div><?= $a ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><?= $s['keterangan'] ?></p>

                            </div>

                        </div>
                        <div style="width:80vw; margin-left:9vw; margin-top: 0px; position:relative; z-index:2;">
                            <div>
                                <p style="margin-bottom: 0px; margin-top:-8px;">Nilai :</p>
                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'bm') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="bm">
                                    <label for="" class="mr-2">BM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'km') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="km">
                                    <label for="" class="mr-2">KM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'sm') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="sm">
                                    <label for="" class="mr-2">SM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'k') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="k">
                                    <label for="" class="mr-2">K</label>
                                </div>
                            </div>

                        </div>

                        <hr style="background-color: white; margin-top: -8px;">

                        <?php $a++; ?>
                        <?php endforeach; ?>

                        <div style="margin-top: 30px;"></div>
                        <h6 style="margin-bottom:15px;"><b>Pilar 4. Hormat dan Santun</b></h6>
                        <?php $a = 1; ?>
                        <?php foreach ($pilar4 as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative; z-index:3;">
                            <div style="width:10vw;">
                                <div><?= $a ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><?= $s['keterangan'] ?></p>

                            </div>

                        </div>
                        <div style="width:80vw; margin-left:9vw; margin-top: 0px; position:relative; z-index:2;">
                            <div>
                                <p style="margin-bottom: 0px; margin-top:-8px;">Nilai :</p>
                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'bm') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="bm">
                                    <label for="" class="mr-2">BM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'km') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="km">
                                    <label for="" class="mr-2">KM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'sm') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="sm">
                                    <label for="" class="mr-2">SM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'k') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="k">
                                    <label for="" class="mr-2">K</label>
                                </div>
                            </div>

                        </div>

                        <hr style="background-color: white; margin-top: -8px;">

                        <?php $a++; ?>
                        <?php endforeach; ?>

                        <div style="margin-top: 30px;"></div>
                        <h6 style="margin-bottom:15px;"><b>Pilar 5. Dermawan, Suka Menolong, dan Bekerja
                                Sama</b></h6>
                        <?php $a = 1; ?>
                        <?php foreach ($pilar5 as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative; z-index:3;">
                            <div style="width:10vw;">
                                <div><?= $a ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><?= $s['keterangan'] ?></p>

                            </div>

                        </div>
                        <div style="width:80vw; margin-left:9vw; margin-top: 0px; position:relative; z-index:2;">
                            <div>
                                <p style="margin-bottom: 0px; margin-top:-8px;">Nilai :</p>
                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'bm') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="bm">
                                    <label for="" class="mr-2">BM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'km') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="km">
                                    <label for="" class="mr-2">KM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'sm') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="sm">
                                    <label for="" class="mr-2">SM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'k') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="k">
                                    <label for="" class="mr-2">K</label>
                                </div>
                            </div>

                        </div>

                        <hr style="background-color: white; margin-top: -8px;">

                        <?php $a++; ?>
                        <?php endforeach; ?>

                        <div style="margin-top: 30px;"></div>
                        <h6 style="margin-bottom:15px;"><b>Pilar 6. Percaya Diri, Kreatif, dan Pantang
                                Menyerah</b></h6>
                        <?php $a = 1; ?>
                        <?php foreach ($pilar6 as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative; z-index:3;">
                            <div style="width:10vw;">
                                <div><?= $a ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><?= $s['keterangan'] ?></p>

                            </div>

                        </div>
                        <div style="width:80vw; margin-left:9vw; margin-top: 0px; position:relative; z-index:2;">
                            <div>
                                <p style="margin-bottom: 0px; margin-top:-8px;">Nilai :</p>
                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'bm') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="bm">
                                    <label for="" class="mr-2">BM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'km') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="km">
                                    <label for="" class="mr-2">KM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'sm') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="sm">
                                    <label for="" class="mr-2">SM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'k') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="k">
                                    <label for="" class="mr-2">K</label>
                                </div>
                            </div>

                        </div>

                        <hr style="background-color: white; margin-top: -8px;">

                        <?php $a++; ?>
                        <?php endforeach; ?>

                        <div style="margin-top: 30px;"></div>
                        <h6 style="margin-bottom:15px;"><b>Pilar 7. Pemimpin Yang Baik dan Adil</b></h6>
                        <?php $a = 1; ?>
                        <?php foreach ($pilar7 as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative; z-index:3;">
                            <div style="width:10vw;">
                                <div><?= $a ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><?= $s['keterangan'] ?></p>

                            </div>

                        </div>
                        <div style="width:80vw; margin-left:9vw; margin-top: 0px; position:relative; z-index:2;">
                            <div>
                                <p style="margin-bottom: 0px; margin-top:-8px;">Nilai :</p>
                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'bm') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="bm">
                                    <label for="" class="mr-2">BM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'km') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="km">
                                    <label for="" class="mr-2">KM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'sm') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="sm">
                                    <label for="" class="mr-2">SM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'k') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="k">
                                    <label for="" class="mr-2">K</label>
                                </div>
                            </div>

                        </div>

                        <hr style="background-color: white; margin-top: -8px;">

                        <?php $a++; ?>
                        <?php endforeach; ?>

                        <div style="margin-top: 30px;"></div>
                        <h6 style="margin-bottom:15px;"><b>Pilar 8. Baik dan Rendah Hati</b></h6>
                        <?php $a = 1; ?>
                        <?php foreach ($pilar8 as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative; z-index:3;">
                            <div style="width:10vw;">
                                <div><?= $a ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><?= $s['keterangan'] ?></p>

                            </div>

                        </div>
                        <div style="width:80vw; margin-left:9vw; margin-top: 0px; position:relative; z-index:2;">
                            <div>
                                <p style="margin-bottom: 0px; margin-top:-8px;">Nilai :</p>
                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'bm') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="bm">
                                    <label for="" class="mr-2">BM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'km') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="km">
                                    <label for="" class="mr-2">KM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'sm') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="sm">
                                    <label for="" class="mr-2">SM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'k') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="k">
                                    <label for="" class="mr-2">K</label>
                                </div>
                            </div>

                        </div>

                        <hr style="background-color: white; margin-top: -8px;">

                        <?php $a++; ?>
                        <?php endforeach; ?>

                        <div style="margin-top: 30px;"></div>
                        <h6 style="margin-bottom:15px;"><b>Pilar 9. Toleran, Cinta Damai, dan Bersatu</b></h6>
                        <?php $a = 1; ?>
                        <?php foreach ($pilar9 as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative; z-index:3;">
                            <div style="width:10vw;">
                                <div><?= $a ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><?= $s['keterangan'] ?></p>

                            </div>

                        </div>
                        <div style="width:80vw; margin-left:9vw; margin-top: 0px; position:relative; z-index:2;">
                            <div>
                                <p style="margin-bottom: 0px; margin-top:-8px;">Nilai :</p>
                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'bm') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="bm">
                                    <label for="" class="mr-2">BM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'km') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="km">
                                    <label for="" class="mr-2">KM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'sm') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="sm">
                                    <label for="" class="mr-2">SM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'k') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="k">
                                    <label for="" class="mr-2">K</label>
                                </div>
                            </div>

                        </div>

                        <hr style="background-color: white; margin-top: -8px;">

                        <?php $a++; ?>
                        <?php endforeach; ?>

                        <div style="margin-top: 30px;"></div>
                        <h6 style="margin-bottom:15px;"><b>Kebersihan, Kerapian, Kesehatan, dan Keamanan</b>
                        </h6>
                        <?php $a = 1; ?>
                        <?php foreach ($pilar10 as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative; z-index:3;">
                            <div style="width:10vw;">
                                <div><?= $a ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><?= $s['keterangan'] ?></p>

                            </div>

                        </div>
                        <div style="width:80vw; margin-left:9vw; margin-top: 0px; position:relative; z-index:2;">
                            <div>
                                <p style="margin-bottom: 0px; margin-top:-8px;">Nilai :</p>
                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'bm') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="bm">
                                    <label for="" class="mr-2">BM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'km') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="km">
                                    <label for="" class="mr-2">KM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'sm') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="sm">
                                    <label for="" class="mr-2">SM</label>
                                </div>

                                <div class="mr-2" style="display: inline;">
                                    <input type="checkbox" class="datapilar"
                                        <?= check_pilar($siswa['id'], $s['id'], 'k') ?> data-idpilar="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-nilai="k">
                                    <label for="" class="mr-2">K</label>
                                </div>
                            </div>

                        </div>

                        <hr style="background-color: white; margin-top: -8px;">

                        <?php $a++; ?>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>

    </div>


    <div class="container side-hp m-footer">
        <div style="margin-bottom: 20px;">
            <h6 class="m-0 font-weight-bold text-white text-uppercase text-center">Laporan Penilaian 9 Pilar dan K4
                <?= $siswa['nama'] ?></h6>
        </div>
        <div class="col-lg-8 mb-2">
            <div class="row posisi-tombol">
                <div class="mb-2 mr-2">
                    <a href="/siswa/raport/{{ $siswa->id }}/1"
                        class="btn btn-primary {{ Request::is('siswa/raport/*') ? 'warna-3' : 'warna-1' }}">
                        <span class="text"><b>Nilai 1</b></span>
                    </a>
                </div>
                <div class="mb-2 mr-2">
                    <a href="/siswa/raport2/{{ $siswa->id }}/1"
                        class="btn btn-primary {{ Request::is('siswa/raport2*') ? 'warna-3' : 'warna-1' }}">
                        <span class="text"><b>Nilai 2</b></span>
                    </a>
                </div>
                <div class="mb-2 mr-2">
                    <a href="/siswa/raport3/{{ $siswa->id }}"
                        class="btn btn-primary {{ Request::is('siswa/raport3*') ? 'warna-3' : 'warna-1' }}">
                        <span class="text"><b>Nilai 3</b></span>
                    </a>
                </div>
                <div class="mb-2">
                    <a href="/siswa/raport4/{{ $siswa->id }}"
                        class="btn btn-primary {{ Request::is('siswa/raport4*') ? 'warna-3' : 'warna-1' }}">
                        <span class="text"><b>Nilai 4</b></span>
                    </a>
                </div>
            </div>

        </div>

        <div style="margin-top: 30px;"></div>








    </div>
    <div class="container side-com">

        <div class="container">
            <div class="row posisi-tombol">
                <div class="mb-3 mr-2">
                    <a href="/siswa/raport/{{ $siswa->id }}/1"
                        class="btn btn-primary {{ Request::is('siswa/raport/*') ? 'warna-4' : 'warna-1' }}">
                        <span class="icon text-white-100">
                            <i class="fas fa-home mr-2"></i>
                        </span>
                        <span class="text"><b>Nilai 1</b></span>
                    </a>
                </div>
                <div class="mb-3 mr-2">
                    <a href="/siswa/raport2/{{ $siswa->id }}/1"
                        class="btn btn-primary {{ Request::is('siswa/raport2*') ? 'warna-4' : 'warna-1' }}">
                        <span class="icon text-white-100">
                            <i class="fas fa-home mr-2"></i>
                        </span>
                        <span class="text"><b>Nilai 2</b></span>
                    </a>
                </div>
                <div class="mb-3 mr-2">
                    <a href="/siswa/raport3/{{ $siswa->id }}"
                        class="btn btn-primary {{ Request::is('siswa/raport3*') ? 'warna-4' : 'warna-1' }}">
                        <span class="icon text-white-100">
                            <i class="fas fa-home mr-2"></i>
                        </span>
                        <span class="text"><b>Nilai 3</b></span>
                    </a>
                </div>
                <div class="mb-3">
                    <a href="/siswa/raport4/{{ $siswa->id }}"
                        class="btn btn-primary {{ Request::is('siswa/raport4*') ? 'warna-4' : 'warna-1' }}">
                        <span class="icon text-white-100">
                            <i class="fas fa-home mr-2"></i>
                        </span>
                        <span class="text"><b>Nilai 4</b></span>
                    </a>
                </div>
            </div>

        </div>

        <!-- Basic Card Example -->
        <div class="card shadow mb-4" style="border: 0;">
            <div class="card-header py-3 warna-1">
                <h6 class="m-0 font-weight-bold text-white text-uppercase text-center">Laporan Penilaian 9 Pilar dan K4
                    <?= $siswa['nama'] ?></h6>
            </div>
            <div class="card-body warna-4">
                <div class="row posisi-tombol">
                    <div class="col-lg-8 mb-3">
                    </div>
                </div>
                @if (session()->has('success'))
                    <div class="alert warna-3 text-white" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

            </div>



        </div>
    </div>

    <script>
        const datapilar = document.querySelectorAll(".datapilar");
        datapilar.forEach(function(button) {
            button.addEventListener("click", function() {
                // Dapatkan data ID siswa dari atribut data
                var idsiswa = this.getAttribute("data-idsiswa");
                var idpilar = this.getAttribute("data-idpilar");
                var nilai = this.getAttribute("data-nilai");
                fetch('/siswa/raport3/' + idsiswa + '/nilai?idsiswa=' + idsiswa + '&idpilar=' + idpilar +
                    '&nilai=' + nilai);
            });
        });
    </script>
@endsection
