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
                <a data-toggle="modal" data-target="#newSubMenuModal" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah</span>
                </a>
                <a data-toggle="modal" data-target="#ubahkelas" class="btn btn-info btn-icon-split ubahDataKelas">
                    <span class="icon text-white-50">
                        <i class="fas fa-recycle"></i>
                    </span>
                    <span class="text">Ubah</span>
                </a>
                <a data-toggle="modal" data-target="#hapuskelas" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">Hapus</span>
                </a>
            </div>
            <div class="col-lg-4 mb-3">
                <form action="/dashboard/kelas" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 small" id="cari_kelas" name="cari_kelas"
                            placeholder="Cari kelas..." aria-label="Search" aria-describedby="basic-addon2">
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
                </div>
                <div class="card-body side-com">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th></th>
                                    <th>No</th>
                                    <th>Nama Kelas</th>
                                    <th>Tingkat Pendidikan</th>
                                    <th>Guru Kelas</th>
                                    <th>Ruang</th>
                                    <th>Siswa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($kelas as $k)
                                    <tr>
                                        <td class="text-center" style="vertical-align: top;">
                                            <div class="form-check">
                                                <input type="radio" name="kelas" id="kelas"
                                                    class="form-check-input idkelas" data-idkelas="{{ $k->id }}"
                                                    data-kelas="{{ $k->kelas }}" data-tingkat="{{ $k->tingkat }}"
                                                    data-tendik="{{ $k->nama_tendik }}" data-ruang="{{ $k->ruang }}">
                                            </div>
                                        </td>
                                        <td style="vertical-align: middle;" class="text-center">
                                            {{ $i }}</td>
                                        <td style="vertical-align: middle;">{{ $k->kelas }}</td>
                                        <td style="vertical-align: middle;" class="text-center">
                                            {{ $k->tingkat }}
                                        </td>
                                        <td style="vertical-align: middle;">{{ $k->tendik->nama }}</td>
                                        <td style="vertical-align: middle;" class="text-center">
                                            {{ $k->ruang }}</td>
                                        <td style="vertical-align: middle;" class="text-center">
                                            <a data-toggle="modal" data-target="#inclass"
                                                class="btn btn-circle btn-sm tombol-plus idkelas"
                                                data-idkelas="{{ $k->id }}">
                                                <span class="icon text-white">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                            </a>
                                            <a href="/dashboard/kelas/kelas_siswa/{{ $k->tendik->id }}"
                                                class="btn btn-circle btn-sm tombol-info infoSiswa">
                                                <span class="icon text-white">
                                                    <i class="fas fa-exclamation-circle"></i>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-body side-hp">
                    <?php $i = 1; ?>
                    @foreach ($kelas as $k)
                        <div class="topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative; font-size:14px;">
                            <div style="width:10vw;">
                                <div><?= $i ?></div>
                                <div class="form-check">
                                    <input type="radio" name="kelas" id="kelas" class="form-check-input idkelas"
                                        data-idkelas="{{ $k->id }}" data-kelas="{{ $k->kelas }}"
                                        data-tingkat="{{ $k->tingkat }}" data-tendik="{{ $k->nama_tendik }}"
                                        data-ruang="{{ $k->ruang }}">
                                </div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p>Kelas : {{ $k->kelas }} ( {{ $k->tingkat }} )</p>
                                <p style="margin-top:-18px;">Guru Kelas : {{ $k->nama_tendik }}</p>
                                <p style="margin-top:-18px;">Ruang : {{ $k->ruang }}</p>
                            </div>
                            <div class="btnMenuSiswa" style="width:10vw; display: flex; justify-content:right;"
                                id="btnMenuSiswa" data-idsiswa="{{ $k->id }}">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>
                            <div class="menuSiswaD shadow"
                                style="display:none; position:absolute; right:0; top:0; z-index:3; background-color:white;"
                                id="menuSiswaD{{ $k->id }}">
                                <div style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                    <a class="dropdown-item" href="/dashboard/kelas/kelas_siswa/{{ $k->tendik->id }}">
                                        Info Siswa
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item idkelas" data-idkelas="{{ $k->id }}"
                                        data-toggle="modal" data-target="#inclass">
                                        Tambah Siswa
                                    </a>
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


    <!-- Modal Tambah Data Kelas -->
    <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/dashboard/kelas/tambah_kelas" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="text" class="form-control" required id="kelas" name="kelas"
                                placeholder="Nama Kelas">
                        </div>
                        <div class="mb-3">
                            <select id="tingkat" name="tingkat" class="form-control" required>
                                <option value="">Tingkat Pendidikan</option>
                                <option value="TK A">TK A</option>
                                <option value="TK B">TK B</option>
                                <option value="KB A">KB A</option>
                                <option value="KB B">KB B</option>
                                <option value="Day care">Day Care</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select name="tendik_id" id="tendik_id" class="form-control" required>
                                <option value="">Wali Kelas</option>
                                @foreach ($walas as $w)
                                    <option value="{{ $w->id }}">{{ $w->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="ruang" name="ruang"
                                placeholder="Ruang" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Masukan Siswa ke Kelas -->
    <div class="modal fade" id="inclass" tabindex="-1" role="dialog" aria-labelledby="inclassLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inclassLabel">Daftar Siswa</h5>
                    <a href="/dashboard/kelas" type="button" class="close" id="close" aria-label="Close">
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
                                        <?php foreach ($siswa as $s) : ?>
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
                        <a href="/dashboard/kelas" type="button" class="btn btn-secondary tutup">Tutup</a>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Ubah Data Kelas -->
    <div class="modal fade" id="ubahkelas" tabindex="-1" role="dialog" aria-labelledby="ubahkelasLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header mb-3">
                    <h5 class="modal-title" id="ubahkelasLabel">Ubah Data Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/dashboard/kelas/ubah_kelas" method="POST">
                    @csrf
                    <div class="container">
                        <div class="form-group row">
                            <label for="sekolah" class="col-sm-2 col-form-label">Kelas</label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="idkelasUbah" name="idkelasUbah">
                                <input type="text" class="form-control" id="kelasUbah" name="kelasUbah" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sekolah" class="col-sm-2 col-form-label">Tingkat</label>
                            <div class="col-sm-10">
                                <select type="text" class="form-control" id="tingkatUbah" name="tingkatUbah"
                                    required>
                                    <option value="">Tingkat Pendidikan</option>
                                    <option value="TK A">TK A</option>
                                    <option value="TK B">TK B</option>
                                    <option value="KB A">KB A</option>
                                    <option value="KB B">KB B</option>
                                    <option value="Day care">Day Care</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sekolah" class="col-sm-2 col-form-label">Ruang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ruangUbah" name="ruangUbah" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <a class="btn btn-secondary" data-dismiss="modal">Tutup</a>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Hapus Data Kelas -->
    <div class="modal fade" id="hapuskelas" tabindex="-1" role="dialog" aria-labelledby="hapuskelasLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header mb-3">
                    <h5 class="modal-title" id="hapuskelasLabel">Hapus Data Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/dashboard/kelas/hapus_kelas" method="POST">
                    @csrf
                    <div class="container">
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="idkelasHapus" name="idkelasHapus">
                                <p>Yakin ingin menghapus kelas <span id="kelashapus"></span> ?</p>
                                <p style="margin-top: -10px"><i>Semua siswa yang ada di kelas ini akan tidak memiliki
                                        kelas</i></p>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <a class="btn btn-secondary" data-dismiss="modal">Tutup</a>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
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
