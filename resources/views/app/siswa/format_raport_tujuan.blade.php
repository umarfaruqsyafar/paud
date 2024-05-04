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
                <a data-toggle="modal" data-target="#tujuancp" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tujuan Pembelajaran</span>
                </a>
                <a data-toggle="modal" data-target="#deskripsi" class="btn btn-info btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-recycle"></i>
                    </span>
                    <span class="text">Deskripsi</span>
                </a>
            </div>
            <div class="col-lg-4 mb-3">
                <form action="/siswa/format_raport/{{ $capaian->id }}" method="get">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control border-0 small" id="cari_tujuan" name="cari_tujuan"
                            placeholder="Cari Tujuan..." aria-label="Search" aria-describedby="basic-addon2"
                            autocomplete="off">
                        <div class="input-group-append">
                            <button class="btn btn-primary border-0" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tujuan Capaian Pembelajaran</h6>
                    </div>
                    <div class="card-body side-com">
                            <table class="table table-bordered" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th colspan="3" style="width: 100%;">
                                            <?= $capaian['capaian'] ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <td colspan="3">
                                            <div style="text-align: justify;">
                                                <?= $capaian['deskripsi'] ?>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                                <thead class="text-center">
                                    <tr>
                                        <th style="width: 6%;">No</th>
                                        <th style="width: 70%;">Tujuan Pembelajaran</th>
                                        <th style="width: 20%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($tujuan as $s) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i ?></td>
                                        <td><?= $s['tujuan'] ?></td>
                                        <td style="vertical-align: middle;" class="text-center">
                                            <button data-toggle="modal" data-target="#edit_tujuan<?= $s['id'] ?>"
                                                class="btn btn-circle btn-sm btn-secondary tombol-edit">
                                                <span class="icon text-white">
                                                    <i class="fas fa-recycle"></i>
                                                </span>
                                            </button>
                                            <button data-toggle="modal" data-target="#delete_tujuan<?= $s['id'] ?>"
                                                class="btn btn-circle btn-sm btn-secondary tombol-min">
                                                <span class="icon text-white">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </button>
                                            <a href="/siswa/format_raport/{{ $capaian->id }}/{{ $s->id }}"
                                                class="btn btn-circle btn-sm btn-info tombol-info">
                                                <span class="icon text-white">
                                                    <i class="fas fa-exclamation-circle"></i>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="edit_tujuan<?= $s['id'] ?>" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header mb-3">
                                                    <h5 class="modal-title">Ubah Tujuan Pembelajaran</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/siswa/format_raport/ubah_tujuan" method="POST">
                                                    @csrf
                                                    <div class="container">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <input type="hidden" class="form-control" id="idcapaian"
                                                                    name="idcapaian" value="<?= $capaian['id'] ?>">
                                                                <input type="hidden" class="form-control" id="id"
                                                                    name="id" value="<?= $s['id'] ?>">
                                                                <input type="text" class="form-control" id="tujuan"
                                                                    name="tujuan" value="<?= $s['tujuan'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Ubah</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="delete_tujuan<?= $s['id'] ?>" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header mb-3">
                                                    <h5 class="modal-title">Hapus Tujuan Pembelajaran</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/siswa/format_raport/hapus_tujuan" method="POST">
                                                    @csrf
                                                    <div class="container">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <input type="hidden" class="form-control" id="idcapaian"
                                                                    name="idcapaian" value="<?= $capaian['id'] ?>">
                                                                <input type="hidden" class="form-control" id="id"
                                                                    name="id" value="<?= $s['id'] ?>">
                                                                <p class="text-gray">Yakin ingin menghapus
                                                                    "{{ $s->tujuan }}"?</p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Lanjut</button>
                                                        </div>
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

                    <div class="card-body side-hp">
                        <div class="mb-4" style="text-align: left;">
                            <?= $capaian['deskripsi'] ?>
                        </div>
                        <?php $i = 1; ?>
                        <?php foreach ($tujuan as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile" style="display:flex; margin-top:-10px; position:relative;">
                            <div style="width:10vw;">
                                <div><?= $i ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <p><?= $s['tujuan'] ?></p>
                
                            </div>
                            <div class="btnMenuSiswa" style="width:10vw; display: flex; justify-content:right;" id="btnMenuSiswa"
                                data-idsiswa="<?= $s['id'] ?>">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>
                            <div class="menuSiswaD shadow"
                                style="display:none; position:absolute; right:0; top:0; z-index:3; background-color:white;"
                                id="menuSiswaD{{ $s->id }}">

                                <div style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                    <a class="dropdown-item text-gray-800" href="/siswa/format_raport/{{ $capaian->id }}/{{ $s->id }}">
                                        Indikator
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-gray-800" data-toggle="modal" data-target="#edit_tujuanhp<?= $s['id'] ?>">
                                        Ubah
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-gray-800" data-toggle="modal"
                                    data-target="#delete_tujuanhp<?= $s['id'] ?>">
                                        Hapus
                                    </a>
                                </div>
                            </div>
                
                        </div>
                        <div class="modal fade" id="edit_tujuanhp<?= $s['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header mb-3">
                                        <h5 class="modal-title">Ubah Tujuan Pembelajaran</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/siswa/format_raport/ubah_tujuan" method="POST">
                                        @csrf
                                        <div class="container">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="hidden" class="form-control" id="idcapaian" name="idcapaian"
                                                        value="<?= $capaian['id'] ?>">
                                                    <input type="hidden" class="form-control" id="id" name="id"
                                                        value="<?= $s['id'] ?>">
                                                    <input type="text" class="form-control" id="tujuan" name="tujuan"
                                                        value="<?= $s['tujuan'] ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Ubah</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="delete_tujuanhp<?= $s['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header mb-3">
                                        <h5 class="modal-title">Hapus Tujuan Pembelajaran</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/siswa/format_raport/hapus_tujuan" method="POST">
                                        @csrf
                                        <div class="container">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="hidden" class="form-control" id="idcapaian" name="idcapaian"
                                                        value="<?= $capaian['id'] ?>">
                                                    <input type="hidden" class="form-control" id="id" name="id"
                                                        value="<?= $s['id'] ?>">
                                                    <p class="text-gray">Yakin ingin menghapus "{{ $s->tujuan }}"?</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Lanjut</button>
                                            </div>
                                        </div>
                                    </form>
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
    </div>







    <!-- End of Main Content -->


    <!-- Modal Ubah Data -->
    <div class="modal fade" id="tujuancp" tabindex="-1" role="dialog" aria-labelledby="tujuancpLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header mb-3">
                    <h5 class="modal-title" id="tujuancpLabel">Tambah Tujuan Pembelajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/siswa/format_raport/tambah_tujuan" method="POST">
                    @csrf
                    <div class="container">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="hidden" class="form-control" id="idcapaian" name="idcapaian"
                                    value="{{ $capaian->id }}">
                                <input type="text" class="form-control" id="tujuan" name="tujuan"
                                    placeholder="Tujuan Pembelajaran" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deskripsi" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header mb-3">
                    <h5 class="modal-title">Ubah Deskripsi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/siswa/format_raport/deskripsi" method="POST">
                    @csrf
                    <div class="container">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="hidden" class="form-control" id="id" name="id"
                                    value="<?= $capaian['id'] ?>">
                                <textarea class="form-control mb-2" id="deskripsi" name="deskripsi"
                                    style="resize:vertical; text-align: justify; height: 15em;" required><?= $capaian['deskripsi'] ?></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- End of Main Content -->
@endsection
