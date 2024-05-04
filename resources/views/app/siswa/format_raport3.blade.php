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
                <a data-toggle="modal" data-target="#pilar" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Keterangan</span>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">9 Pilar Karakter dan K4</h6>
                    </div>
                    <div class="card-body side-com">
                        <div class="table-responsive">
                            <h6><b>Pilar 1. Cinta Tuhan dan Segenap CiptaanNya</b></h6>
                            <div class="table-responsive">
                                <table class="table table-bordered text-hp" cellspacing="0">
                                    <thead class="text-center">
                                        <tr class="text-center">
                                            <th style="vertical-align: middle; width: 10%;">No</th>
                                            <th style="vertical-align: middle;">Bidang Pengembangan Karakter
                                            </th>
                                            <th style="vertical-align: middle; width: 30%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($pilar1 as $s) : ?>
                                        <tr>
                                            <td style="vertical-align: middle;" class="text-center">
                                                <?= $i ?></td>
                                            <td style="vertical-align: middle;"><?= $s['keterangan'] ?></td>
                                            <td style="vertical-align: middle;" class="text-center">
                                                <button data-toggle="modal" data-target="#edit_pilar"
                                                    data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}"
                                                    class="btn btn-secondary tombol-edit btn-circle btn-sm datapilar">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-recycle"></i>
                                                    </span>
                                                </button>
                                                <button data-toggle="modal" data-target="#delete_pilar"
                                                    data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}"
                                                    class="btn btn-secondary tombol-min btn-circle btn-sm datapilar">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                            <h6><b>Pilar 2. Mandiri, Disiplin, dan Tanggung Jawab</b></h6>
                            <div class="table-responsive">
                                <table class="table table-bordered text-hp" cellspacing="0">
                                    <thead class="text-center">
                                        <tr class="text-center">
                                            <th style="vertical-align: middle; width: 10%;">No</th>
                                            <th style="vertical-align: middle;">Bidang Pengembangan Karakter
                                            </th>
                                            <th style="vertical-align: middle; width: 30%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($pilar2 as $s) : ?>
                                        <tr>
                                            <td style="vertical-align: middle;" class="text-center">
                                                <?= $i ?></td>
                                            <td style="vertical-align: middle;"><?= $s['keterangan'] ?></td>
                                            <td style="vertical-align: middle;" class="text-center">
                                                <button data-toggle="modal" data-target="#edit_pilar"
                                                    data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}"
                                                    class="btn btn-secondary tombol-edit btn-circle btn-sm datapilar">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-recycle"></i>
                                                    </span>
                                                </button>
                                                <button data-toggle="modal" data-target="#delete_pilar"
                                                    data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}"
                                                    class="btn btn-secondary tombol-min btn-circle btn-sm datapilar">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <h6><b>Pilar 3. Jujur, Amanah, dan Berkata Bijak</b></h6>
                            <div class="table-responsive">
                                <table class="table table-bordered text-hp" cellspacing="0">
                                    <thead class="text-center">
                                        <tr class="text-center">
                                            <th style="vertical-align: middle; width: 10%;">No</th>
                                            <th style="vertical-align: middle;">Bidang Pengembangan
                                                Karakter</th>
                                            <th style="vertical-align: middle; width: 30%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($pilar3 as $s) : ?>
                                        <tr>
                                            <td style="vertical-align: middle;" class="text-center">
                                                <?= $i ?></td>
                                            <td style="vertical-align: middle;"><?= $s['keterangan'] ?>
                                            </td>
                                            <td style="vertical-align: middle;" class="text-center">
                                                <button data-toggle="modal" data-target="#edit_pilar"
                                                    data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}"
                                                    class="btn btn-secondary tombol-edit btn-circle btn-sm datapilar">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-recycle"></i>
                                                    </span>
                                                </button>
                                                <button data-toggle="modal" data-target="#delete_pilar"
                                                    data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}"
                                                    class="btn btn-secondary tombol-min btn-circle btn-sm datapilar">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <h6><b>Pilar 4. Hormat dan Santun</b></h6>
                            <div class="table-responsive">
                                <table class="table table-bordered text-hp" cellspacing="0">
                                    <thead class="text-center">
                                        <tr class="text-center">
                                            <th style="vertical-align: middle; width: 10%;">No</th>
                                            <th style="vertical-align: middle;">Bidang Pengembangan
                                                Karakter</th>
                                            <th style="vertical-align: middle; width: 30%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($pilar4 as $s) : ?>
                                        <tr>
                                            <td style="vertical-align: middle;" class="text-center">
                                                <?= $i ?></td>
                                            <td style="vertical-align: middle;"><?= $s['keterangan'] ?>
                                            </td>
                                            <td style="vertical-align: middle;" class="text-center">
                                                <button data-toggle="modal" data-target="#edit_pilar"
                                                    data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}"
                                                    class="btn btn-secondary tombol-edit btn-circle btn-sm datapilar">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-recycle"></i>
                                                    </span>
                                                </button>
                                                <button data-toggle="modal" data-target="#delete_pilar"
                                                    data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}"
                                                    class="btn btn-secondary tombol-min btn-circle btn-sm datapilar">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <h6><b>Pilar 5. Dermawan, Suka Menolong, dan Bekerja Sama</b></h6>
                            <div class="table-responsive">
                                <table class="table table-bordered text-hp" cellspacing="0">
                                    <thead class="text-center">
                                        <tr class="text-center">
                                            <th style="vertical-align: middle; width: 10%;">No</th>
                                            <th style="vertical-align: middle;">Bidang Pengembangan
                                                Karakter</th>
                                            <th style="vertical-align: middle; width: 30%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($pilar5 as $s) : ?>
                                        <tr>
                                            <td style="vertical-align: middle;" class="text-center">
                                                <?= $i ?></td>
                                            <td style="vertical-align: middle;"><?= $s['keterangan'] ?>
                                            </td>
                                            <td style="vertical-align: middle;" class="text-center">
                                                <button data-toggle="modal" data-target="#edit_pilar"
                                                    data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}"
                                                    class="btn btn-secondary tombol-edit btn-circle btn-sm datapilar">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-recycle"></i>
                                                    </span>
                                                </button>
                                                <button data-toggle="modal" data-target="#delete_pilar"
                                                    data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}"
                                                    class="btn btn-secondary tombol-min btn-circle btn-sm datapilar">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <h6><b>Pilar 6. Percaya Diri, Kreatif, dan Pantang Menyerah</b></h6>
                            <div class="table-responsive">
                                <table class="table table-bordered text-hp" cellspacing="0">
                                    <thead class="text-center">
                                        <tr class="text-center">
                                            <th style="vertical-align: middle; width: 10%;">No</th>
                                            <th style="vertical-align: middle;">Bidang Pengembangan
                                                Karakter</th>
                                            <th style="vertical-align: middle; width: 30%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($pilar6 as $s) : ?>
                                        <tr>
                                            <td style="vertical-align: middle;" class="text-center">
                                                <?= $i ?></td>
                                            <td style="vertical-align: middle;"><?= $s['keterangan'] ?>
                                            </td>
                                            <td style="vertical-align: middle;" class="text-center">
                                                <button data-toggle="modal" data-target="#edit_pilar"
                                                    data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}"
                                                    class="btn btn-secondary tombol-edit btn-circle btn-sm datapilar">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-recycle"></i>
                                                    </span>
                                                </button>
                                                <button data-toggle="modal" data-target="#delete_pilar"
                                                    data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}"
                                                    class="btn btn-secondary tombol-min btn-circle btn-sm datapilar">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <h6><b>Pilar 7. Pemimpin Yang Baik dan Adil</b></h6>
                            <div class="table-responsive">
                                <table class="table table-bordered text-hp" cellspacing="0">
                                    <thead class="text-center">
                                        <tr class="text-center">
                                            <th style="vertical-align: middle; width: 10%;">No</th>
                                            <th style="vertical-align: middle;">Bidang Pengembangan
                                                Karakter</th>
                                            <th style="vertical-align: middle; width: 30%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($pilar7 as $s) : ?>
                                        <tr>
                                            <td style="vertical-align: middle;" class="text-center">
                                                <?= $i ?></td>
                                            <td style="vertical-align: middle;"><?= $s['keterangan'] ?>
                                            </td>
                                            <td style="vertical-align: middle;" class="text-center">
                                                <button data-toggle="modal" data-target="#edit_pilar"
                                                    data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}"
                                                    class="btn btn-secondary tombol-edit btn-circle btn-sm datapilar">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-recycle"></i>
                                                    </span>
                                                </button>
                                                <button data-toggle="modal" data-target="#delete_pilar"
                                                    data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}"
                                                    class="btn btn-secondary tombol-min btn-circle btn-sm datapilar">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <h6><b>Pilar 8. Baik dan Rendah Hati</b></h6>
                            <div class="table-responsive">
                                <table class="table table-bordered text-hp" cellspacing="0">
                                    <thead class="text-center">
                                        <tr class="text-center">
                                            <th style="vertical-align: middle; width: 10%;">No</th>
                                            <th style="vertical-align: middle;">Bidang Pengembangan
                                                Karakter</th>
                                            <th style="vertical-align: middle; width: 30%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($pilar8 as $s) : ?>
                                        <tr>
                                            <td style="vertical-align: middle;" class="text-center">
                                                <?= $i ?></td>
                                            <td style="vertical-align: middle;"><?= $s['keterangan'] ?>
                                            </td>
                                            <td style="vertical-align: middle;" class="text-center">
                                                <button data-toggle="modal" data-target="#edit_pilar"
                                                    data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}"
                                                    class="btn btn-secondary tombol-edit btn-circle btn-sm datapilar">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-recycle"></i>
                                                    </span>
                                                </button>
                                                <button data-toggle="modal" data-target="#delete_pilar"
                                                    data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}"
                                                    class="btn btn-secondary tombol-min btn-circle btn-sm datapilar">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <h6><b>Pilar 9. Toleran, Cinta Damai, dan Bersatu</b></h6>
                            <div class="table-responsive">
                                <table class="table table-bordered text-hp" cellspacing="0">
                                    <thead class="text-center">
                                        <tr class="text-center">
                                            <th style="vertical-align: middle; width: 10%;">No</th>
                                            <th style="vertical-align: middle;">Bidang Pengembangan
                                                Karakter</th>
                                            <th style="vertical-align: middle; width: 30%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($pilar9 as $s) : ?>
                                        <tr>
                                            <td style="vertical-align: middle;" class="text-center">
                                                <?= $i ?></td>
                                            <td style="vertical-align: middle;"><?= $s['keterangan'] ?>
                                            </td>
                                            <td style="vertical-align: middle;" class="text-center">
                                                <button data-toggle="modal" data-target="#edit_pilar"
                                                    data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}"
                                                    class="btn btn-secondary tombol-edit btn-circle btn-sm datapilar">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-recycle"></i>
                                                    </span>
                                                </button>
                                                <button data-toggle="modal" data-target="#delete_pilar"
                                                    data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}"
                                                    class="btn btn-secondary tombol-min btn-circle btn-sm datapilar">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <h6><b>Kebersihan, Kerapian, Kesehatan, dan Keamanan</b></h6>
                            <div class="table-responsive">
                                <table class="table table-bordered text-hp" cellspacing="0">
                                    <thead class="text-center">
                                        <tr class="text-center">
                                            <th style="vertical-align: middle; width: 10%;">No</th>
                                            <th style="vertical-align: middle;">Bidang Pengembangan
                                                Karakter</th>
                                            <th style="vertical-align: middle; width: 30%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($pilar10 as $s) : ?>
                                        <tr>
                                            <td style="vertical-align: middle;" class="text-center">
                                                <?= $i ?></td>
                                            <td style="vertical-align: middle;"><?= $s['keterangan'] ?>
                                            </td>
                                            <td style="vertical-align: middle;" class="text-center">
                                                <button data-toggle="modal" data-target="#edit_pilar"
                                                    data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}"
                                                    class="btn btn-secondary tombol-edit btn-circle btn-sm datapilar">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-recycle"></i>
                                                    </span>
                                                </button>
                                                <button data-toggle="modal" data-target="#delete_pilar"
                                                    data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}"
                                                    class="btn btn-secondary tombol-min btn-circle btn-sm datapilar">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-body side-hp">
                        <h6><b>Pilar 1. Cinta Tuhan dan Segenap CiptaanNya</b></h6>
                        <div style="margin-top: 20px;"></div>
                        <?php $i = 1; ?>
                        <?php foreach ($pilar1 as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative;">
                            <div style="width:10vw;">
                                <div><?= $i ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><b>Bidang Pengembang Karakter :</b></p>
                                <p style="margin-top:-18px;"><?= $s['keterangan'] ?></p>
                            </div>
                            <div class="btnMenuSiswa" style="display: flex; justify-content:right;"
                                id="btnMenuSiswa" data-idsiswa="<?= $s['id'] ?>">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>
                            <div class="menuSiswaD"
                                style="display:none; width:30vw; position:absolute; right:0; top:0; z-index: 9; background-color:white;"
                                id="menuSiswaD<?= $s['id'] ?>">
                                <div class="shadow" style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                    <a class="dropdown-item text-hp datapilar" data-toggle="modal"
                                        data-target="#edit_pilar" data-id="{{ $s->id }}"
                                        data-keterangan="{{ $s->keterangan }}">
                                        ubah
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-hp datapilar" data-toggle="modal"
                                        data-target="#delete_pilar" data-id="{{ $s->id }}"
                                        data-keterangan="{{ $s->keterangan }}">
                                        hapus
                                    </a>

                                </div>
                            </div>

                        </div>
                        <hr style="background-color: white; margin-top:-10px;">
                        <?php $i++; ?>
                        <?php endforeach; ?>

                        <div style="margin-top: 20px;"></div>
                        <h6><b>Pilar 2. Mandiri, Disiplin, dan Tanggung Jawab</b></h6>
                        <div style="margin-top: 20px;"></div>
                        <?php $i = 1; ?>
                        <?php foreach ($pilar2 as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative;">
                            <div style="width:10vw;">
                                <div><?= $i ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><b>Bidang Pengembang Karakter :</b></p>
                                <p style="margin-top:-18px;"><?= $s['keterangan'] ?></p>
                            </div>
                            <div class="btnMenuSiswa" style="display: flex; justify-content:right;"
                                id="btnMenuSiswa" data-idsiswa="<?= $s['id'] ?>">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>
                            <div class="menuSiswaD"
                                style="display:none; width:30vw; position:absolute; right:0; top:0; z-index: 9; background-color:white;"
                                id="menuSiswaD<?= $s['id'] ?>">
                                <div class="shadow" style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                    <a class="dropdown-item text-hp datapilar" data-toggle="modal" data-target="#edit_pilar"
                                        data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}">
                                        ubah
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-hp datapilar" data-toggle="modal" data-target="#delete_pilar"
                                        data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}">
                                        hapus
                                    </a>

                                </div>
                            </div>

                        </div>
                        <hr style="background-color: white; margin-top:-10px;">
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        <div style="margin-top: 20px;"></div>
                        <h6><b>Pilar 3. Jujur, Amanah, dan Berkata Bijak</b></h6>
                        <div style="margin-top: 20px;"></div>
                        <?php $i = 1; ?>
                        <?php foreach ($pilar3 as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative;">
                            <div style="width:10vw;">
                                <div><?= $i ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><b>Bidang Pengembang Karakter :</b></p>
                                <p style="margin-top:-18px;"><?= $s['keterangan'] ?></p>
                            </div>
                            <div class="btnMenuSiswa" style="display: flex; justify-content:right;"
                                id="btnMenuSiswa" data-idsiswa="<?= $s['id'] ?>">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>
                            <div class="menuSiswaD"
                                style="display:none; width:30vw; position:absolute; right:0; top:0; z-index: 9; background-color:white;"
                                id="menuSiswaD<?= $s['id'] ?>">
                                <div class="shadow" style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                    <a class="dropdown-item text-hp datapilar" data-toggle="modal" data-target="#edit_pilar"
                                        data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}">
                                        ubah
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-hp datapilar" data-toggle="modal" data-target="#delete_pilar"
                                        data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}">
                                        hapus
                                    </a>

                                </div>
                            </div>

                        </div>
                        <hr style="background-color: white; margin-top:-10px;">
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        <div style="margin-top: 20px;"></div>
                        <h6><b>Pilar 4. Hormat dan Santun</b></h6>
                        <div style="margin-top: 20px;"></div>
                        <?php $i = 1; ?>
                        <?php foreach ($pilar4 as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative;">
                            <div style="width:10vw;">
                                <div><?= $i ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><b>Bidang Pengembang Karakter :</b></p>
                                <p style="margin-top:-18px;"><?= $s['keterangan'] ?></p>
                            </div>
                            <div class="btnMenuSiswa" style="display: flex; justify-content:right;"
                                id="btnMenuSiswa" data-idsiswa="<?= $s['id'] ?>">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>
                            <div class="menuSiswaD"
                                style="display:none; width:30vw; position:absolute; right:0; top:0; z-index: 9; background-color:white;"
                                id="menuSiswaD<?= $s['id'] ?>">
                                <div class="shadow" style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                    <a class="dropdown-item text-hp datapilar" data-toggle="modal" data-target="#edit_pilar"
                                        data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}">
                                        ubah
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-hp datapilar" data-toggle="modal" data-target="#delete_pilar"
                                        data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}">
                                        hapus
                                    </a>

                                </div>
                            </div>

                        </div>
                        <hr style="background-color: white; margin-top:-10px;">
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        <div style="margin-top: 20px;"></div>
                        <h6><b>Pilar 5. Dermawan, Suka Menolong, dan Bekerja Sama</b></h6>
                        <div style="margin-top: 20px;"></div>
                        <?php $i = 1; ?>
                        <?php foreach ($pilar5 as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative;">
                            <div style="width:10vw;">
                                <div><?= $i ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><b>Bidang Pengembang Karakter :</b></p>
                                <p style="margin-top:-18px;"><?= $s['keterangan'] ?></p>
                            </div>
                            <div class="btnMenuSiswa" style="display: flex; justify-content:right;"
                                id="btnMenuSiswa" data-idsiswa="<?= $s['id'] ?>">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>
                            <div class="menuSiswaD"
                                style="display:none; width:30vw; position:absolute; right:0; top:0; z-index: 9; background-color:white;"
                                id="menuSiswaD<?= $s['id'] ?>">
                                <div class="shadow" style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                    <a class="dropdown-item text-hp datapilar" data-toggle="modal" data-target="#edit_pilar"
                                        data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}">
                                        ubah
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-hp datapilar" data-toggle="modal" data-target="#delete_pilar"
                                        data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}">
                                        hapus
                                    </a>

                                </div>
                            </div>

                        </div>
                        <hr style="background-color: white; margin-top:-10px;">
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        <div style="margin-top: 20px;"></div>
                        <h6><b>Pilar 6. Percaya Diri, Kreatif, dan Pantang Menyerah</b></h6>
                        <div style="margin-top: 20px;"></div>
                        <?php $i = 1; ?>
                        <?php foreach ($pilar6 as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative;">
                            <div style="width:10vw;">
                                <div><?= $i ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><b>Bidang Pengembang Karakter :</b></p>
                                <p style="margin-top:-18px;"><?= $s['keterangan'] ?></p>
                            </div>
                            <div class="btnMenuSiswa" style="display: flex; justify-content:right;"
                                id="btnMenuSiswa" data-idsiswa="<?= $s['id'] ?>">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>
                            <div class="menuSiswaD"
                                style="display:none; width:30vw; position:absolute; right:0; top:0; z-index: 9; background-color:white;"
                                id="menuSiswaD<?= $s['id'] ?>">
                                <div class="shadow" style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                    <a class="dropdown-item text-hp datapilar" data-toggle="modal" data-target="#edit_pilar"
                                        data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}">
                                        ubah
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-hp datapilar" data-toggle="modal" data-target="#delete_pilar"
                                        data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}">
                                        hapus
                                    </a>

                                </div>
                            </div>

                        </div>
                        <hr style="background-color: white; margin-top:-10px;">
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        <div style="margin-top: 20px;"></div>
                        <h6><b>Pilar 7. Pemimpin Yang Baik dan Adil</b></h6>
                        <div style="margin-top: 20px;"></div>
                        <?php $i = 1; ?>
                        <?php foreach ($pilar7 as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative;">
                            <div style="width:10vw;">
                                <div><?= $i ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><b>Bidang Pengembang Karakter :</b></p>
                                <p style="margin-top:-18px;"><?= $s['keterangan'] ?></p>
                            </div>
                            <div class="btnMenuSiswa" style="display: flex; justify-content:right;"
                                id="btnMenuSiswa" data-idsiswa="<?= $s['id'] ?>">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>
                            <div class="menuSiswaD"
                                style="display:none; width:30vw; position:absolute; right:0; top:0; z-index: 9; background-color:white;"
                                id="menuSiswaD<?= $s['id'] ?>">
                                <div class="shadow" style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                    <a class="dropdown-item text-hp datapilar" data-toggle="modal" data-target="#edit_pilar"
                                        data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}">
                                        ubah
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-hp datapilar" data-toggle="modal" data-target="#delete_pilar"
                                        data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}">
                                        hapus
                                    </a>

                                </div>
                            </div>

                        </div>
                        <hr style="background-color: white; margin-top:-10px;">
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        <div style="margin-top: 20px;"></div>
                        <h6><b>Pilar 8. Baik dan Rendah Hati</b></h6>
                        <div style="margin-top: 20px;"></div>
                        <?php $i = 1; ?>
                        <?php foreach ($pilar8 as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative;">
                            <div style="width:10vw;">
                                <div><?= $i ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><b>Bidang Pengembang Karakter :</b></p>
                                <p style="margin-top:-18px;"><?= $s['keterangan'] ?></p>
                            </div>
                            <div class="btnMenuSiswa" style="display: flex; justify-content:right;"
                                id="btnMenuSiswa" data-idsiswa="<?= $s['id'] ?>">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>
                            <div class="menuSiswaD"
                                style="display:none; width:30vw; position:absolute; right:0; top:0; z-index: 9; background-color:white;"
                                id="menuSiswaD<?= $s['id'] ?>">
                                <div class="shadow" style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                    <a class="dropdown-item text-hp datapilar" data-toggle="modal" data-target="#edit_pilar"
                                        data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}">
                                        ubah
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-hp datapilar" data-toggle="modal" data-target="#delete_pilar"
                                        data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}">
                                        hapus
                                    </a>

                                </div>
                            </div>

                        </div>
                        <hr style="background-color: white; margin-top:-10px;">
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        <div style="margin-top: 20px;"></div>
                        <h6><b>Pilar 9. Toleran, Cinta Damai, dan Bersatu</b></h6>
                        <div style="margin-top: 20px;"></div>
                        <?php $i = 1; ?>
                        <?php foreach ($pilar9 as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative;">
                            <div style="width:10vw;">
                                <div><?= $i ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><b>Bidang Pengembang Karakter :</b></p>
                                <p style="margin-top:-18px;"><?= $s['keterangan'] ?></p>
                            </div>
                            <div class="btnMenuSiswa" style="display: flex; justify-content:right;"
                                id="btnMenuSiswa" data-idsiswa="<?= $s['id'] ?>">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>
                            <div class="menuSiswaD"
                                style="display:none; width:30vw; position:absolute; right:0; top:0; z-index: 9; background-color:white;"
                                id="menuSiswaD<?= $s['id'] ?>">
                                <div class="shadow" style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                    <a class="dropdown-item text-hp datapilar" data-toggle="modal" data-target="#edit_pilar"
                                        data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}">
                                        ubah
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-hp datapilar" data-toggle="modal" data-target="#delete_pilar"
                                        data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}">
                                        hapus
                                    </a>

                                </div>
                            </div>

                        </div>
                        <hr style="background-color: white; margin-top:-10px;">
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        <div style="margin-top: 20px;"></div>
                        <h6><b>Kebersihan, Kerapian, Kesehatan, dan Keamanan</b></h6>
                        <div style="margin-top: 20px;"></div>
                        <?php $i = 1; ?>
                        <?php foreach ($pilar10 as $s) : ?>
                        <div class="text-hp topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative;">
                            <div style="width:10vw;">
                                <div><?= $i ?></div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p><b>Bidang Pengembang Karakter :</b></p>
                                <p style="margin-top:-18px;"><?= $s['keterangan'] ?></p>
                            </div>
                            <div class="btnMenuSiswa" style="display: flex; justify-content:right;"
                                id="btnMenuSiswa" data-idsiswa="<?= $s['id'] ?>">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>
                            <div class="menuSiswaD"
                                style="display:none; width:30vw; position:absolute; right:0; top:0; z-index: 9; background-color:white;"
                                id="menuSiswaD<?= $s['id'] ?>">
                                <div class="shadow" style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                    <a class="dropdown-item text-hp datapilar" data-toggle="modal" data-target="#edit_pilar"
                                        data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}">
                                        ubah
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-hp datapilar" data-toggle="modal" data-target="#delete_pilar"
                                        data-id="{{ $s->id }}" data-keterangan="{{ $s->keterangan }}">
                                        hapus
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






    <!-- End of Main Content -->

    <div class="modal fade" id="pilar" tabindex="-1" role="dialog" aria-labelledby="doaLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header mb-3">
                    <h5 class="modal-title" id="doaLabel">Tambah Keterangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/siswa/format_raport3/tambah_pilar" method="POST">
                    @csrf
                    <div class="container">
                        <div class="form-group row">
                            <select type="text" class="form-control" id="idpilar" name="idpilar" required>
                                <option value="">Pilih 9 Pilar atau K4</option>
                                <option value="1">Pilar 1</option>
                                <option value="2">Pilar 2</option>
                                <option value="3">Pilar 3</option>
                                <option value="4">Pilar 4</option>
                                <option value="5">Pilar 5</option>
                                <option value="6">Pilar 6</option>
                                <option value="7">Pilar 7</option>
                                <option value="8">Pilar 8</option>
                                <option value="9">Pilar 9</option>
                                <option value="10">K4</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <input type="text" class="form-control" id="keterangan_pilar" name="keterangan_pilar"
                                placeholder="Keterangan" required>
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

    <div class="modal fade" id="edit_pilar" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header mb-3">
                    <h5 class="modal-title">Ubah Keterangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/siswa/format_raport3/ubah_pilar" method="POST">
                    @csrf
                    <div class="container">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="hidden" class="form-control" id="idpilarUbah" name="idpilarUbah">
                                <input type="text" class="form-control" id="keterangan_ubah" name="keterangan_ubah"
                                    required>
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
    <div class="modal fade" id="delete_pilar" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header mb-3">
                    <h5 class="modal-title">Hapus Keterangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/siswa/format_raport3/hapus_pilar" method="POST">
                    @csrf
                    <div class="container">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="hidden" class="form-control" id="idpilarHapus" name="idpilarHapus">
                                <p class="text-gray">Yakin ingin menghapus ketrangan pilar ini ?</p>

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

    <script>
        const datapilar = document.querySelectorAll(".datapilar");
        datapilar.forEach(function(button) {
            button.addEventListener("click", function() {
                // Dapatkan data ID siswa dari atribut data
                var id = this.getAttribute("data-id");
                var keterangan = this.getAttribute("data-keterangan");
                $('#idpilarUbah').val(id);
                $('#idpilarHapus').val(id);
                $('#keterangan_ubah').val(keterangan);
            });
        });
    </script>
@endsection
