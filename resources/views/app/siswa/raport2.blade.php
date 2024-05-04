<?php
function cek_nilai($idnilai, $idsiswa, $ket, $nilai)
{
    if ($ket == 'doa') {
        $cek_doa = DB::select('SELECT * FROM raport_doa_siswas WHERE siswa_id =' . $idsiswa . ' AND nilai_id = ' . $idnilai);
        if (count($cek_doa) > 0) {
            if ($cek_doa[0]->$nilai == 1) {
                return 'checked';
            } else {
                return '';
            }
        }
    }

    if ($ket == 'surah') {
        $cek_surah = DB::select('SELECT * FROM raport_surah_siswas WHERE siswa_id =' . $idsiswa . ' AND nilai_id = ' . $idnilai);
        if (count($cek_surah) > 0) {
            if ($cek_surah[0]->$nilai == 1) {
                return 'checked';
            } else {
                return '';
            }
        }
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
                <a href="/siswa/raport2/{{ $siswa->id }}/1"
                    class="btn btn-icon-split {{ Request::is('siswa/raport2/*1') ? 'bg-secondary' : 'bg-info' }}">
                    <span class="icon text-white {{ Request::is('siswa/raport2/*1') ? 'bg-secondary' : 'bg-info' }}">
                        <i class="fas fa-marker"></i>
                    </span>
                    <span class="text text-white {{ Request::is('siswa/raport2/*1') ? 'bg-secondary' : 'bg-info' }}"
                        style="margin-left: -8px;">Do'a</span>
                </a>
                <a href="/siswa/raport2/{{ $siswa->id }}/2"
                    class="btn btn-icon-split {{ Request::is('siswa/raport2/*2') ? 'bg-secondary' : 'bg-info' }}">
                    <span class="icon text-white {{ Request::is('siswa/raport2/*2') ? 'bg-secondary' : 'bg-info' }}">
                        <i class="fas fa-marker"></i>
                    </span>
                    <span class="text text-white {{ Request::is('siswa/raport2/*2') ? 'bg-secondary' : 'bg-info' }}"
                        style="margin-left: -8px;">Surah</span>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Laporan Penilaian
                            {{ $keterangan }}
                            <?= $siswa['nama'] ?></h6>
                    </div>
                    <div class="card-body side-com">
                        <div class="table-responsive">
                            <table class="table table-bordered" cellspacing="0">
                                <thead class="text-center">
                                    <tr class="text-center">
                                        <th rowspan="2" style="vertical-align: middle; width: 7%;">No</th>
                                        <th rowspan="2" style="vertical-align: middle; width: 20%;">Materi
                                            {{ $keterangan }}</th>
                                        <th colspan="4" style="vertical-align: middle; width: 21%;">
                                            Penilaian
                                        </th>
                                        <th rowspan="2" style="vertical-align: middle; width: 25%;">
                                            Keterangan
                                        </th>
                                        <th rowspan="2" style="vertical-align: middle; width: 10%;">Action
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
                                    <?php foreach ($penilaian as $s) : ?>
                                    <?php
                                    $keterangan_nilai = '';
                                    foreach ($penilaian_siswa as $ps) {
                                        if ($s->id == $ps->nilai_id) {
                                            $keterangan_nilai = $ps->keterangan;
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td style="vertical-align: middle;" class="text-center"><?= $i ?>
                                        </td>
                                        <td style="vertical-align: middle;"><?= $s->$nilai ?></td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datanilai"
                                                    {{ cek_nilai($s->id, $siswa->id, $nilai, 'bm') }}
                                                    data-idnilai="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-ket="{{ $nilai }}" data-nilai="bm">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datanilai"
                                                    {{ cek_nilai($s->id, $siswa->id, $nilai, 'mm') }}
                                                    data-idnilai="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-ket="{{ $nilai }}" data-nilai="mm">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datanilai"
                                                    {{ cek_nilai($s->id, $siswa->id, $nilai, 'bsh') }}
                                                    data-idnilai="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-ket="{{ $nilai }}" data-nilai="bsh">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input datanilai"
                                                    {{ cek_nilai($s->id, $siswa->id, $nilai, 'bsb') }}
                                                    data-idnilai="<?= $s['id'] ?>" data-idsiswa="<?= $siswa['id'] ?>"
                                                    data-ket="{{ $nilai }}" data-nilai="bsb">
                                            </div>
                                        </td>
                                        <td style="vertical-align: middle;">{{ $keterangan_nilai }}</td>
                                        <td style="vertical-align: middle;" class="text-center">
                                            <button data-toggle="modal" data-target="#keterangan<?= $s['id'] ?>"
                                                class="btn btn-circle btn-sm btn-success tombol-plus">
                                                <span class="icon text-white-100">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Modal Tambah Keterangan doa -->
                                    <div class="modal fade" id="keterangan<?= $s['id'] ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="doaLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header mb-3">
                                                    <h5 class="modal-title" id="doaLabel">Tambah Keterangan</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/siswa/raport2/keterangan" method="POST">
                                                    @csrf
                                                    <div class="container">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <input type="hidden" class="form-control" id="idsiswa"
                                                                    name="idsiswa" value="<?= $siswa['id'] ?>">
                                                                <input type="hidden" class="form-control" id="ket"
                                                                    name="ket" value="{{ $nilai }}">
                                                                <input type="hidden" class="form-control" id="idnilai"
                                                                    name="idnilai" value="<?= $s['id'] ?>">
                                                                <input type="text" class="form-control"
                                                                    id="keterangan" name="keterangan"
                                                                    placeholder="Keterangan">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                                        </div>
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
                        <?php foreach ($penilaian as $s) : ?>
                        <?php
                        $keterangan_nilai = '';
                        foreach ($penilaian_siswa as $ps) {
                            if ($s->id == $ps->nilai_id) {
                                $keterangan_nilai = $ps->keterangan;
                            }
                        }
                        ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative; z-index:3;">
                            <div style="width:10vw;">
                                <div><?= $i ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><?= $s->$nilai ?></p>
                            </div>
                            <div class="btnMenuSiswa" style="width:10vw; display: flex; justify-content:right;"
                                id="btnMenuSiswa" data-idsiswa="<?= $s['id'] ?>">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>
                            <div class="menuSiswaD shadow"
                                style="display:none; position:absolute; right:0; top:0; z-index:99; background-color:white;"
                                id="menuSiswaD{{ $s->id }}">

                                <div style="border-radius:10px;">
                                    <a class="dropdown-item text-gray-800 nilai_indikator" data-toggle="modal"
                                        data-target="#keteranganhp<?= $s['id'] ?>">
                                        Tambah Keterangan
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; position:relative; z-index:3;">
                            <div style="width:9vw;">
                                <div></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p style="margin-top: -16px;">Keterangan : </p>
                                @if ($keterangan_nilai == '')
                                    <p></p>
                                @else
                                    <p style="margin-top: -16px;">{{ $keterangan_nilai }}</p>
                                @endif
                            </div>


                        </div>
                        <div class="text-hp"
                            style="width:80vw; margin-left:12vw; margin-top: -15px; position:relative; z-index:9;">
                            <div>
                                <div class="mr-2 ml-1" style="display: inline;">
                                    <input type="checkbox" class="form-check-input datanilai"
                                        {{ cek_nilai($s->id, $siswa->id, $nilai, 'bm') }} data-idnilai="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-ket="{{ $nilai }}"
                                        data-nilai="bm">
                                    <label for="bm" class="mr-2" style="margin-right: 10px;">bm</label>
                                </div>

                                <div class="mr-2 ml-1" style="display: inline;">
                                    <input type="checkbox" class="form-check-input datanilai"
                                        {{ cek_nilai($s->id, $siswa->id, $nilai, 'mm') }} data-idnilai="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-ket="{{ $nilai }}"
                                        data-nilai="mm">
                                    <label for="mm" class="mr-2" style="margin-right: 10px;">mm</label>
                                </div>

                                <div class="mr-2 ml-1" style="display: inline;">
                                    <input type="checkbox" class="form-check-input datanilai"
                                        {{ cek_nilai($s->id, $siswa->id, $nilai, 'bsh') }} data-idnilai="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-ket="{{ $nilai }}"
                                        data-nilai="bsh">
                                    <label for="bsh" class="mr-2" style="margin-right: 10px;">bsm</label>
                                </div>

                                <div class="mr-2 ml-1" style="display: inline;">
                                    <input type="checkbox" class="form-check-input datanilai"
                                        {{ cek_nilai($s->id, $siswa->id, $nilai, 'bsb') }} data-idnilai="<?= $s['id'] ?>"
                                        data-idsiswa="<?= $siswa['id'] ?>" data-ket="{{ $nilai }}"
                                        data-nilai="bsb">
                                    <label for="bsb" class="mr-2" style="margin-right: 10px;">bsh</label>
                                </div>
                            </div>

                        </div>

                        

                        <div class="modal fade" id="keteranganhp<?= $s['id'] ?>" tabindex="-1" role="dialog"
                            aria-labelledby="doaLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header mb-3">
                                        <h5 class="modal-title" id="doaLabel">Tambah Keterangan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/siswa/raport2/keterangan" method="POST">
                                        @csrf
                                        <div class="container">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="hidden" class="form-control" id="idsiswa"
                                                        name="idsiswa" value="<?= $siswa['id'] ?>">
                                                    <input type="hidden" class="form-control" id="ket"
                                                        name="ket" value="{{ $nilai }}">
                                                    <input type="hidden" class="form-control" id="idnilai"
                                                        name="idnilai" value="<?= $s['id'] ?>">
                                                    <input type="text" class="form-control" id="keterangan"
                                                        name="keterangan" placeholder="Keterangan">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <hr style="background-color: white; margin-top: -8px;">

                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <script>
        const datanilai = document.querySelectorAll(".datanilai");
        datanilai.forEach(function(button) {
            button.addEventListener("click", function() {
                // Dapatkan data ID siswa dari atribut data
                var idsiswa = this.getAttribute("data-idsiswa");
                var idnilai = this.getAttribute("data-idnilai");
                var nilai = this.getAttribute("data-nilai");
                var ket = this.getAttribute("data-ket");
                fetch('/siswa/raport2/nilai?idsiswa=' + idsiswa + '&idnilai=' + idnilai +
                    '&nilai=' + nilai + '&ket=' + ket);
            });
        });
    </script>
@endsection
