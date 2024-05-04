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
                    <span class="text">Pilih Bulan</span>
                    <span class="icon text-white-50">
                        <i class="fas fa-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-center" aria-labelledby="userDropdown">
                    <?php foreach ($bulan as $k) : ?>
                    <a class="dropdown-item" href="/siswa/fisik/{{ $k->id }}">
                        <?= $k['bulan'] ?>
                    </a>
                    <?php endforeach; ?>
                </div>
                <a class="btn btn-info btn-icon-split">
                    <span class="text">{{ $bulan_aktif->bulan }}</span>
                </a>
            </div>
            @can('walas')
                <div class="col-lg-4 mb-3">
                    <form action="/siswa/fisik/{{ $bulan_aktif->id }}" method="get">
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
            @endcan
        </div>

        <div>
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Perkembangan Fisik Siswa Kelas
                        {{ $kelas->kelas }}</h6>
                </div>
                <div class="card-body side-com">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    @can('walas')
                                        <th rowspan="2" style="vertical-align: middle; width: 5%;">No</th>
                                        <th rowspan="2" style="vertical-align: middle; width: 30%;">Siswa</th>
                                    @endcan
                                    <th colspan="3" style="vertical-align: middle;">Perkembangan Fisik
                                    </th>
                                    @can('walas')
                                        <th rowspan="2" style="vertical-align: middle; width: 10%;">Action
                                        </th>
                                    @endcan
                                </tr>
                                <tr>
                                    <th class="text-center" style="vertical-align: middle;">
                                        Tinggi Badan (cm)</th>
                                    <th class="text-center" style="vertical-align: middle;">Berat
                                        Badan (kg)</th>
                                    <th class="text-center" style="vertical-align: middle;">
                                        Lingkar Kepala (cm)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($siswa as $k) : ?>
                                <?php
                                $tb = 0;
                                $bb = 0;
                                $lk = 0;
                                foreach ($fisik as $f) {
                                    if ($f->siswa_id == $k->id) {
                                        $tb = $f->tb;
                                        $bb = $f->bb;
                                        $lk = $f->lk;
                                    }
                                }
                                ?>
                                <tr>
                                    @can('walas')
                                        <td class="text-center" style="vertical-align: middle;"><?= $i ?></td>
                                        <td class="text-left" style="vertical-align: middle;">
                                            {{ $k->nama }}
                                        </td>
                                    @endcan

                                    <td class="text-center" style="vertical-align: middle;">
                                        {{ $tb }}</td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        {{ $bb }}</td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        {{ $lk }}</td>
                                    @can('walas')
                                        <td class="text-center">
                                            <a style="background-color: #d0e2a8; border-color: #d0e2a8;" data-toggle="modal"
                                                data-target="#fisik" class="btn btn-circle btn-sm btn-primary datafisik"
                                                data-idsiswa="{{ $k->id }}" data-nama="{{ $k->nama }}"
                                                data-tb="{{ $tb }}" data-bb="{{ $bb }}"
                                                data-lk="{{ $lk }}">
                                                <span class="icon text-white-100">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                            </a>
                                        </td>
                                    @endcan
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-body side-hp">
                    <?php $i = 1; ?>
                    <?php foreach ($siswa as $k) : ?>
                    <?php
                    $tb = 0;
                    $bb = 0;
                    $lk = 0;
                    foreach ($fisik as $f) {
                        if ($f->siswa_id == $k->id) {
                            $tb = $f->tb;
                            $bb = $f->bb;
                            $lk = $f->lk;
                        }
                    }
                    ?>
                    <div class="text-hp topFileSiswa" id="topFile"
                        style="display:flex; margin-top:-10px; position:relative;">
                        <div style="width:10vw;">
                            <div><?= $i ?></div>
                        </div>
                        <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <p>{{ $k->nama }}</p>
                            <p style="margin-top:-18px;">Perkembangan Fisik : </p>
                            <p style="margin-top:-18px;">- Tinggi : {{ $tb }} cm</p>
                            <p style="margin-top:-18px;">- Berat : {{ $bb }} kg</p>
                            <p style="margin-top:-18px;">- Lingkar kepala : {{ $lk }} cm</p>

                        </div>
                        @can('walas')
                            <div class="btnMenuSiswa" style="width:10vw; display: flex; justify-content:right;"
                                id="btnMenuSiswa" data-idsiswa="{{ $k->id }}">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>
                            <div class="menuSiswaD"
                                style="display:none; position:absolute; right:0; top:0; z-index: 9; background-color:white;"
                                id="menuSiswaD{{ $k->id }}">
                                <div class="shadow" style="border-radius:5px;">
                                    <a class="dropdown-item text-gray-800 datafisik" data-toggle="modal" data-target="#fisik"
                                        data-idsiswa="{{ $k->id }}" data-nama="{{ $k->nama }}"
                                        data-tb="{{ $tb }}" data-bb="{{ $bb }}"
                                        data-lk="{{ $lk }}">
                                        Tambah
                                    </a>

                                </div>

                            </div>
                        @endcan

                    </div>
                    <hr style="background-color: white; margin-top:-10px;">
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>



    <!-- Modal Fisik -->
    <div class="modal fade" id="fisik" tabindex="-1" role="dialog" aria-labelledby="fisikLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fisikLabel">Perkembangan Fisik</h5>
                    <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/siswa/fisik/tambah" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-2">
                            <label>Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" readonly>
                            <input type="hidden" class="form-control" id="idsiswa" name="idsiswa">
                            <input type="hidden" class="form-control" id="idbulan" name="idbulan"
                                value="{{ $bulan_aktif->id }}">
                        </div>
                        <div class="mb-2">
                            <label>Tinggi Badan</label>
                            <input type="text" class="form-control" id="tb" name="tb">
                        </div>
                        <div class="mb-2">
                            <label>Berat Badan</label>
                            <input type="text" class="form-control" id="bb" name="bb">
                        </div>
                        <div class="mb-2">
                            <label>Lingkar Kepala</label>
                            <input type="text" class="form-control" id="lk" name="lk">
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

    <script>
        const datafisik = document.querySelectorAll(".datafisik");
        datafisik.forEach(function(button) {
            button.addEventListener("click", function() {
                // Dapatkan data ID siswa dari atribut data
                var idsiswa = this.getAttribute("data-idsiswa");
                var nama = this.getAttribute("data-nama");
                var tb = this.getAttribute("data-tb");
                var bb = this.getAttribute("data-bb");
                var lk = this.getAttribute("data-lk");
                $('#idsiswa').val(idsiswa);
                $('#nama').val(nama);
                $('#tb').val(tb);
                $('#bb').val(bb);
                $('#lk').val(lk);
            });
        });
    </script>
@endsection
