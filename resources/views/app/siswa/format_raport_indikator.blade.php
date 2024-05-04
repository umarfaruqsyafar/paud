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
                <a href="/siswa/format_raport/{{ $capaian->id }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-left"></i>
                    </span>
                </a>
                <a data-toggle="modal" data-target="#indikator1" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Indikator</span>
                </a>
            </div>
            <div class="col-lg-4 mb-3">
                <form action="/siswa/format_raport/{{ $capaian->id }}/{{ $tujuan->id }}" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 small" id="cari_indikator" name="cari_indikator"
                            placeholder="Cari Indikator..." aria-label="Search" aria-describedby="basic-addon2"
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
                        <h6 class="m-0 font-weight-bold text-primary">Indikator Capaian Pembelajaran</h6>
                    </div>
                    <div class="card-body side-com">
                        <table class="table table-bordered" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th colspan="3" style="width: 100%;">Indikator <?= $tujuan['tujuan'] ?>
                                    </th>
                                </tr>
                            </thead>
                            <thead class="text-white text-center">
                                <tr>
                                    <th style="width: 6%;">No</th>
                                    <th style="width: 70%;">Indikator</th>
                                    <th style="width: 20%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($indikator as $s) : ?>
                                <tr>
                                    <td class="text-center"><?= $i ?></td>
                                    <td><?= $s['indikator'] ?></td>
                                    <td style="vertical-align: middle;" class="text-center">
                                        <button data-toggle="modal" data-target="#edit_indikator1<?= $s['id'] ?>"
                                            class="btn btn-circle btn-sm btn-secondary tombol-edit">
                                            <span class="icon text-white">
                                                <i class="fas fa-recycle"></i>
                                            </span>
                                        </button>
                                        <button data-toggle="modal" data-target="#delete_indikator<?= $s['id'] ?>"
                                            class="btn btn-circle btn-sm btn-secondary tombol-min">
                                            <span class="icon text-white">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="edit_indikator1<?= $s['id'] ?>" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header mb-3">
                                                <h5 class="modal-title">Ubah Indikator Pembelajaran</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="/siswa/format_raport/ubah_indikator" method="POST">
                                                @csrf
                                                <div class="container">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type="hidden" class="form-control" id="idcapaian"
                                                                name="idcapaian" value="{{ $capaian->id }}">
                                                            <input type="hidden" class="form-control" id="idtujuan"
                                                                name="idtujuan" value="{{ $tujuan->id }}">
                                                            <input type="hidden" class="form-control" id="id"
                                                                name="id" value="<?= $s['id'] ?>">
                                                            <input type="text" class="form-control" id="indikator"
                                                                name="indikator" value="<?= $s['indikator'] ?>">
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
                                <div class="modal fade" id="delete_indikator<?= $s['id'] ?>" tabindex="-1"
                                    role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header mb-3">
                                                <h5 class="modal-title">Hapus Indikator Pembelajaran</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="/siswa/format_raport/hapus_indikator" method="POST">
                                                @csrf
                                                <div class="container">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type="hidden" class="form-control" id="idcapaian"
                                                                name="idcapaian" value="{{ $capaian->id }}">
                                                            <input type="hidden" class="form-control" id="idtujuan"
                                                                name="idtujuan" value="{{ $tujuan->id }}">
                                                            <input type="hidden" class="form-control" id="id"
                                                                name="id" value="<?= $s['id'] ?>">
                                                            <p class="text-gray">Yakin ingin menghapus
                                                                "<?= $s['indikator'] ?>"" ?
                                                            </p>
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
                        <?php $i = 1; ?>
                        <?php foreach ($indikator as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative;">
                            <div style="width:10vw;">
                                <div><?= $i ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><?= $s['indikator'] ?></p>

                            </div>
                            <div class="btnMenuSiswa" style="width:10vw; display: flex; justify-content:right;"
                                id="btnMenuSiswa" data-idsiswa="<?= $s['id'] ?>">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>
                            <div class="menuSiswaD shadow"
                                style="display:none; position:absolute; right:0; top:0; z-index:3; background-color:white;"
                                id="menuSiswaD{{ $s->id }}">

                                <div style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                    <a class="dropdown-item text-gray-800" data-toggle="modal"
                                    data-target="#edit_indikatorhp<?= $s['id'] ?>">
                                        Ubah
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-gray-800" data-toggle="modal"
                                    data-target="#delete_indikatorhp<?= $s['id'] ?>">
                                        Hapus
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="modal fade" id="edit_indikatorhp<?= $s['id'] ?>" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header mb-3">
                                        <h5 class="modal-title">Ubah Indikator Pembelajaran</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/siswa/format_raport/ubah_indikator" method="POST">
                                        @csrf
                                        <div class="container">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="hidden" class="form-control" id="idcapaian"
                                                        name="idcapaian" value="{{ $capaian->id }}">
                                                    <input type="hidden" class="form-control" id="idtujuan"
                                                        name="idtujuan" value="{{ $tujuan->id }}">
                                                    <input type="hidden" class="form-control" id="id"
                                                        name="id" value="<?= $s['id'] ?>">
                                                    <input type="text" class="form-control" id="indikator"
                                                        name="indikator" value="<?= $s['indikator'] ?>">
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
                        <div class="modal fade" id="delete_indikatorhp<?= $s['id'] ?>" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header mb-3">
                                        <h5 class="modal-title">Hapus Indikator Pembelajaran</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/siswa/format_raport/hapus_indikator" method="POST">
                                        @csrf
                                        <div class="container">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="hidden" class="form-control" id="idcapaian"
                                                        name="idcapaian" value="{{ $capaian->id }}">
                                                    <input type="hidden" class="form-control" id="idtujuan"
                                                        name="idtujuan" value="{{ $tujuan->id }}">
                                                    <input type="hidden" class="form-control" id="id"
                                                        name="id" value="<?= $s['id'] ?>">
                                                    <p class="text-gray">Yakin ingin menghapus "<?= $s['indikator'] ?>"" ?
                                                    </p>
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
                        <hr style="background-color: white; margin-top:-10px;">
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- End of Main Content -->

    <div class="modal fade" id="indikator1" tabindex="-1" role="dialog" aria-labelledby="indikatorLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header mb-3">
                    <h5 class="modal-title" id="indikatorLabel">Tambah Indikator</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/siswa/format_raport/tambah_indikator" method="POST">
                    @csrf
                    <div class="container">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="hidden" class="form-control" id="idcapaian" name="idcapaian"
                                    value="{{ $capaian->id }}">
                                <input type="hidden" class="form-control" id="idtujuan" name="idtujuan"
                                    value="{{ $tujuan->id }}">
                                <input type="text" class="form-control" id="indikator" name="indikator"
                                    placeholder="Indikator">
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

    <!-- End of Main Content -->
@endsection
