@extends('app.layouts.main')
@section('container')
    <div class="container">
        @if (session()->has('success'))
            <div class="alert bg-warning text-white" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div>
            <a href="/dashboard/pd/terima_siswa/all" class="btn btn-primary btn-icon-split mr-2 tombol-tambah">
                <span class="icon text-white-50">
                    <i class="fas fa-users"></i>
                </span>
                <span class="text">terima semua</span>
            </a>
        </div>

    </div>

    <?php foreach ($siswa_baru as $sm) : ?>
    <?php
    $lahir = $sm['lahir'];
    $lahir1 = new DateTime($lahir);
    $today = new DateTime('today');
    
    $umur = $today->diff($lahir1)->y;
    $bulan = $today->diff($lahir1)->m;
    ?>


    <!-- Begin Page Content -->
    <div class="container side-hp m-footer">

        <div style="margin-top: 30px;"></div>
        <div style="margin-bottom: 20px;">
            <h5 class="m-0 font-weight-bold text-hp text-uppercase"><?= $sm['nama'] ?> (new!)</h5>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-4 mt-3">
                        <p>Nama</p>
                    </div>
                    <div class="col-1 mt-3">
                        <p>:</p>
                    </div>
                    <div class="col-6 mt-3">
                        <label><?= $sm['nama'] ?></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Panggilan</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-6">
                        <p><?= $sm['panggilan'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Jenis Kelamin</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-6">
                        <p><?= $sm['jk'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>NIK</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-6">
                        <p><?= $sm['nik'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>NIS</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-6">
                        <p><?= $sm['nis'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>NISN</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-6">
                        <p><?= $sm['nisn'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Anak ke</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-6">
                        <p><?= $sm['anak_ke'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>TTL</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-6">
                        <p><?= $sm['tempat'] ?>, {{ date('d-m-Y', strtotime($sm->lahir)) }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Alamat</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-6">
                        <p><?= $sm['alamat'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Desa</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-6">
                        <p><?= $sm['desa'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Kecamatan</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-6">
                        <p><?= $sm['kecamatan'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Kabupaten</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-6">
                        <p><?= $sm['kabupaten'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Provinsi</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-6">
                        <p><?= $sm['provinsi'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Umur</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-6">
                        <p><?= $umur ?> tahun <?= $bulan ?> bulan</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-4 mt-3">
                        <p>Nama Ibu</p>
                    </div>
                    <div class="col-1 mt-3">
                        <p>:</p>
                    </div>
                    <div class="col-6 mt-3">
                        <p><?= $sm['nama_ibu'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Pendidikan Ibu</p>
                    </div>
                    <div class="col-1 ">
                        <p>:</p>
                    </div>
                    <div class="col-6">
                        <p><?= $sm['pdd_ibu'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Pekerjaan Ibu</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-6">
                        <p><?= $sm['pekerjaan_ibu'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Agama Ibu</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-6">
                        <p><?= $sm['agama_ibu'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>No.Hp Ibu</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-6">
                        <p><?= $sm['no_ibu'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Nama Ayah</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-6">
                        <p><?= $sm['nama_ayah'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Pendidikan Ayah</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-6">
                        <p><?= $sm['pdd_ayah'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Pekerjaan Ayah</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-6">
                        <p><?= $sm['pekerjaan_ayah'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Agama Ayah</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-6">
                        <p><?= $sm['agama_ayah'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>No.Hp Ayah</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-6">
                        <p><?= $sm['no_ayah'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p>Tanggal Daftar</p>
                    </div>
                    <div class="col-1">
                        <p>:</p>
                    </div>
                    <div class="col-6">
                        <p>{{ date('d-m-Y', strtotime($sm->created_at)) }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-4 mb-3" style="text-align: center;">
                        <a href="/dashboard/pd/terima_siswa/{{ $sm->id }}"
                            class="btn btn-success btn-icon-split mr-3">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">terima</span>
                        </a>
                        <a data-toggle="modal" data-target="#newtolak" data-idsiswa="{{ $sm->id }}"
                            data-nama="{{ $sm->nama }}" class="btn btn-danger btn-icon-split datasiswa"
                            data-siswa="<?= $sm['nama'] ?>">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">tolak</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>







    </div>

    <div class="container side-com">
        <!-- Basic Card Example -->
        <div class="card shadow mb-3 mt-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-hp text-primary"><?= $sm['nama'] ?> (new!)</h6>
            </div>
            <div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-4 ml-4 mt-3">
                                <p>Nama</p>
                            </div>
                            <div class="col-1 mt-3">
                                <p>:</p>
                            </div>
                            <div class="col-6 mt-3">
                                <label><?= $sm['nama'] ?></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 ml-4">
                                <p>Panggilan</p>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-6">
                                <p><?= $sm['panggilan'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 ml-4">
                                <p>Jenis Kelamin</p>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-6">
                                <p><?= $sm['jk'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 ml-4">
                                <p>NIK</p>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-6">
                                <p><?= $sm['nik'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 ml-4">
                                <p>Anak ke</p>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-6">
                                <p><?= $sm['anak_ke'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 ml-4">
                                <p>TTL</p>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-6">
                                <p><?= $sm['tempat'] ?>, {{ date('d-m-Y', strtotime($sm->lahir)) }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 ml-4">
                                <p>Alamat</p>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-6">
                                <p><?= $sm['alamat'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 ml-4">
                                <p>Desa</p>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-6">
                                <p><?= $sm['desa'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 ml-4">
                                <p>Kecamatan</p>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-6">
                                <p><?= $sm['kecamatan'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 ml-4">
                                <p>Kabupaten</p>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-6">
                                <p><?= $sm['kabupaten'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 ml-4">
                                <p>Provinsi</p>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-6">
                                <p><?= $sm['provinsi'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 ml-4">
                                <p>Umur</p>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-6">
                                <p><?= $umur ?> tahun <?= $bulan ?> bulan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-4 ml-4 mt-3">
                                <p>Nama Ibu</p>
                            </div>
                            <div class="col-1 mt-3">
                                <p>:</p>
                            </div>
                            <div class="col-6 mt-3">
                                <p><?= $sm['nama_ibu'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 ml-4">
                                <p>Pendidikan Ibu</p>
                            </div>
                            <div class="col-1 ">
                                <p>:</p>
                            </div>
                            <div class="col-6">
                                <p><?= $sm['pdd_ibu'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 ml-4">
                                <p>Pekerjaan Ibu</p>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-6">
                                <p><?= $sm['pekerjaan_ibu'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 ml-4">
                                <p>Agama Ibu</p>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-6">
                                <p><?= $sm['agama_ibu'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 ml-4">
                                <p>No.Hp Ibu</p>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-6">
                                <p><?= $sm['no_ibu'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 ml-4">
                                <p>Nama Ayah</p>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-6">
                                <p><?= $sm['nama_ayah'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 ml-4">
                                <p>Pendidikan Ayah</p>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-6">
                                <p><?= $sm['pdd_ayah'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 ml-4">
                                <p>Pekerjaan Ayah</p>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-6">
                                <p><?= $sm['pekerjaan_ayah'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 ml-4">
                                <p>Agama Ayah</p>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-6">
                                <p><?= $sm['agama_ayah'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 ml-4">
                                <p>No.Hp Ayah</p>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-6">
                                <p><?= $sm['no_ayah'] ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 ml-4">
                                <p>Tanggal Daftar</p>
                            </div>
                            <div class="col-1">
                                <p>:</p>
                            </div>
                            <div class="col-6">
                                <p>{{ date('d-m-Y', strtotime($sm->created_at)) }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-4 mb-3" style="text-align: center;">
                                <a href="/dashboard/pd/terima_siswa/{{ $sm->id }}"
                                    class="btn btn-success btn-icon-split mr-3">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">terima</span>
                                </a>
                                <a data-toggle="modal" data-target="#newtolak" data-idsiswa="{{ $sm->id }}"
                                    data-nama="{{ $sm->nama }}" class="btn btn-danger btn-icon-split datasiswa">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">tolak</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </div>

    <?php endforeach; ?>



    <!-- Modal Tambah Data Kelas -->
    <div class="modal fade" id="newtolak" tabindex="-1" role="dialog" aria-labelledby="newtolakLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newtolakLabel">Tolak Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/dashboard/pd/tolak_siswa" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <p style="color: grey">Yakin tolak <span id="tolaksiswa"></span>?</p>
                            <input type="hidden" class="form-control" id="idsiswa" name="idsiswa">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Lanjut</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const datasiswa = document.querySelectorAll(".datasiswa");
        datasiswa.forEach(function(button) {
            button.addEventListener("click", function() {
                // Dapatkan data ID siswa dari atribut data
                var idsiswa = this.getAttribute("data-idsiswa");
                var nama = this.getAttribute("data-nama");
                $('#idsiswa').val(idsiswa);
                document.getElementById('tolaksiswa').innerHTML = nama;
            });
        });
    </script>
@endsection
