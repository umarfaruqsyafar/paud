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
                        <a class="dropdown-item" href="/keuangan/pembayaran_spp/all">
                            Semua Siswa
                        </a>
                        <?php foreach ($kelas as $k) : ?>
                        <a class="dropdown-item" href="/keuangan/pembayaran_spp/{{ $k->tendik->id }}">
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
                    <form action="/siswa/spp/{{ $kelas_aktif_id == 'all' ? 'all' : $kelas_aktif_id }}" method="get">
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
                    <form action="/keuangan/pembayaran_spp/{{ $kelas_aktif_id == 'all' ? 'all' : $kelas_aktif_id }}"
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
                    <h6 class="m-0 font-weight-bold text-primary">Pembayaran Administrasi Siswa</h6>
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
                                    <th class="text-center" style="width: 15%;">SPP</th>
                                    <th class="text-center" style="width: 10%;">Total</th>
                                    <th class="text-center" style="width: 15%;">Bulan Terakhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($siswa as $s) : ?>
                                <?php
                                $spp = 0;
                                $tambah = 0;
                                $kurang = 0;
                                $terbayar = 0;
                                $bulan_akhir = null;
                                $bulan_akhir_id = 1;
                                foreach ($spp_siswa as $as) {
                                    if ($s->tingkat == $as->tingkat) {
                                        $spp = $as->biaya;
                                    }
                                }
                                foreach ($perubahan as $p) {
                                    if ($s->id == $p->siswa_id) {
                                        $tambah = $p->tambah;
                                        $kurang = $p->kurang;
                                    }
                                }
                                foreach ($spp_terbayar as $st) {
                                    if ($s->id == $st->siswa_id) {
                                        $terbayar = $st->total;
                                    }
                                }
                                foreach ($spp_terbayar_akhir as $sta) {
                                    if ($s->id == $sta->siswa_id) {
                                        $bulan_akhir = $sta->bulan;
                                        $bulan_akhir_id = $sta->bulan_id;
                                    }
                                }
                                
                                ?>
                                <tr>
                                    <td class="text-center" style="vertical-align: middle;"><?= $i ?></td>
                                    <td class="text-left" style="vertical-align: middle;">
                                        {{ $s->nama }}
                                    </td>
                                    <td class="text-right" style="vertical-align: middle; ">
                                        {{ 'Rp ' . number_format($spp + $tambah - $kurang, 2, ',', '.') }}</td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        {{ $terbayar }}</td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        {{ $bulan_akhir }}
                                    </td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <a data-toggle="modal" data-target="#plusadmin{{ $s->id }}"
                                            class="btn btn-circle btn-sm btn-primary tombol-plus">
                                            <span class="icon text-white-100">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </a>
                                        <a @if ($user->role == 'wali kelas') href="/siswa/spp/siswa/{{ $s->id }}"
                                        @else
                                        href="/keuangan/pembayaran_spp/siswa/{{ $s->id }}" @endif
                                            class="btn btn-circle btn-sm btn-warning">
                                            <span class="icon text-white-100">
                                                <i class="fas fa-exclamation-circle"></i>
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
                                                <h5 class="modal-title" id="plusadminLabel">Pembayaran SPP Siswa</h5>
                                                <a class="close" aria-label="Close" data-dismiss="modal">
                                                    <i aria-hidden="true">&times;</i>
                                                </a>
                                            </div>
                                            <form action="/keuangan/pembayaran_spp/bayar" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <input type="hidden" class="form-control" id="idkelasaktif"
                                                            name="idkelasaktif" value="{{ $kelas_aktif_id }}">
                                                        <input type="hidden" class="form-control" id="idsiswa"
                                                            name="idsiswa" value="{{ $s->id }}">
                                                        <input type="text" class="form-control" id="nama"
                                                            name="nama" value="{{ $s->nama }}" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" id="nominal"
                                                            name="nominal" readonly
                                                            value="{{ 'Rp ' . number_format($spp + $tambah - $kurang, 0, ',', '.') }}"
                                                            required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <select name="bulan" id="bulan" class="form-control"
                                                            required>
                                                            @if ($bulan_akhir == null)
                                                                <option value="{{ $bulan_akhir_id }}">
                                                                    {{ $bulan[0]->bulan }}
                                                                </option>
                                                            @else
                                                                @if ($bulan_akhir_id > 11)
                                                                    <option value="">
                                                                        {{ $bulan[11]->bulan }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $bulan_akhir_id + 1 }}">
                                                                        {{ $bulan[$bulan_akhir_id]->bulan }}
                                                                    </option>
                                                                @endif
                                                            @endif
                                                            @foreach ($bulan as $b)
                                                                <option value="{{ $b->id }}">{{ $b->bulan }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" id="catatan"
                                                            name="catatan" placeholder="Keterangan tambahan">
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-secondary" data-dismiss="modal"
                                                        style="background-color: #d03672; border-color: #d03672;">Tutup</a>
                                                    <button type="submit" class="btn btn-primary"
                                                        style="background-color: #226462; border-color: #226462;">Tambah</button>
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
                    <?php foreach ($siswa as $s) : ?>
                    <?php
                    $spp = 0;
                    $tambah = 0;
                    $kurang = 0;
                    $terbayar = 0;
                    $bulan_akhir = null;
                    $bulan_akhir_id = 1;
                    foreach ($spp_siswa as $as) {
                        if ($s->tingkat == $as->tingkat) {
                            $spp = $as->biaya;
                        }
                    }
                    foreach ($perubahan as $p) {
                        if ($s->id == $p->siswa_id) {
                            $tambah = $p->tambah;
                            $kurang = $p->kurang;
                        }
                    }
                    foreach ($spp_terbayar as $st) {
                        if ($s->id == $st->siswa_id) {
                            $terbayar = $st->total;
                        }
                    }
                    foreach ($spp_terbayar_akhir as $sta) {
                        if ($s->id == $sta->siswa_id) {
                            $bulan_akhir = $sta->bulan;
                            $bulan_akhir_id = $sta->bulan_id;
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
                                {{ 'Rp ' . number_format($spp + $tambah - $kurang, 2, ',', '.') }}</p>
                            <p style="margin-top:-18px;">- Total : {{ $terbayar }} Bulan</p>
                            <p style="margin-top:-18px;">- Bulan terakhir : {{ $bulan_akhir }}</p>

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
                                <a class="dropdown-item text-gray-800"
                                    @if ($user->role == 'wali kelas') href="/siswa/spp/siswa/{{ $s->id }}"
                                    @else
                                    href="/keuangan/pembayaran_spp/siswa/{{ $s->id }}" @endif>
                                    Info
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
                                    <h5 class="modal-title" id="plusadminLabel">Pembayaran SPP Siswa</h5>
                                    <a class="close" aria-label="Close" data-dismiss="modal">
                                        <i aria-hidden="true">&times;</i>
                                    </a>
                                </div>
                                <form action="/keuangan/pembayaran_spp/bayar" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <input type="hidden" class="form-control" id="idkelasaktif"
                                                name="idkelasaktif" value="{{ $kelas_aktif_id }}">
                                            <input type="hidden" class="form-control" id="idsiswa" name="idsiswa"
                                                value="{{ $s->id }}">
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                value="{{ $s->nama }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="nominal" name="nominal"
                                                readonly
                                                value="{{ 'Rp ' . number_format($spp + $tambah - $kurang, 0, ',', '.') }}"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <select name="bulan" id="bulan" class="form-control" required>
                                                @if ($bulan_akhir == null)
                                                    <option value="{{ $bulan_akhir_id }}">
                                                        {{ $bulan[0]->bulan }}
                                                    </option>
                                                @else
                                                    @if ($bulan_akhir_id > 11)
                                                        <option value="">
                                                            {{ $bulan[11]->bulan }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $bulan_akhir_id + 1 }}">
                                                            {{ $bulan[$bulan_akhir_id]->bulan }}
                                                        </option>
                                                    @endif
                                                @endif
                                                @foreach ($bulan as $b)
                                                    <option value="{{ $b->id }}">{{ $b->bulan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="catatan" name="catatan"
                                                placeholder="Keterangan tambahan">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-secondary" data-dismiss="modal"
                                            style="background-color: #d03672; border-color: #d03672;">Tutup</a>
                                        <button type="submit" class="btn btn-primary"
                                            style="background-color: #226462; border-color: #226462;">Tambah</button>
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

    <!-- End of Main Content -->

    @if ($kelas_aktif_id == 'all')
        <script>
            const hapusperubahan = document.querySelectorAll(".hapusperubahan");
            hapusperubahan.forEach(function(button) {
                button.addEventListener("click", function() {
                    // Dapatkan data ID siswa dari atribut data
                    var idperubahan = this.getAttribute("data-idperubahan");
                    fetch('/keuangan/info_spp/all/hapus?idperubahan=' + idperubahan)
                });
            });
        </script>
    @else
        <script>
            const hapusperubahan = document.querySelectorAll(".hapusperubahan");
            hapusperubahan.forEach(function(button) {
                button.addEventListener("click", function() {
                    // Dapatkan data ID siswa dari atribut data
                    var idperubahan = this.getAttribute("data-idperubahan");
                    fetch('/keuangan/info_spp/' + {{ $kelas_aktif_id }} + '/hapus?idperubahan=' + idperubahan)
                });
            });
        </script>
    @endif
@endsection
