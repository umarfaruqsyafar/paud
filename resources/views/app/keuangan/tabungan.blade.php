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
                @can('bendahara')
                    <a class="btn btn-info btn-icon-split" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <span class="text">Pilih Kelas</span>
                        <span class="icon text-white-50">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-center" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="/keuangan/tabungan/all">
                            Semua Siswa
                        </a>
                        <?php foreach ($kelas as $k) : ?>
                        <a class="dropdown-item" href="/keuangan/tabungan/{{ $k->tendik->id }}">
                            <?= $k['kelas'] ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                @endcan

                <a class="btn btn-info btn-icon-split">
                    <span class="text">{{ $kelas_aktif }}</span>
                </a>
            </div>
            <div class="col-lg-4 mb-3">
                @if ($user->role == 'wali kelas')
                    <form action="/siswa/tabungan/{{ $kelas_aktif_id == 'all' ? 'all' : $kelas_aktif_id }}" method="get">
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
                @else
                    <form action="/keuangan/tabungan/{{ $kelas_aktif_id == 'all' ? 'all' : $kelas_aktif_id }}"
                        method="get">
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
                @endif

            </div>
        </div>

        <div>
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Info Tabungan Siswa</h6>
                </div>
                <div class="card-body side-com">
                    @if (count($jumlah_tabungan) > 0)
                        <h6>Total tabungan : <?= 'Rp ' . number_format($jumlah_tabungan[0]->menabung - $jumlah_tabungan[0]->penarikan , 2, ',', '.') ?></h6>
                    @else
                        <h6>Total tabungan : -</h6>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 30%;">Siswa</th>
                                    <th>NIS</th>
                                    <th style="width: 24%;">Jumlah Tabungan</th>
                                    <th style="width: 24%;">Tabungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($siswa as $s) : ?>
                                <?php
                                $total_tabungan = 0;
                                $total_penarikan = 0;
                                $tambah = 0;
                                $kurang = 0;
                                foreach ($tabungan as $t) {
                                    if ($s->id == $t->siswa_id) {
                                        $total_tabungan = $t->total_tabungan;
                                        $total_penarikan = $t->total_penarikan;
                                    }
                                }
                                ?>
                                <tr>
                                    <td style="vertical-align: middle;" class="text-center"><?= $i ?></td>
                                    <td style="vertical-align: middle;">{{ $s->nama }}</td>
                                    <td style="vertical-align: middle;" class="text-center">
                                        {{ $s->nis }}
                                    </td>
                                    <td style="vertical-align: middle;" class="text-right">
                                        <?= 'Rp ' . number_format($total_tabungan - $total_penarikan, 2, ',', '.') ?>
                                    </td>
                                    <td style="vertical-align: middle;" class="text-center">
                                        <a style="background-color: #d0e2a8; border:0;" data-toggle="modal"
                                            data-target="#tabungan" class="btn btn-circle btn-sm btn-primary tabungan"
                                            data-idsiswa="{{ $s->id }}" data-nama="{{ $s->nama }}">
                                            <span class="icon text-white-100">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </a>
                                        <a style="background-color: #d03672; border:0;" data-toggle="modal"
                                            data-target="#penarikan" class="btn btn-circle btn-sm btn-danger tabungan"
                                            data-idsiswa="{{ $s->id }}" data-nama="{{ $s->nama }}">
                                            <span class="icon text-white-100">
                                                <i class="fas fa-minus"></i>
                                            </span>
                                        </a>
                                        <a style="background-color: #7cbfb5; border:0;" data-toggle="modal"
                                            data-target="#perubahan" class="btn btn-circle btn-sm btn-danger tabungan"
                                            data-idsiswa="{{ $s->id }}" data-nama="{{ $s->nama }}">
                                            <span class="icon text-white-100">
                                                <i class="fas fa-recycle"></i>
                                            </span>
                                        </a>
                                        <a @if ($user->role == 'wali kelas') href="/siswa/tabungan/siswa/{{ $s->id }}"
                                            @else
                                            href="/keuangan/tabungan/siswa/{{ $s->id }}" @endif
                                            style="background-color: #fde221; border:0;"
                                            class="btn btn-circle btn-sm btn-danger">
                                            <span class="icon text-white-100">
                                                <i class="fas fa-exclamation-circle"></i>
                                            </span>
                                        </a>
                                    </td>
                                </tr>

                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-body side-hp">
                    @if (count($jumlah_tabungan) > 0)
                        <h6 class="mb-4">Total tabungan : <?= 'Rp ' . number_format($jumlah_tabungan[0]->menabung - $jumlah_tabungan[0]->penarikan , 2, ',', '.') ?></h6>
                    @else
                        <h6 class="mb-4">Total tabungan : -</h6>
                    @endif
                    <?php $i = 1; ?>
                    <?php foreach ($siswa as $s) : ?>
                    <?php
                    $total_tabungan = 0;
                    $total_penarikan = 0;
                    $tambah = 0;
                    $kurang = 0;
                    foreach ($tabungan as $t) {
                        if ($s->id == $t->siswa_id) {
                            $total_tabungan = $t->total_tabungan;
                            $total_penarikan = $t->total_penarikan;
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
                            <p style="margin-top:-18px;">NIS : {{ $s->nis }}</p>
                            <p style="margin-top:-18px;">Tabungan : </p>
                            <p style="margin-top:-18px;">
                                <?= 'Rp ' . number_format($total_tabungan - $total_penarikan, 2, ',', '.') ?>
                            </p>

                        </div>
                        <div class="btnMenuSiswa" style="width:10vw; display: flex; justify-content:right;"
                            id="btnMenuSiswa" data-idsiswa="<?= $s->id ?>">
                            <i class="fas fa-info-circle text-warning"></i>
                        </div>
                        <div class="menuSiswaD shadow"
                            style="display:none; position:absolute; right:0; top:0; z-index:3; background-color:white;"
                            id="menuSiswaD{{ $s->id }}">

                            <div style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                <a class="dropdown-item text-gray-800 tabungan" data-toggle="modal"
                                    data-target="#tabungan" data-idsiswa="{{ $s->id }}"
                                    data-nama="{{ $s->nama }}">
                                    Tambah
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-gray-800 tabungan" data-toggle="modal"
                                    data-target="#penarikan" data-idsiswa="{{ $s->id }}"
                                    data-nama="{{ $s->nama }}">
                                    Penarikan
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-gray-800 tabungan" data-toggle="modal"
                                    data-target="#perubahan" data-idsiswa="{{ $s->id }}"
                                    data-nama="{{ $s->nama }}">
                                    Ubah
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-gray-800 dataadmin"
                                    @if ($user->role == 'wali kelas') href="/siswa/tabungan/siswa/{{ $s->id }}"
                                        @else
                                        href="/keuangan/tabungan/siswa/{{ $s->id }}" @endif>
                                    Info
                                </a>
                            </div>
                        </div>

                    </div>
                    <hr style="background-color: white; margin-top:-10px;">

                    <?php $i++; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>

    <!-- End of Main Content -->

    <!-- Modal Meanabung -->
    <div class="modal fade" id="tabungan" tabindex="-1" role="dialog" aria-labelledby="tabunganLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tabunganLabel">Menabung</h5>
                    <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/keuangan/tabungan/masuk" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-2">
                            <label>Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" readonly>
                            <input type="hidden" class="form-control" id="idsiswa" name="idsiswa">
                            <input type="hidden" class="form-control" id="idkelas" name="idkelas"
                                value="{{ $kelas_aktif_id }}">
                        </div>
                        <div class="mb-2">
                            <label>Nominal Tabungan</label>
                            <input type="text" class="form-control format-rupiah" id="rupiah" name="rupiah">
                        </div>
                        <div class="mb-2">
                            <label>Catatan</label>
                            <input type="text" class="form-control" id="catatan" name="catatan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary tambahMenabung">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Penarikan Meanabung -->
    <div class="modal fade" id="penarikan" tabindex="-1" role="dialog" aria-labelledby="penarikanLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="penarikanLabel">Penarikan Tabungan</h5>
                    <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/keuangan/tabungan/penarikan" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-2">
                            <label>Nama</label>
                            <input type="text" class="form-control" id="namapenarikan" name="namapenarikan" readonly>
                            <input type="hidden" class="form-control" id="idsiswapenarikan" name="idsiswapenarikan">
                            <input type="hidden" class="form-control" id="idkelas" name="idkelas"
                                value="{{ $kelas_aktif_id }}">
                        </div>
                        <div class="mb-2">
                            <label>Nominal Penarikan</label>
                            <input type="text" class="form-control format-rupiah" id="rupiah" name="rupiah">
                        </div>
                        <div class="mb-2">
                            <label>Catatan</label>
                            <input type="text" class="form-control" id="catatan" name="catatan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary tambahMenabung">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Penarikan Meanabung -->
    <div class="modal fade" id="perubahan" tabindex="-1" role="dialog" aria-labelledby="perubahanLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="perubahanLabel">Perubahan Tabungan</h5>
                    <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/keuangan/tabungan/perubahan" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-2">
                            <label>Nama</label>
                            <input type="text" class="form-control" id="namaperubahan" name="namaperubahan" readonly>
                            <input type="hidden" class="form-control" id="idsiswaperubahan" name="idsiswaperubahan">
                            <input type="hidden" class="form-control" id="idkelas" name="idkelas"
                                value="{{ $kelas_aktif_id }}">
                        </div>
                        <div class="mb-2">
                            <label>Tanggal yang ingin diubah</label>
                            <input type="date" class="form-control" id="update_at" name="update_at">
                        </div>
                        <div class="mb-2">
                            <label>Nominal Tabungan Baru</label>
                            <input type="text" class="form-control format-rupiah" id="rupiah" name="rupiah">
                        </div>
                        <div class="mb-2">
                            <label>Catatan</label>
                            <input type="text" class="form-control" id="catatan" name="catatan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary tambahMenabung">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if ($kelas_aktif_id == 'all')
        <script>
            const perubahanspp = document.querySelectorAll(".perubahanspp");
            perubahanspp.forEach(function(button) {
                button.addEventListener("click", function() {
                    // Dapatkan data ID siswa dari atribut data
                    var idspp = this.getAttribute("data-idspp");
                    var idsiswa = this.getAttribute("data-idsiswa");
                    fetch('/keuangan/tabungan/all/perubahan?idspp=' + idspp + '&' + 'idsiswa=' + idsiswa)
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
                    fetch('/keuangan/tabungan/' + {{ $kelas_aktif_id }} + '/perubahan?idspp=' + idspp + '&' +
                        'idsiswa=' + idsiswa)
                });
            });
        </script>
    @endif
    <script>
        const tabungan = document.querySelectorAll(".tabungan");
        tabungan.forEach(function(button) {
            button.addEventListener("click", function() {
                // Dapatkan data ID siswa dari atribut data
                var idsiswa = this.getAttribute("data-idsiswa");
                var nama = this.getAttribute("data-nama");
                var tingkat = this.getAttribute("data-tingkat");
                $('#idsiswa').val(idsiswa);
                $('#idsiswapenarikan').val(idsiswa);
                $('#idsiswaperubahan').val(idsiswa);
                $('#nama').val(nama);
                $('#namapenarikan').val(nama);
                $('#namaperubahan').val(nama);
                document.getElementById('kelashapus').innerHTML = kelas;
            });
        });
    </script>
@endsection
