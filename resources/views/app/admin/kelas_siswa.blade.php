<?php
function cek_idsiswa($id)
{
    $query = DB::select('SELECT * FROM id_siswas WHERE siswa_id = ' . $id);
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
                <a href="/dashboard/pd/unduh/{{ $kelas->tendik_id }}" class="btn btn-secondary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-download"></i>
                    </span>
                    <span class="text">Unduh</span>
                </a>
                <a class="btn btn-info btn-icon-split" data-toggle="modal" data-target="#naikkelas">
                    <span class="icon text-white-50">
                        <i class="fas fa-home"></i>
                    </span>
                    <span class="text">Naik Kelas</span>
                </a>
                @can('walas')
                    <a href="/dashboard/pd/unduh" class="btn btn-primary btn-icon-split idkelas"
                        data-idkelas="{{ $kelas->id }}" data-toggle="modal" data-target="#inclass">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Siswa</span>
                    </a>
                @endcan
            </div>
            <div class="col-lg-4 mb-3">
                @if ($user->role == 'wali kelas')
                    <form action="/siswa/kelas/{{ $user->id }}" method="get">
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
                    <form action="/dashboard/kelas/kelas_siswa/{{ $kelas->tendik_id }}" method="get">
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
                    <h6 class="m-0 font-weight-bold text-primary text-capitalize">Daftar Peserta Didik
                        Kelas {{ $kelas->kelas }}</h6>
                </div>

                <div class="card-body side-com">
                    <h6>Wali Kelas :
                        {{ $kelas->tendik->nama }}</h6>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th style="width:4% ;">No</th>
                                    <th style="width:28% ;">Nama</th>
                                    <th style="width:6% ;">Jk</th>
                                    <th style="width:14% ;">NIS</th>
                                    <th style="width:13% ;">Tempat</th>
                                    <th style="width:13% ;">Tgl Lahir</th>
                                    <th style="width:24% ;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($siswa as $s)
                                    <tr>
                                        <td style="vertical-align: middle;" class="text-center"><?= $i ?>
                                        </td>
                                        <td style="vertical-align: middle;">{{ $s->nama }}</td>
                                        <td style="vertical-align: middle;" class="text-center text-uppercase">
                                            {{ $s->jk }}</td>
                                        <td style="vertical-align: middle;" class="text-center text-uppercase">
                                            {{ $s->nis }}</td>
                                        <td style="vertical-align: middle;" class="text-center">
                                            {{ $s->tempat }}</td>
                                        <td style="vertical-align: middle;" class="text-center">
                                            {{ date('d-m-Y', strtotime($s->lahir)) }}</td>
                                        <td style="vertical-align: middle;" class="text-center">
                                            <a type="button" data-toggle="modal" data-target="#keluar{{ $s->id }}"
                                                class="btn btn-circle btn-sm tombol-min">
                                                <span class="icon text-white">
                                                    <i class="fas fa-sign-out-alt"></i>
                                                </span>
                                            </a>
                                            <a href="/dashboard/pd/ubah/{{ $s->id }}" type="button"
                                                class="btn btn-circle btn-sm tombol-edit">
                                                <span class="icon text-white">
                                                    <i class="fas fa-recycle"></i>
                                                </span>
                                            </a>
                                            </a>
                                            <a href="/dashboard/pd/print/{{ $s->id }}" type="button"
                                                class="btn btn-circle btn-sm tombol-min">
                                                <span class="icon text-white">
                                                    <i class="fas fa-print"></i>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="keluar{{ $s->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="keluar{{ $s->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="keluar{{ $s->id }}Label">Keluarkan
                                                        Siswa</h5>
                                                    <button type="button" class="close" id="close"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form action="/dashboard/kelas/keluar_kelas" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="hidden" class="form-control" id="id_siswa"
                                                            name="id_siswa" value="{{ $s->id }}">
                                                        <input type="hidden" class="form-control" id="id_kelas"
                                                            name="id_kelas" value="{{ $kelas->id }}">
                                                        <div class="mb-2">
                                                            <label>Lanjut mengeluarkan siswa dari kelas ?</label>
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

                                    <?php $i++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-body side-hp">
                    <?php $i = 1; ?>
                    @foreach ($siswa as $s)
                        <div class="text-white topFileSiswa text-gray-600" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative; font-size:14px;">
                            <div style="width:10vw;">
                                <div>{{ $i }}</div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input idSiswa"
                                        data-idsiswa="{{ $s->id }}" {{ cek_idsiswa($s->id) }}>
                                </div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p>{{ $s->nama }}</p>
                                <p style="margin-top:-18px;">NIS : {{ $s->nis }}
                                </p>
                                <p style="margin-top:-18px;">{{ $s->tempat }},
                                    {{ date('d-m-Y', strtotime($s->lahir)) }}</p>
                            </div>
                            <div class="btnMenuSiswa" style="width:10vw; display: flex; justify-content:right;"
                                id="btnMenuSiswa" data-idsiswa="{{ $s->id }}">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>

                            <div class="menuSiswaD shadow"
                                style="display:none; position:absolute; right:0; top:0; z-index:3; background-color:white;"
                                id="menuSiswaD{{ $s->id }}">

                                <div style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                    <a class="dropdown-item text-gray-800" data-toggle="modal"
                                        data-target="#keluarhp{{ $s->id }}">
                                        Keluar
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-gray-800" href="/dashboard/pd/ubah/{{ $s->id }}">
                                        Ubah
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-gray-800"
                                        href="/dashboard/pd/print/{{ $s->id }}">
                                        Print
                                    </a>
                                </div>
                            </div>

                        </div>
                        <hr style="background-color: white; margin-top:-10px;">
                        <div class="modal fade" id="keluarhp{{ $s->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="keluar{{ $s->id }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="keluar{{ $s->id }}Label">Keluarkan
                                            Siswa</h5>
                                        <button type="button" class="close" id="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <form action="/dashboard/kelas/keluar_kelas" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" class="form-control" id="id_siswa" name="id_siswa"
                                                value="{{ $s->id }}">
                                            <input type="hidden" class="form-control" id="id_kelas" name="id_kelas"
                                                value="{{ $kelas->id }}">
                                            <div class="mb-2">
                                                <label>Lanjut mengeluarkan siswa dari kelas ?</label>
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
                        <?php $i++; ?>
                    @endforeach
                </div>


                <div class="card-body side-hp">
                    <?php $i = 1; ?>
                    @foreach ($siswa as $s)
                        <div class="topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative; font-size: 14px;">
                            <div style="width:10vw;">
                                <div>{{ $i }}</div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p>{{ $s->nama }}</p>
                                <p style="margin-top:-18px;">{{ $kelas->tingkat }} ,({{ $kelas->kelas }})</p>
                                <p style="margin-top:-18px;">{{ $s->tempat }},
                                    <?= date('d-m-Y', strtotime($s->lahir)) ?></p>
                            </div>
                            <div class="btnMenuSiswa" style="width:10vw; display: flex; justify-content:right;"
                                id="btnMenuSiswa" data-idsiswa="{{ $s->id }}">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>
                            <div class="menuSiswaD shadow"
                                style="display:none; position:absolute; right:0; top:0; z-index:3; background-color:white;"
                                id="menuSiswaD{{ $s->id }}">

                                <div style="border-radius:10px; padding-top:10px; padding-bottom:10px;">

                                    <div class="dropdown-item text-gray-800">
                                        <form action="/dashboard/kelas/keluar_kelas" method="POST">
                                            @csrf
                                            <input type="hidden" class="form-control" id="id_siswa" name="id_siswa"
                                                value="{{ $s->id }}">
                                            <input type="hidden" class="form-control" id="id_kelas" name="id_kelas"
                                                value="{{ $kelas->id }}">
                                            <button type="submit" class="dropdown-item">
                                                Keluarkan
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr style="background-color: white; margin-top:-10px;">
                        <?php $i++; ?>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

    <!-- Modal Masukan Siswa ke Kelas -->
    <div class="modal fade" id="naikkelas" tabindex="-1" role="dialog" aria-labelledby="naikkelasLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="naikkelasLabel">Naik Kelas</h5>
                    <a data-dismiss="modal" type="button" class="close" id="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <form action="/dashboard/kelas/naikkelas" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-control">
                            <p>Yakin ingin menaikkan kelas siswa ?</p>
                        </div>
                        <input type="hidden" id="idkelas" name="idkelas" value="{{ $kelas->id }}">
                    </div>
                    <div class="modal-footer">
                        <a data-dismiss="modal" type="button" class="btn btn-secondary tutup">Tutup</a>
                        <button type="submit" class="btn btn-primary">Lanjut</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="inclass" tabindex="-1" role="dialog" aria-labelledby="inclassLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inclassLabel">Daftar Siswa</h5>
                    <a href="/siswa/kelas/{{ $kelas->tendik->id }}" type="button" class="close" id="close"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <form action="/dashboard/kelas/masuk" method="GET">
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control small cariSiswa" style="color: grey;"
                                    id="carisiswa" name="carisiswa" placeholder="Cari siswa..." autocomplete="off"
                                    aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="idmasukkelas" name="idmasukkelas">
                        <div id="cariSiswaKelas">
                            <div class="table-responsive" id="tabelpd">
                                <table class="table table-bordered" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Siswa</th>
                                            <th scope="col">NIK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($siswa_baru as $s) : ?>
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input idSiswa"
                                                        data-idsiswa="{{ $s->id }}" {{ cek_idsiswa($s->id) }}>
                                                </div>
                                            </th>

                                            <td>{{ $s->nama }}</td>
                                            <td class="text-center">{{ $s->nik }}</td>
                                        </tr>

                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="/siswa/kelas/{{ $kelas->tendik->id }}" type="button"
                            class="btn btn-secondary tutup">Tutup</a>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const saveIdKelas = document.querySelectorAll(".idkelas");
        saveIdKelas.forEach(function(button) {
            button.addEventListener("click", function() {
                var id_kelas = this.getAttribute("data-idkelas");
                $('#idmasukkelas').val(id_kelas);
            });
        });
    </script>
    <script>
        const idKelas = document.querySelectorAll(".idkelas");
        idKelas.forEach(function(button) {
            button.addEventListener("click", function() {
                // Dapatkan data ID siswa dari atribut data
                var id_kelas = this.getAttribute("data-idkelas");
                var kelas = this.getAttribute("data-kelas");
                var tingkat = this.getAttribute("data-tingkat");
                var tendik = this.getAttribute("data-tendik");
                var ruang = this.getAttribute("data-ruang");
                $('#idkelasUbah').val(id_kelas);
                $('#idkelasHapus').val(id_kelas);
                $('#kelasUbah').val(kelas);
                $('#tingkatUbah').val(tingkat);
                $('#ruangUbah').val(ruang);
                document.getElementById('kelashapus').innerHTML = kelas;
            });
        });
    </script>
    <script>
        var cariSiswa = document.getElementById('carisiswa');
        var test = document.getElementById('cariSiswaKelas');

        cariSiswa.addEventListener('keyup', function() {

            var xhr = new XMLHttpRequest();
            var url = "/dashboard/kelas/cari_siswa_kelas?key=" + cariSiswa.value;
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // console.log(xhr.responseText);
                    test.innerHTML = xhr.responseText;
                    const idSiswa = document.querySelectorAll(".idSiswa");
                    idSiswa.forEach(function(button) {
                        button.addEventListener("click", function() {
                            // Dapatkan data ID siswa dari atribut data
                            var id_siswa = this.getAttribute("data-idsiswa");
                            fetch('/dashboard/pd/tambah_idsiswa?idsiswa=' + id_siswa)
                        });
                    });
                }
            };
            xhr.open("GET", url, true);
            xhr.send();
        });
    </script>
    <script>
        const idSiswa = document.querySelectorAll(".idSiswa");
        idSiswa.forEach(function(button) {
            button.addEventListener("click", function() {
                // Dapatkan data ID siswa dari atribut data
                var id_siswa = this.getAttribute("data-idsiswa");
                fetch('/dashboard/pd/tambah_idsiswa?idsiswa=' + id_siswa)
            });
        });
    </script>
@endsection
