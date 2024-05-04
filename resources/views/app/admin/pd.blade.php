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
                <a data-toggle="modal" data-target="#hapussiswa" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">Hapus</span>
                </a>
                <a href="/dashboard/pd/unduh/all" class="btn btn-secondary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-download"></i>
                    </span>
                    <span class="text">Unduh</span>
                </a>
                <a data-toggle="modal" data-target="#lulussiswa" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-users"></i>
                    </span>
                    <span class="text">Lulus</span>
                </a>
            </div>
            <div class="col-lg-4 mb-3">
                <form action="/dashboard/pd" method="get">
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
                    <h6 class="m-0 font-weight-bold text-primary">Peserta Didik</h6>
                </div>
                <div class="card-body side-com">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th style="width:4% ;"></th>
                                    <th style="width:4% ;">No</th>
                                    <th style="width:24% ;">Nama</th>
                                    <th style="width:8% ;">Tingkat</th>
                                    <th style="width:13% ;">Tempat</th>
                                    <th style="width:13% ;">Tgl Lahir</th>
                                    <th style="width:18% ;">Kelas</th>
                                    <th style="width:26% ;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($siswa as $s)
                                    <?php
                                    $kelasId = optional($s->masukKelas)->kela_id;
                                    
                                    if ($kelasId !== null) {
                                        // Siswa memiliki relasi dengan masuk kelas.
                                        $kelas = $s->masukKelas->kelas->kelas;
                                    } else {
                                        // Siswa tidak memiliki relasi dengan masuk kelas.
                                        $kelas = '';
                                    }
                                    
                                    ?>
                                    <tr>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input idSiswa"
                                                    data-idsiswa="{{ $s->id }}" {{ cek_idsiswa($s->id) }}>
                                            </div>
                                        </td>
                                        <td style="vertical-align: middle;" class="text-center"><?= $i ?>
                                        </td>
                                        <td style="vertical-align: middle;">{{ $s->nama }}</td>
                                        <td style="vertical-align: middle;" class="text-center text-uppercase">
                                            {{ $s->tingkat }}</td>
                                        <td style="vertical-align: middle;" class="text-center">
                                            {{ $s->tempat }}</td>
                                        <td style="vertical-align: middle;" class="text-center">
                                            {{ date('d-m-Y', strtotime($s->lahir)) }}</td>
                                        <td style="vertical-align: middle;">{{ $kelas }}
                                        </td>
                                        <td style="vertical-align: middle;" class="text-center">
                                            <a href="/dashboard/pd/detail/{{ $s->id }}" type="button"
                                                class="btn btn-circle btn-sm tombol-info mr-1">
                                                <span class="icon text-white">
                                                    <i class="fas fa-exclamation-circle"></i>
                                                </span>
                                            </a><a href="/dashboard/pd/ubah/{{ $s->id }}" type="button"
                                                class="btn btn-circle btn-sm tombol-edit">
                                                <span class="icon text-white">
                                                    <i class="fas fa-recycle"></i>
                                                </span>
                                            </a>
                                            </a><a href="/dashboard/pd/print/{{ $s->id }}" type="button" class="btn btn-circle btn-sm tombol-min">
                                                <span class="icon text-white">
                                                    <i class="fas fa-print"></i>
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
                    @foreach ($siswa as $s)
                        <?php
                        $kelasId = optional($s->masukKelas)->kela_id;
                        
                        if ($kelasId !== null) {
                            // Siswa memiliki relasi dengan masuk kelas.
                            $kelas = $s->masukKelas->kelas->kelas;
                        } else {
                            // Siswa tidak memiliki relasi dengan masuk kelas.
                            $kelas = '';
                        }
                        
                        ?>
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
                                <p style="margin-top:-18px;"><span class="text-uppercase">{{ $s->tingkat }}</span>
                                    ({{ $kelas }})
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
                                    <a class="dropdown-item text-gray-800"
                                        href="/dashboard/pd/detail/{{ $s->id }}">
                                        Info
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-gray-800" href="/dashboard/pd/ubah/{{ $s->id }}">
                                        Ubah
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-gray-800" href="/dashboard/pd/print/{{ $s->id }}">
                                        Print
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

    <div class="modal fade" id="hapussiswa" tabindex="-1" role="dialog" aria-labelledby="hapussiswaLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapussiswaLabel">Hapus Siswa</h5>
                    <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/dashboard/pd/hapus" method="GET">

                    <div class="modal-body">
                        <div class="mb-2">
                            <label>Yakin ingin menghapus siswa yang dipilih ?</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Lanjut</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="lulussiswa" tabindex="-1" role="dialog" aria-labelledby="lulussiswaLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lulussiswaLabel">Siswa Lulus</h5>
                    <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/dashboard/pd/lulus" method="GET">
                    <div class="modal-body">
                        <div class="mb-2">
                            <label>Lanjut memesukkan siswa ke daftar lulus ?</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Lanjut</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


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
