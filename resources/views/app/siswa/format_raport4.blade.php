@extends('app.layouts.main')

@section('container')
    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="row">
                <div class="col-lg-7">
                    <div class="alert bg-warning text-white" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-5 mb-3">
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
            <div class="col-lg-2 text-align-hp mb-3">
                <a data-toggle="modal" data-target="#plusekstra" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Ekstra</span>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7">
                <div class="card mb-3">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Kegiatan Ekstra</h6>
                    </div>
                    <div class="card-body side-com">
                        <div class="table-responsive">
                            <table class="table table-bordered" cellspacing="0">
                                <thead class="text-center">
                                    <tr class="text-center">
                                        <th style="vertical-align: middle; width: 10%;">No</th>
                                        <th style="vertical-align: middle;">Ekstra Harian</th>
                                        <th style="vertical-align: middle; width: 30%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($ekstra as $s) : ?>
                                    <tr>
                                        <td style="vertical-align: middle;" class="text-center"><?= $i ?>
                                        </td>
                                        <td style="vertical-align: middle;"><?= $s['ekstra'] ?></td>
                                        <td style="vertical-align: middle;" class="text-center">
                                            <button data-toggle="modal" data-target="#edit_ekstra<?= $s['id'] ?>"
                                                class="btn btn-secondary btn-circle btn-sm tombol-edit">
                                                <span class="icon text-white">
                                                    <i class="fas fa-recycle"></i>
                                                </span>
                                            </button>
                                            <button data-toggle="modal" data-target="#delete_ekstra<?= $s['id'] ?>"
                                                class="btn btn-secondary btn-circle btn-sm tombol-min">
                                                <span class="icon text-white">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="edit_ekstra<?= $s['id'] ?>" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header mb-3">
                                                    <h5 class="modal-title">Ubah Kegiatan Ekstra</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/siswa/format_raport4/ubah_ekstra" method="POST">
                                                    @csrf
                                                    <div class="container">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <input type="hidden" class="form-control" id="idtendik"
                                                                    name="idtendik" value="{{ $iduser }}">
                                                                <input type="hidden" class="form-control" id="id"
                                                                    name="id" value="<?= $s['id'] ?>">
                                                                <input type="text" class="form-control" id="ekstra"
                                                                    name="ekstra" value="<?= $s['ekstra'] ?>" required>
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
                                    <div class="modal fade" id="delete_ekstra<?= $s['id'] ?>" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header mb-3">
                                                    <h5 class="modal-title">Hapus Kegiatan Ekstra</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/siswa/format_raport4/hapus_ekstra" method="POST">
                                                    @csrf
                                                    <div class="container">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <input type="hidden" class="form-control" id="id"
                                                                    name="id" value="<?= $s['id'] ?>">
                                                                <p class="text-gray">Yakin ingin menghapus
                                                                    "<?= $s['ekstra'] ?>" ?
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
                        <?php foreach ($ekstra as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative;">
                            <div style="width:10vw;">
                                <div><?= $i ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><?= $s['ekstra'] ?></p>

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
                                        data-target="#edit_ekstrahp<?= $s['id'] ?>">
                                        Ubah
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-gray-800" data-toggle="modal"
                                        data-target="#delete_ekstrahp<?= $s['id'] ?>">
                                        Hapus
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="modal fade" id="edit_ekstrahp<?= $s['id'] ?>" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header mb-3">
                                        <h5 class="modal-title">Ubah Kegiatan Ekstra</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/siswa/format_raport4/ubah_ekstra" method="POST">
                                        @csrf
                                        <div class="container">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="hidden" class="form-control" id="idtendik"
                                                        name="idtendik" value="{{ $iduser }}">
                                                    <input type="hidden" class="form-control" id="id"
                                                        name="id" value="<?= $s['id'] ?>">
                                                    <input type="text" class="form-control" id="ekstra"
                                                        name="ekstra" value="<?= $s['ekstra'] ?>" required>
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
                        <div class="modal fade" id="delete_ekstrahp<?= $s['id'] ?>" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header mb-3">
                                        <h5 class="modal-title">Hapus Kegiatan Ekstra</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/siswa/format_raport4/hapus_ekstra" method="POST">
                                        @csrf
                                        <div class="container">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="hidden" class="form-control" id="id"
                                                        name="id" value="<?= $s['id'] ?>">
                                                    <p class="text-gray">Yakin ingin menghapus "<?= $s['ekstra'] ?>" ?
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


    <div class="modal fade" id="plusekstra" tabindex="-1" role="dialog" aria-labelledby="doaLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header mb-3">
                    <h5 class="modal-title" id="doaLabel">Tambah Kegiatan Ekstra</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/siswa/format_raport4/tambah_ekstra" method="POST">
                    @csrf
                    <div class="container">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="hidden" class="form-control" id="idtendik" name="idtendik"
                                    value="{{ $iduser }}">
                                <input type="text" class="form-control" id="ekstra" name="ekstra"
                                    placeholder="Kegiatan ekstra" required>
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
