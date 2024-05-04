<?php
function cek_spp($idsiswa, $idspp)
{
    $query = DB::select('SELECT * FROM spp_masuks where siswa_id=' . $idsiswa . ' AND spp_id =' . $idspp);
    if (count($query) > 0) {
        return 'checked';
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
            <div class="col-lg-8 mb-3">
                <a class="btn btn-info btn-icon-split" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="text">Pilih Kelas</span>
                    <span class="icon text-white-50">
                        <i class="fas fa-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-center" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="/keuangan/info_spp/all">
                        Semua Siswa
                    </a>
                    <?php foreach ($kelas as $k) : ?>
                    <a class="dropdown-item" href="/keuangan/info_spp/{{ $k['id'] }}">
                        <?= $k['kelas'] ?>
                    </a>
                    <?php endforeach; ?>
                </div>
                <a class="btn btn-info btn-icon-split">
                    <span class="text">{{ $kelas_aktif }}</span>
                </a>
            </div>
            <div class="col-lg-4 mb-3">
                <form action="/keuangan/info_spp/{{ $kelas_aktif_id == 'all' ? 'all' : $kelas_aktif_id }}" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 small" id="cari_siswa" name="cari_siswa"
                            placeholder="Cari siswa..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary border-0" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <div>
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Info Biaya Administrasi Siswa</h6>
                </div>
                <div class="ml-4 mt-3">
                    <p class="text-hp" style="margin:0;"><b>Catatan :</b></p>
                    <li class="text-hp">(-) merupakan rincian pengurangan biaya</li>
                    <li class="text-hp">(+) merupakan rincian penambahan biaya</li>
                </div>
                <div class="card-body side-com">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th rowspan="2" style="vertical-align: middle; width: 5%;">No</th>
                                    <th rowspan="2" style="vertical-align: middle; width: 25%;">Siswa</th>
                                    <th colspan="3" style="vertical-align: middle;">Pembiayaan</th>
                                    <th rowspan="2" style="vertical-align: middle; width: 10%;">Action
                                    </th>
                                </tr>
                                <tr>
                                    <th class="text-center" style="width: 13%;">SPP</th>
                                    <th class="text-center" style="width: 13%;">Perubahan</th>
                                    <th class="text-center" style="width: 24%;">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($siswa as $s) : ?>
                                <?php
                                $spp_siswa = 0;
                                $tambah = 0;
                                $kurang = 0;
                                foreach ($spp as $sp) {
                                    if ($s->tingkat == $sp->tingkat) {
                                        $spp_siswa = $sp->biaya;
                                    }
                                }
                                foreach ($perubahan as $p) {
                                    if ($s->id == $p->siswa_id) {
                                        $tambah = $p->tambah;
                                        $kurang = $p->kurang;
                                    }
                                }
                                ?>
                                <tr>
                                    <td class="text-center" style="vertical-align: middle;"><?= $i ?></td>
                                    <td class="text-left" style="vertical-align: middle;">
                                        {{ $s->nama }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle;">
                                        {{ 'Rp ' . number_format($spp_siswa + $tambah - $kurang, 2, ',', '.') }}</td>
                                    <td class="text-right" style="vertical-align: middle;">
                                        {{ 'Rp ' . number_format($tambah - $kurang, 2, ',', '.') }}</td>

                                    <td class="text-left" style="vertical-align: middle;">
                                        @foreach ($perubahan as $p)
                                            @if ($p->siswa_id == $s->id)
                                                @if ($p->tambah == null)
                                                    <p style="margin-bottom: -5px;">(-) {{ $p->uraian }}</p>
                                                @else
                                                    <p style="margin-bottom: -5px;">(+) {{ $p->uraian }}</p>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <a data-toggle="modal" data-target="#plusadmin{{ $s->id }}"
                                            class="btn btn-circle btn-sm btn-primary tombol-plus">
                                            <span class="icon text-white-100">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </a>
                                        <a data-toggle="modal" data-target="#minadmin{{ $s->id }}"
                                            class="btn btn-circle btn-sm btn-danger tombol-min">
                                            <span class="icon text-white-100">
                                                <i class="fas fa-minus"></i>
                                            </span>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Modal Ubah Paket -->
                                <div class="modal fade" id="plusadmin{{ $s->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="plusadminLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header mb-3">
                                                <h5 class="modal-title" id="plusadminLabel">Tambah Biaya SPP</h5>
                                                <a class="close" aria-label="Close"
                                                    href="/keuangan/info_spp/{{ $kelas_aktif_id }}">
                                                    <i aria-hidden="true">&times;</i>
                                                </a>
                                            </div>
                                            @foreach ($penambahan as $p)
                                                <div class="container">
                                                    <div class="form-check">
                                                        <input <?= cek_spp($s->id, $p->id) ?> type="checkbox"
                                                            class="form-check-input perubahanspp"
                                                            data-idspp="{{ $p['id'] }}"
                                                            data-idsiswa="{{ $s->id }}">
                                                        <label>{{ $p['uraian'] }} (
                                                            {{ 'Rp ' . number_format($p->tambah, 2, ',', '.') }} )</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="modal-footer">
                                                <a class="btn btn-secondary"
                                                    href="/keuangan/info_spp/{{ $kelas_aktif_id }}"
                                                    style="background-color: #d03672; border-color: #d03672;">Tutup</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="minadmin{{ $s->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="minadminLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header mb-3">
                                                <h5 class="modal-title" id="minadminLabel">Kurangi Biaya SPP</h5>
                                                <a class="close" aria-label="Close" data-dismiss="modal">
                                                    <i aria-hidden="true">&times;</i>
                                                </a>
                                            </div>
                                            @foreach ($pengurangan as $p)
                                                <div class="container">
                                                    <div class="form-check">
                                                        <input <?= cek_spp($s->id, $p->id) ?> type="checkbox"
                                                            class="form-check-input perubahanspp"
                                                            data-idspp="{{ $p['id'] }}"
                                                            data-idsiswa="{{ $s->id }}">
                                                        <label>{{ $p['uraian'] }} (
                                                            {{ 'Rp ' . number_format($p->kurang, 2, ',', '.') }} )</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="modal-footer">
                                                <a href="/keuangan/info_spp/{{ $kelas_aktif_id }}"
                                                    class="btn btn-secondary"
                                                    style="background-color: #d03672; border-color: #d03672;">Tutup</a>
                                            </div>
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
                    <?php foreach ($siswa as $s) : ?>
                    <?php
                    $spp_siswa = 0;
                    $tambah = 0;
                    $kurang = 0;
                    foreach ($spp as $sp) {
                        if ($s->tingkat == $sp->tingkat) {
                            $spp_siswa = $sp->biaya;
                        }
                    }
                    foreach ($perubahan as $p) {
                        if ($s->id == $p->siswa_id) {
                            $tambah = $p->tambah;
                            $kurang = $p->kurang;
                        }
                    }
                    ?>
                    <div class="text-hp topFileSiswa" id="topFile"
                        style="display:flex; margin-top:-10px; position:relative;">
                        <div style="width:10vw;">
                            <div><?= $i ?></div>
                        </div>
                        <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <p>{{ $s->nama }}</p>
                            <p style="margin-top:-18px;">Pembiayaan : </p>
                            <p style="margin-top:-18px;">- SPP :
                                {{ 'Rp ' . number_format($spp_siswa + $tambah - $kurang, 2, ',', '.') }}</p>
                            <p style="margin-top:-18px;">- Perubahan :
                                {{ 'Rp ' . number_format($tambah - $kurang, 2, ',', '.') }}</p>
                            <p style="margin-top:-18px;">Keterangan :</p>
                            @foreach ($perubahan as $p)
                                @if ($p->siswa_id == $s->id)
                                    @if ($p->tambah == null)
                                        <p style="margin-top:-18px;">(-) {{ $p->uraian }}</p>
                                    @else
                                        <p style="margin-top:-18px;">(+) {{ $p->uraian }}</p>
                                    @endif
                                @endif
                            @endforeach

                        </div>
                        <div class="btnMenuSiswa" style="width:10vw; display: flex; justify-content:right;"
                            id="btnMenuSiswa" data-idsiswa="<?= $s->id ?>">
                            <i class="fas fa-info-circle text-warning"></i>
                        </div>
                        <div class="menuSiswaD shadow"
                            style="display:none; position:absolute; right:0; top:0; z-index:3; background-color:white;"
                            id="menuSiswaD{{ $s->id }}">

                            <div style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                <a class="dropdown-item text-gray-800" data-toggle="modal"
                                    data-target="#plusadminhp{{ $s->id }}">
                                    Tambah
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-gray-800" data-toggle="modal"
                                    data-target="#minadminhp{{ $s->id }}">
                                    Kurangi
                                </a>
                            </div>
                        </div>

                    </div>
                    <hr style="background-color: white; margin-top:-10px;">
                    <!-- Modal Ubah Paket -->
                    <div class="modal fade" id="plusadminhp{{ $s->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="plusadminLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header mb-3">
                                    <h5 class="modal-title" id="plusadminLabel">Tambah Biaya SPP</h5>
                                    <a class="close" aria-label="Close" data-dismiss="modal">
                                        <i aria-hidden="true">&times;</i>
                                    </a>
                                </div>
                                @foreach ($penambahan as $p)
                                    <div class="container">
                                        <div class="form-check">
                                            <input <?= cek_spp($s->id, $p->id) ?> type="checkbox"
                                                class="form-check-input perubahanspp" data-idspp="{{ $p['id'] }}"
                                                data-idsiswa="{{ $s->id }}">
                                            <label>{{ $p['uraian'] }} (
                                                {{ 'Rp ' . number_format($p->tambah, 2, ',', '.') }} )</label>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="modal-footer">
                                    <a class="btn btn-secondary" href="/keuangan/info_spp/{{ $kelas_aktif_id }}"
                                        style="background-color: #d03672; border-color: #d03672;">Tutup</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="minadminhp{{ $s->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="minadminLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header mb-3">
                                    <h5 class="modal-title" id="minadminLabel">Kurangi Biaya SPP</h5>
                                    <a class="close" aria-label="Close" data-dismiss="modal">
                                        <i aria-hidden="true">&times;</i>
                                    </a>
                                </div>
                                @foreach ($pengurangan as $p)
                                    <div class="container">
                                        <div class="form-check">
                                            <input <?= cek_spp($s->id, $p->id) ?> type="checkbox"
                                                class="form-check-input perubahanspp" data-idspp="{{ $p['id'] }}"
                                                data-idsiswa="{{ $s->id }}">
                                            <label>{{ $p['uraian'] }} (
                                                {{ 'Rp ' . number_format($p->kurang, 2, ',', '.') }} )</label>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="modal-footer">
                                    <a href="/keuangan/info_spp/{{ $kelas_aktif_id }}" class="btn btn-secondary"
                                        style="background-color: #d03672; border-color: #d03672;">Tutup</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>

    <!-- End of Main Content -->

    @if ($kelas_aktif_id == 'all')
        <script>
            const perubahanspp = document.querySelectorAll(".perubahanspp");
            perubahanspp.forEach(function(button) {
                button.addEventListener("click", function() {
                    // Dapatkan data ID siswa dari atribut data
                    var idspp = this.getAttribute("data-idspp");
                    var idsiswa = this.getAttribute("data-idsiswa");
                    fetch('/keuangan/info_spp/all/perubahan?idspp=' + idspp + '&' + 'idsiswa=' + idsiswa)
                });
            });
        </script>
    @else
        <script>
            const perubahanspp = document.querySelectorAll(".perubahanspp");
            hapusperubahan.forEach(function(button) {
                button.addEventListener("click", function() {
                    // Dapatkan data ID siswa dari atribut data
                    var idspp = this.getAttribute("data-idspp");
                    var idsiswa = this.getAttribute("data-idsiswa");
                    fetch('/keuangan/info_spp/' + {{ $kelas_aktif_id }} + '/perubahan?idspp=' + idspp + '&' +
                        'idsiswa=' + idsiswa)
                });
            });
        </script>
    @endif
@endsection
