@extends('app.layouts.main')

@section('container')
    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert bg-warning text-white" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-8 mb-3"></div>
            <div class="col-lg-4 mb-3">
                <form action="/siswa/raport" method="get">
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

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Penilaian Raport Siswa</h6>
                    </div>
                    <div class="card-body side-com">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIS</th>
                                        <th>NISN</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($siswa as $sm) : ?>
                                    <tr>
                                        <td style="vertical-align: middle;" class="text-center"><?= $i ?>
                                        </td>
                                        <td style="vertical-align: middle;">{{ $sm->nama }}</td>
                                        <td style="vertical-align: middle;" class="text-center">
                                            {{ $sm->nis }}
                                        <td style="vertical-align: middle;" class="text-center">
                                            {{ $sm->nisn }}
                                        </td>
                                        <td style="vertical-align: middle;" class="text-center">
                                            <a href="/siswa/raport/{{ $sm->id }}/1"
                                                class="btn btn-circle btn-sm btn-primary tombol-plus">
                                                <span class="icon text-white-100">
                                                    <i class="fas fa-pen"></i>
                                                </span>
                                            </a>
                                            <a href="/siswa/raport/lihat/{{ $sm->id }}/see"
                                                class="btn btn-circle btn-sm btn-warning tombol-info infoSiswa">
                                                <span class="icon text-white-100">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                            </a>
                                            <a href="/siswa/raport/lihat/{{ $sm->id }}/print" class="btn btn-circle btn-sm btn-info tombol-min">
                                                <span class="icon text-white-100">
                                                    <i class="fas fa-print"></i>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-body side-hp">
                        <?php $i = 1; ?>
                        <?php foreach ($siswa as $sm) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative;">
                            <div style="width:10vw;">
                                <div><?= $i ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p>{{ $sm->nama }}</p>
                                <p style="margin-top:-18px;">NIS : {{ $sm->nis }} NISN : {{ $sm->nisn }}</p>
                                <p style="margin-top:-18px;">{{ $sm->tempat }},
                                    <?= date('d-m-Y', strtotime($sm->lahir)) ?></p>
                            </div>
                            <div class="btnMenuSiswa" style="width:10vw; display: flex; justify-content:right;"
                                id="btnMenuSiswa" data-idsiswa="{{ $sm->id }}">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>
                            <div class="menuSiswaD shadow"
                                style="display:none; position:absolute; right:0; top:0; z-index:3; background-color:white;"
                                id="menuSiswaD{{ $sm->id }}">

                                <div style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                    <a class="dropdown-item text-gray-800 dataadmin" class="btn btn-primary"
                                        href="/siswa/raport/{{ $sm->id }}/1">
                                        Nilai
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-gray-800" href="/siswa/raport/lihat/{{ $sm->id }}/see">
                                        Lihat
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="/siswa/raport/lihat/{{ $sm->id }}/print" class="dropdown-item text-gray-800">
                                        Cetak
                                    </a>
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
