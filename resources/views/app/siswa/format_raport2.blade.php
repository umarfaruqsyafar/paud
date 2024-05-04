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
                <a href="/siswa/format_raport"
                    class="btn btn-icon-split {{ Request::is('siswa/format_raport') ? 'bg-secondary' : 'bg-info' }}">

                    <span class="text text-white {{ Request::is('siswa/format_raport') ? 'bg-secondary' : 'bg-info' }}">Nilai
                        1</span>
                </a>
                <a href="/siswa/format_raport2"
                    class="btn btn-icon-split {{ Request::is('siswa/format_raport2') ? 'bg-secondary' : 'bg-info' }}">

                    <span
                        class="text text-white {{ Request::is('siswa/format_raport2') ? 'bg-secondary' : 'bg-info' }}">Nilai
                        2</span>
                </a>
                <a href="/siswa/format_raport3"
                    class="btn btn-icon-split {{ Request::is('siswa/format_raport3') ? 'bg-secondary' : 'bg-info' }}">

                    <span
                        class="text text-white {{ Request::is('siswa/format_raport3') ? 'bg-secondary' : 'bg-info' }}">Nilai
                        3</span>
                </a>
                <a href="/siswa/format_raport4"
                    class="btn btn-icon-split {{ Request::is('siswa/format_raport4') ? 'bg-secondary' : 'bg-info' }}">

                    <span
                        class="text text-white {{ Request::is('siswa/format_raport4') ? 'bg-secondary' : 'bg-info' }}">Nilai
                        4</span>
                </a>
            </div>
            <div class="col-lg-4 text-align-hp mb-3">
                <a data-toggle="modal" data-target="#plusdoa" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Do'a</span>
                </a>
                <a data-toggle="modal" data-target="#plussurah" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Surah</span>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-3">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Do'a Harian</h6>
                    </div>
                    <div class="card-body side-com">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-center">
                                    <tr class="text-center">
                                        <th style="vertical-align: middle; width: 10%;">No</th>
                                        <th style="vertical-align: middle;">Do'a Harian</th>
                                        <th style="vertical-align: middle; width: 30%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($doa as $s) : ?>
                                    <tr>
                                        <td style="vertical-align: middle;" class="text-center"><?= $i ?>
                                        </td>
                                        <td style="vertical-align: middle;"><?= $s['doa'] ?></td>
                                        <td style="vertical-align: middle;" class="text-center">
                                            <button data-toggle="modal" data-target="#edit_doa<?= $s['id'] ?>"
                                                class="btn btn-circle btn-sm btn-secondary tombol-edit">
                                                <span class="icon text-white">
                                                    <i class="fas fa-recycle"></i>
                                                </span>
                                            </button>
                                            <button data-toggle="modal" data-target="#delete_doa<?= $s['id'] ?>"
                                                class="btn btn-circle btn-sm btn-secondary tombol-min">
                                                <span class="icon text-white">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="edit_doa<?= $s['id'] ?>" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header mb-3">
                                                    <h5 class="modal-title">Ubah Do'a</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/siswa/format_raport2/ubah_doa" method="POST">
                                                    @csrf
                                                    <div class="container">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <input type="hidden" class="form-control" id="idtendik"
                                                                    name="idtendik" value="{{ $iduser }}">
                                                                <input type="hidden" class="form-control" id="id"
                                                                    name="id" value="<?= $s['id'] ?>">
                                                                <input type="text" class="form-control" id="doa"
                                                                    name="doa" value="<?= $s['doa'] ?>" required>
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
                                    <div class="modal fade" id="delete_doa<?= $s['id'] ?>" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header mb-3">
                                                    <h5 class="modal-title">Hapus Do'a</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/siswa/format_raport2/hapus_doa" method="POST">
                                                    @csrf
                                                    <div class="container">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <input type="hidden" class="form-control" id="id"
                                                                    name="id" value="<?= $s['id'] ?>">
                                                                <p class="text-gray">Yakin ingin menghapus
                                                                    "<?= $s['doa'] ?>" ?
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
                    </div>

                    <div class="card-body side-hp">
                        <?php $i = 1; ?>
                        <?php foreach ($doa as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative;">
                            <div style="width:10vw;">
                                <div><?= $i ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><?= $s['doa'] ?></p>

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
                                        data-target="#edit_doahp<?= $s['id'] ?>">
                                        Ubah
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-gray-800" data-toggle="modal"
                                        data-target="#delete_doahp<?= $s['id'] ?>">
                                        Hapus
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="modal fade" id="edit_doahp<?= $s['id'] ?>" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header mb-3">
                                        <h5 class="modal-title">Ubah Do'a</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/siswa/format_raport2/ubah_doa" method="POST">
                                        @csrf
                                        <div class="container">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="hidden" class="form-control" id="idtendik"
                                                        name="idtendik" value="{{ $iduser }}">
                                                    <input type="hidden" class="form-control" id="id"
                                                        name="id" value="<?= $s['id'] ?>">
                                                    <input type="text" class="form-control" id="doa"
                                                        name="doa" value="<?= $s['doa'] ?>" required>
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
                        <div class="modal fade" id="delete_doahp<?= $s['id'] ?>" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header mb-3">
                                        <h5 class="modal-title">Hapus Do'a</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/siswa/format_raport2/hapus_doa" method="POST">
                                        @csrf
                                        <div class="container">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="hidden" class="form-control" id="id"
                                                        name="id" value="<?= $s['id'] ?>">
                                                    <p class="text-gray">Yakin ingin menghapus "<?= $s['doa'] ?>" ?
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

            <div class="col-lg-6">
                <div class="card mb-3">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Surah Pendek</h6>
                    </div>
                    <div class="card-body side-com">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-center">
                                    <tr class="text-center">
                                        <th style="vertical-align: middle; width: 10%;">No</th>
                                        <th style="vertical-align: middle;">Surah</th>
                                        <th style="vertical-align: middle; width: 30%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($surah as $s) : ?>
                                    <tr>
                                        <td style="vertical-align: middle;" class="text-center"><?= $i ?>
                                        </td>
                                        <td style="vertical-align: middle;"><?= $s['surah'] ?></td>
                                        <td style="vertical-align: middle;" class="text-center">
                                            <button data-toggle="modal" data-target="#edit_surah<?= $s['id'] ?>"
                                                class="btn btn-circle btn-sm btn-secondary tombol-edit">
                                                <span class="icon text-white">
                                                    <i class="fas fa-recycle"></i>
                                                </span>
                                            </button>
                                            <button data-toggle="modal" data-target="#delete_surah<?= $s['id'] ?>"
                                                class="btn btn-circle btn-sm btn-secondary tombol-min">
                                                <span class="icon text-white">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="edit_surah<?= $s['id'] ?>" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header mb-3">
                                                    <h5 class="modal-title">Ubah Surah</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/siswa/format_raport2/ubah_surah" method="POST">
                                                    @csrf
                                                    <div class="container">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <input type="hidden" class="form-control" id="idtendik"
                                                                    name="idtendik" value="{{ $iduser }}">
                                                                <input type="hidden" class="form-control" id="id"
                                                                    name="id" value="<?= $s['id'] ?>">
                                                                <input type="text" class="form-control" id="surah"
                                                                    name="surah" value="<?= $s['surah'] ?>" required>
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
                                    <div class="modal fade" id="delete_surah<?= $s['id'] ?>" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header mb-3">
                                                    <h5 class="modal-title">Hapus Surah</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/siswa/format_raport2/hapus_surah" method="POST">
                                                    @csrf
                                                    <div class="container">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <input type="hidden" class="form-control" id="id"
                                                                    name="id" value="<?= $s['id'] ?>">
                                                                <p class="text-gray">Yakin ingin menghapus
                                                                    "<?= $s['surah'] ?>"
                                                                    ?
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
                    </div>

                    <div class="card-body side-hp">
                        <?php $i = 1; ?>
                        <?php foreach ($surah as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative;">
                            <div style="width:10vw;">
                                <div><?= $i ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><?= $s['surah'] ?></p>

                            </div>
                            <div class="btnMenuSiswaSurah" style="width:10vw; display: flex; justify-content:right;"
                                id="btnMenuSiswaSurah" data-idsiswa="<?= $s['id'] ?>">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>
                            <div class="menuSiswaDSurah shadow"
                                style="display:none; position:absolute; right:0; top:0; z-index:3; background-color:white;"
                                id="menuSiswaDSurah{{ $s->id }}">

                                <div style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                    <a class="dropdown-item text-gray-800" data-toggle="modal"
                                        data-target="#edit_surahhp<?= $s['id'] ?>">
                                        Ubah
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-gray-800" data-toggle="modal"
                                        data-target="#delete_surahhp<?= $s['id'] ?>">
                                        Hapus
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="modal fade" id="edit_surahhp<?= $s['id'] ?>" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header mb-3">
                                        <h5 class="modal-title">Ubah Surah</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/siswa/format_raport2/ubah_surah" method="POST">
                                        @csrf
                                        <div class="container">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="hidden" class="form-control" id="idtendik"
                                                        name="idtendik" value="{{ $iduser }}">
                                                    <input type="hidden" class="form-control" id="id"
                                                        name="id" value="<?= $s['id'] ?>">
                                                    <input type="text" class="form-control" id="surah"
                                                        name="surah" value="<?= $s['surah'] ?>" required>
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
                        <div class="modal fade" id="delete_surahhp<?= $s['id'] ?>" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header mb-3">
                                        <h5 class="modal-title">Hapus Surah</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/siswa/format_raport2/hapus_surah" method="POST">
                                        @csrf
                                        <div class="container">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="hidden" class="form-control" id="id"
                                                        name="id" value="<?= $s['id'] ?>">
                                                    <p class="text-gray">Yakin ingin menghapus "<?= $s['surah'] ?>"
                                                        ?
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


    <div class="modal fade" id="plusdoa" tabindex="-1" role="dialog" aria-labelledby="doaLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header mb-3">
                    <h5 class="modal-title" id="doaLabel">Tambah Doa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/siswa/format_raport2/tambah_doa" method="POST">
                    @csrf
                    <div class="container">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="hidden" class="form-control" id="idtendik" name="idtendik"
                                    value="{{ $iduser }}">
                                <input type="text" class="form-control" id="doa" name="doa"
                                    placeholder="Do'a" required>
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
    <div class="modal fade" id="plussurah" tabindex="-1" role="dialog" aria-labelledby="doaLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header mb-3">
                    <h5 class="modal-title" id="doaLabel">Tambah Surah Pendek</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/siswa/format_raport2/tambah_surah" method="POST">
                    @csrf
                    <div class="container">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="hidden" class="form-control" id="idtendik" name="idtendik"
                                    value="{{ $iduser }}">
                                <input type="text" class="form-control" id="surah" name="surah"
                                    placeholder="Surah pendek" required>
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
@endsection
