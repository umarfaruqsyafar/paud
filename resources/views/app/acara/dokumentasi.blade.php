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
            <div class="col-lg-12 mb-3">
                @can('admin')
                    <a class="btn btn-info btn-icon-split" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <span class="text">Pilih</span>
                        <span class="icon text-white-50">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-center" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="/acara/dokumentasi/sekolah">
                            Sekolah
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/acara/dokumentasi/yayasan">
                            Yayasan
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/acara/dokumentasi/komite">
                            Komite
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/acara/dokumentasi/sarpras">
                            Sarpras
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/acara/dokumentasi/ekstra">
                            Ekstra
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/acara/dokumentasi/daycare">
                            Day Care
                        </a>
                    </div>
                    <a class="btn btn-info btn-icon-split">
                        <span class="icon text-white bg-info">
                            <i class="fas fa-camera"></i>
                        </span>
                        <span class="text text-capitalize" style="margin-left: -10px;">{{ $jenis }}</span>
                    </a>
                @endcan
                <a data-toggle="modal" data-target="#pluskeg" class="btn btn-primary btn-icon-split" style="float: right;">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Kegiatan</span>
                </a>
            </div>
        </div>

        <div class="row">
            @foreach ($kegiatan as $k)
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        <?= $k['judul'] ?></div>
                                    <div class="mb-5 text-gray-600"><?= $k['deskripsi'] ?></div>
                                </div>
                            </div>

                            <div class="row mt-2" style="position: absolute; bottom:20px;">
                                <div class="col">
                                    <a class="btn btn-info tombol-info  btn-sm"
                                        href="/acara/dokumentasi/{{ $jenis }}/{{ $k['id'] }}">
                                        <span class="text-white">Info
                                        </span>
                                    </a>
                                    <a class="btn btn-success tombol-edit btn-sm" data-toggle="modal"
                                        data-target="#editkeghp<?= $k['id'] ?>">
                                        <span class="text-white">Ubah
                                        </span>
                                    </a>
                                    <a class="btn btn-danger tombol-min btn-sm" data-toggle="modal"
                                        data-target="#hapuskeghp<?= $k['id'] ?>">
                                        <span class="text-white">Hapus
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- MODAL HAPUS -->
                <div class="modal fade" id="editkeghp<?= $k['id'] ?>" tabindex="-1" role="dialog"
                    aria-labelledby="pluskegLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="color: grey;">Edit <?= $jenis ?></h5>
                                <button type="button" class="close" id="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/acara/dokumentasi/ubah" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-2">
                                        <input type="hidden" class="form-control" id="jenis" name="jenis"
                                            value="{{ $jenis }}">
                                        <input type="hidden" class="form-control" id="id" name="id"
                                            value="<?= $k['id'] ?>">
                                        <input type="text" class="form-control" id="judul" name="judul"
                                            value="<?= $k['judul'] ?>">
                                    </div>
                                    <div class="mb-2">
                                        <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                            value="<?= $k['deskripsi'] ?>">
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
                <div class="modal fade" id="hapuskeghp<?= $k['id'] ?>" tabindex="-1" role="dialog"
                    aria-labelledby="pluskegLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="color: grey;">Hapus kegiatan <?= $jenis ?></h5>
                                <button type="button" class="close" id="close" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/acara/dokumentasi/hapus" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-2">
                                        <input type="hidden" class="form-control" id="jenis" name="jenis"
                                            value="{{ $jenis }}">
                                        <input type="hidden" class="form-control" id="id" name="id"
                                            value="<?= $k['id'] ?>">
                                        <p class="text-grey form-control border-0" id="judul" name="judul">Yakin
                                            ingin
                                            menghapus "<?= $k['judul'] ?>" ?. <br>Semua dokumentasi pada
                                            "<?= $k['judul'] ?>"
                                            akan
                                            terhapus</p>
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
            @endforeach

        </div>

    </div>



    <!-- Modal Tambah Data Kelas -->
    <div class="modal fade" id="pluskeg" tabindex="-1" role="dialog" aria-labelledby="pluskegLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pluskegLabel">Tambah kegiatan {{ $jenis }}</h5>
                    <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/acara/dokumentasi/tambah" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-2">
                            <label>Judul Kegiatan</label>
                            <input type="hidden" class="form-control" id="jenis" name="jenis"
                                value="{{ $jenis }}">
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>
                        <div class="mb-2">
                            <label>Deskripsi Kegiatan</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="(optional)">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
