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
            <div class="col-lg-4 mb-3">
                <a class="btn btn-info btn-icon-split" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="text">Tahun Lulus</span>
                    <span class="icon text-white-50">
                        <i class="fas fa-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-center" aria-labelledby="userDropdown">
                    <a href="/dashboard/daftar_lulus/all" class="dropdown-item text-center">
                        Semua Siswa
                    </a>
                    <div class="dropdown-divider"></div>
                    @foreach ($tahun_lulus as $tl)
                        <a href="/dashboard/daftar_lulus/{{ $tl->tahun }}" class="dropdown-item text-center">
                            {{ $tl->tahun }}
                        </a>
                        <div class="dropdown-divider"></div>
                    @endforeach
                </div>
                <a class="btn btn-info btn-icon-split">
                    @if ($tahun_aktif == 'all')
                        <span class="text">Semua Siswa</span>
                    @else
                        <span class="text">{{ $tahun_aktif }}</span>
                    @endif
                </a>

            </div>
            <div class="col-lg-4 mb-3 text-align-hp">
                <a data-toggle="modal" data-target="#hapuslulus" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">Hapus</span>
                </a>
            </div>
            <div class="col-lg-4 mb-3">
                <form action="/dashboard/daftar_lulus/{{ $tahun_aktif }}" method="get">
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
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Lulus Siswa</h6>
                </div>
                <div class="card-body side-com">
                    <div class="table-responsive" id="tabelpd">
                        <table class="table table-bordered" cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th style="width:5% ;">No</th>
                                    <th style="width:25% ;">Nama</th>
                                    <th style="width:8% ;">Tingkat</th>
                                    <th style="width:10% ;">Tempat</th>
                                    <th style="width:13% ;">Tgl Lahir</th>
                                    <th style="width:23% ;">Kelas</th>
                                    <th style="width:15% ;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($siswa as $s)
                                    <tr>

                                        <td style="vertical-align: middle;" class="text-center"><?= $i ?>
                                        </td>
                                        <td style="vertical-align: middle;">{{ $s->nama }}</td>
                                        <td style="vertical-align: middle;" class="text-center">
                                            {{ $s->tingkat }}</td>
                                        <td style="vertical-align: middle;" class="text-center">
                                            {{ $s->tempat }}</td>
                                        <td style="vertical-align: middle;" class="text-center">
                                            {{ date('d-m-Y', strtotime($s->lahir)) }}</td>
                                        <td style="vertical-align: middle;"></td>
                                        <td style="vertical-align: middle;" class="text-center">
                                            <a href="/dashboard/daftar_lulus/siswa/{{ $s->id }}" type="button"
                                                class="btn btn-circle btn-sm tombol-info mr-1">
                                                <span class="icon text-white">
                                                    <i class="fas fa-exclamation-circle"></i>
                                                </span>
                                            </a>
                                            <a data-toggle="modal" data-target="#batal_lulus{{ $s->id }}"
                                                type="button" class="btn btn-circle btn-sm tombol-min">
                                                <span class="icon text-white">
                                                    <i class="fas fa-sign-out-alt"></i>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="batal_lulus{{ $s->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="batal_lulus{{ $s->id }}Label"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="batal_lulus{{ $s->id }}Label">
                                                        Batal Lulus</h5>
                                                    <button type="button" class="close" id="close"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-2">
                                                        <label>"{{ $s->nama }}" akan dibatalkan kelulusannya ?</label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                    <a href="/dashboard/batal_lulus/{{ $s->id }}/{{ $tahun_aktif }}"
                                                        type="submit" class="btn btn-primary">Lanjut</a>
                                                </div>
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
                            <div class="btnMenuSiswa" style="display: flex; justify-content:right;" id="btnMenuSiswa"
                                data-idsiswa="{{ $s->id }}">
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
                                    <a class="dropdown-item text-gray-800" data-toggle="modal"
                                        data-target="#batal_lulushp{{ $s->id }}">
                                        Batalkan Kelulusan
                                    </a>
                                </div>
                            </div>

                        </div>
                        <hr style="background-color: white; margin-top:-10px;">
                        <div class="modal fade" id="batal_lulushp{{ $s->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="batal_lulus{{ $s->id }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="batal_lulus{{ $s->id }}Label">Batal Lulus</h5>
                                        <button type="button" class="close" id="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-2">
                                            <label>"{{ $s->nama }}" akan dibatalkan kelulusannya ?</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Tutup</button>
                                        <a href="/dashboard/batal_lulus/{{ $s->id }}/{{ $tahun_aktif }}"
                                            type="submit" class="btn btn-primary">Lanjut</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $i++; ?>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="hapuslulus" tabindex="-1" role="dialog" aria-labelledby="hapuslulusLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapuslulusLabel">Hapus Siswa Lulus</h5>
                    <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/dashboard/hapus_siswa/{{ $tahun_aktif }}" method="GET">
                    <div class="modal-body">
                        <div class="mb-2">
                            @if ($tahun_aktif == 'all')
                                <label>Lanjut menghapus semua siswa yang telah lulus, semua data akan dihapus secara
                                    permanen
                                    ?</label>
                            @else
                                <label>Lanjut menghapus siswa yang telah lulus tahun {{ $tahun_aktif }}, semua data akan
                                    dihapus secara permanen
                                    ?</label>
                            @endif

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
