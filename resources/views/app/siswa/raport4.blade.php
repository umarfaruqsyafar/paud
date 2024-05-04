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
            <div class="col-lg-8 mb-2">
                <a href="/siswa/raport/{{ $siswa->id }}/1"
                    class="btn btn-icon-split {{ Request::is('siswa/raport/*') ? 'bg-secondary' : 'bg-info' }}">
                    <span class="text text-white {{ Request::is('siswa/raport/*') ? 'bg-secondary' : 'bg-info' }}">Nilai
                        1</span>
                </a>
                <a href="/siswa/raport2/{{ $siswa->id }}/1"
                    class="btn btn-icon-split {{ Request::is('siswa/raport2*') ? 'bg-secondary' : 'bg-info' }}">
                    <span class="text text-white {{ Request::is('siswa/raport2*') ? 'bg-secondary' : 'bg-info' }}">Nilai
                        2</span>
                </a>
                <a href="/siswa/raport3/{{ $siswa->id }}"
                    class="btn btn-icon-split {{ Request::is('siswa/raport3*') ? 'bg-secondary' : 'bg-info' }}">
                    <span class="text text-white {{ Request::is('siswa/raport3*') ? 'bg-secondary' : 'bg-info' }}">Nilai
                        3</span>
                </a>
                <a href="/siswa/raport4/{{ $siswa->id }}"
                    class="btn btn-icon-split {{ Request::is('siswa/raport4*') ? 'bg-secondary' : 'bg-info' }}">
                    <span class="text text-white {{ Request::is('siswa/raport4*') ? 'bg-secondary' : 'bg-info' }}">Nilai
                        4</span>
                </a>


            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Penilaian Tambahan
                            <?= $siswa['nama'] ?></h6>
                    </div>
                    <div class="card-body side-com">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="/siswa/raport4/nilai" method="POST">
                                    @csrf
                                    <div class="form-group row">

                                        <input type="hidden" id="indikator" name="indikator" value="1">
                                        <input type="hidden" id="idsiswa" name="idsiswa" value="{{ $siswa->id }}">
                                        <label class="col-sm-4 col-form-label">Izin</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control text-hp" id="izin" name="izin"
                                                value="{{ $nilai->izin }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Sakit</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control text-hp" id="sakit" name="sakit"
                                                value="{{ $nilai->sakit }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Tanpa Ketereangan</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control text-hp" id="alpa" name="alpa"
                                                value="{{ $nilai->alpa }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Kesehatan Gigi</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control text-hp" id="gigi" name="gigi"
                                                value="{{ $nilai->gigi }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Kerapihan</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control text-hp" id="kerapihan"
                                                name="kerapihan" value="{{ $nilai->kerapihan }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Kebersihan</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control text-hp" id="kebersihan"
                                                name="kebersihan" value="{{ $nilai->kebersihan }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success tombol-tambah">
                                            <span class="icon text-white">
                                                <i class="fas fa-pen mr-2"></i>
                                            </span>
                                            <span class="text">Simpan</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form action="/siswa/raport4/nilai" method="POST">
                                    @csrf
                                    <label for="" class="col-form-label text-hp text-center"
                                        style="width: 100%;">PESAN GURU</label>
                                    <input type="hidden" id="indikator" name="indikator" value="2">
                                    <input type="hidden" id="idsiswa" name="idsiswa" value="{{ $siswa->id }}">
                                    <textarea class="form-control mb-2 text-white" id="pesan" name="pesan"
                                        style="resize:vertical; text-align: justify; height: 13em;">{{ $nilai->pesan }}</textarea>
                                    <div class="mb-1">
                                        <button type="submit" class="btn btn-info tombol-tambah" style="width: 100%;">
                                            <span class="text text-white">SIMPAN PESAN GURU</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">

                                <div class="table-responsive">
                                    <table class="table table-bordered text-hp" cellspacing="0">
                                        <thead class="text-center">
                                            <tr class="text-center">
                                                <th style="vertical-align: middle; width: 10%;">No</th>
                                                <th style="vertical-align: middle;">Ekskul</th>
                                                <th style="vertical-align: middle; width: 20%;">Nilai</th>
                                                <th style="vertical-align: middle; width: 25%;">Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($ekstra as $s) : ?>
                                            <?php
                                            $nilai_ekstra_siswa = null;
                                            foreach ($nilai_ekstra as $ne) {
                                                if ($ne->ekstra_id == $s->id) {
                                                    $nilai_ekstra_siswa = $ne->nilai;
                                                }
                                            }
                                            ?>
                                            <tr>
                                                <td style="vertical-align: middle;" class="text-center">
                                                    <?= $i ?></td>
                                                <td style="vertical-align: middle;"><?= $s['ekstra'] ?>
                                                </td>
                                                <td style="vertical-align: middle; text-align:center;">
                                                    {{ $nilai_ekstra_siswa }}
                                                </td>
                                                <td style="vertical-align: middle;" class="text-center">
                                                    <button data-toggle="modal" data-target="#plus_ekstra<?= $s['id'] ?>"
                                                        class="btn btn-circle btn-sm btn-secondary tombol-plus">
                                                        <span class="icon text-white">
                                                            <i class="fas fa-pen"></i>
                                                        </span>
                                                    </button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="plus_ekstra<?= $s['id'] ?>" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header mb-3">
                                                            <h5 class="modal-title" style="color: gray">Nilai Ekskul</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="/siswa/raport4/nilai_ekstra" method="POST">
                                                            @csrf
                                                            <div class="container">
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12">
                                                                        <input type="hidden" class="form-control"
                                                                            id="idsiswa" name="idsiswa"
                                                                            value="{{ $siswa->id }}">
                                                                        <input type="hidden" class="form-control"
                                                                            id="idekstra" name="idekstra"
                                                                            value="<?= $s['id'] ?>">
                                                                        <p style="color: gray">{{ $s->ekstra }}</p>
                                                                        <input type="text" class="form-control"
                                                                            id="nilaiekstra" name="nilaiekstra"
                                                                            placeholder="nilai"
                                                                            value="{{ $nilai_ekstra_siswa }}">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Tutup</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Lanjut</button>
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
                        </div>
                    </div>

                    <div class="card-body side-hp text-hp">
                        <form action="/siswa/raport4/nilai" method="POST">
                            @csrf
                            <div class="form-group row">

                                <input type="hidden" id="indikator" name="indikator" value="1">
                                <input type="hidden" id="idsiswa" name="idsiswa" value="{{ $siswa->id }}">
                                <label class="col-sm-4 col-form-label">Izin</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control"
                                        id="izin" name="izin"
                                        value="{{ $nilai->izin }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Sakit</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control"
                                        id="sakit" name="sakit"
                                        value="{{ $nilai->sakit }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tanpa Ketereangan</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control"
                                        id="alpa" name="alpa"
                                        value="{{ $nilai->alpa }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Kesehatan Gigi</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control"
                                        id="gigi" name="gigi"
                                        value="{{ $nilai->gigi }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Kerapihan</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control"
                                        id="kerapihan"
                                        name="kerapihan" value="{{ $nilai->kerapihan }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Kebersihan</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control"
                                        id="kebersihan"
                                        name="kebersihan" value="{{ $nilai->kebersihan }}">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-sm btn-success tombol-tambah">
                                    <span class="icon text-white">
                                        <i class="fas fa-pen mr-2"></i>
                                    </span>
                                    <span class="text">Simpan</span>
                                </button>
                            </div>
                        </form>

                        <form class="mb-4" action="/siswa/raport4/nilai" method="POST">
                            @csrf
                            <label for="" class="col-form-label text-hp text-center"
                                style="width: 100%;">PESAN GURU</label>
                            <input type="hidden" id="indikator" name="indikator" value="2">
                            <input type="hidden" id="idsiswa" name="idsiswa" value="{{ $siswa->id }}">
                            <textarea class="form-control mb-2 text-white" id="pesan" name="pesan"
                                style="resize:vertical; text-align: justify;">{{ $nilai->pesan }}</textarea>
                            <div class="mb-1">
                                <button type="submit" class="btn btn-info btn-sm tombol-tambah" style="width: 100%;">
                                    <span class="text text-white text-hp">SIMPAN PESAN GURU</span>
                                </button>
                            </div>
                        </form>

                        <div style="margin-top: 30px;"></div>
                        <h6 class="m-0 font-weight-bold text-hp text-uppercase text-center">Nilai Ekskul
                            <?= $siswa['nama'] ?></h6>
                        <div style="margin-top:20px;"></div>
                        <?php $i = 1; ?>
                        <?php foreach ($ekstra as $s) : ?>
                        <?php
                        $nilai_ekstra_siswa = null;
                        foreach ($nilai_ekstra as $ne) {
                            if ($ne->ekstra_id == $s->id) {
                                $nilai_ekstra_siswa = $ne->nilai;
                            }
                        }
                        ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative;">
                            <div style="width:10vw;">
                                <div><?= $i ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><?= $s['ekstra'] ?> : {{ $nilai_ekstra_siswa }}</p>
                            </div>
                            <div class="btnMenuSiswa" style="width:10vw; display: flex; justify-content:right;"
                                id="btnMenuSiswa" data-idsiswa="<?= $s['id'] ?>">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>
                            <div class="menuSiswaD shadow"
                                style="display:none; position:absolute; right:0; top:0; z-index:99; background-color:white;"
                                id="menuSiswaD{{ $s->id }}">

                                <div style="border-radius:10px;">
                                    <a class="dropdown-item text-gray-800 nilai_indikator" data-toggle="modal"
                                    data-target="#plus_ekstrahp<?= $s['id'] ?>">
                                        Nilai
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="modal fade" id="plus_ekstrahp<?= $s['id'] ?>" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header mb-3">
                                        <h5 class="modal-title" style="color: gray">Nilai Ekskul</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/siswa/raport4/nilai_ekstra" method="POST">
                                        @csrf
                                        <div class="container">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="hidden" class="form-control" id="idsiswa"
                                                        name="idsiswa" value="{{ $siswa->id }}">
                                                    <input type="hidden" class="form-control" id="idekstra"
                                                        name="idekstra" value="<?= $s['id'] ?>">
                                                    <p style="color: gray">{{ $s->ekstra }}</p>
                                                    <input type="text" class="form-control" id="nilaiekstra"
                                                        name="nilaiekstra" placeholder="nilai"
                                                        value="{{ $nilai_ekstra_siswa }}">
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

@endsection
