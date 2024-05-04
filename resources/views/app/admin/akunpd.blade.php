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
                <a class="btn btn-info btn-icon-split" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <span class="text">Pilih Kelas</span>
                    <span class="icon text-white-50">
                        <i class="fas fa-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-center" aria-labelledby="userDropdown">
                    <a class="dropdown-item">
                        Semua Siswa
                    </a>
                    <div class="dropdown-divider"></div>
                    @foreach ($kelas as $k)
                        <a class="dropdown-item" href="/dashboard/akunpd/kelas/{{ $k->tendik_id }}">
                            {{ $k->kelas }}
                        </a>
                        <div class="dropdown-divider"></div>
                    @endforeach
                </div>
                <a class="btn btn-info btn-icon-split">
                    <span class="text">Semua Siswa</span>
                </a>
                <a href="/dashboard/akunpd/unduh/all" class="btn btn-secondary btn-icon-split" style="float: right;">
                    <span class="icon text-white-50">
                        <i class="fas fa-download"></i>
                    </span>
                    <span class="text">Unduh</span>
                </a>
            </div>
            <div class="col-lg-4 mb-3">
                <form action="/dashboard/akunpd" method="get">
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
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Akun Peserta Didik</h6>
                </div>
                <div class="card-body side-com">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Panggilan</th>
                                    <th>NIS</th>
                                    <th>NISN</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Ubah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($siswa as $s)
                                    <tr>
                                        <td class="text-center">{{ $i }}</td>
                                        <td>{{ $s->nama }}</td>
                                        <td class="text-center">{{ $s->panggilan }}</td>
                                        <td class="text-center">{{ $s->nis }}</td>
                                        <td class="text-center">{{ $s->nisn }}</td>
                                        <td class="text-center">{{ $s->username }}</td>
                                        <td class="text-center">***</td>
                                        <td class="text-center">
                                            <a data-toggle="modal" data-target="#perubahan"
                                                class="btn btn-circle btn-sm tombol-edit akunPD"
                                                data-idsiswa="{{ $s->id }}" data-nama="{{ $s->nama }}"
                                                data-nis="{{ $s->nis }}" data-nisn="{{ $s->nisn }}"
                                                data-username="{{ $s->username }}">
                                                <span class="icon text-white">
                                                    <i class="fas fa-recycle"></i>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-body side-hp">
                    <?php $i = 1; ?>
                    @foreach ($siswa as $s)
                        <div class="topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative; font-size:14px;">
                            <div style="width:10vw;">
                                <div>{{ $i }}</div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p>{{ $s->nama }}</p>
                                <p style="margin-top:-18px;">{{ $s->panggilan }}</p>
                                <p style="margin-top:-18px;">NIS : {{ $s->nis }} NISN : {{ $s->nisn }}</p>
                                <p style="margin-top:-18px;">Username : {{ $s->username }}</p>
                                <p style="margin-top:-18px;">Password : ***</p>
                            </div>
                            <div class="btnMenuSiswa" style="width:10vw; display: flex; justify-content:right;"
                                id="btnMenuSiswa" data-idsiswa="{{ $s->id }}">
                                <i class="fas fa-info-circle text-warning"></i>
                            </div>
                            <div class="menuSiswaD shadow"
                                style="display:none; position:absolute; right:0; top:0; z-index:3; background-color:white;"
                                id="menuSiswaD{{ $s->id }}">

                                <div style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                    <a class="dropdown-item text-gray-800 akunPD" data-toggle="modal"
                                        data-target="#perubahan" data-idsiswa="{{ $s->id }}"
                                        data-nama="{{ $s->nama }}" data-nis="{{ $s->nis }}"
                                        data-nisn="{{ $s->nisn }}" data-username="{{ $s->username }}">
                                        Ubah
                                    </a>
                                </div>
                            </div>

                        </div>
                        <hr style="background-color: white; margin-top:-10px;">
                        <?php $i++; ?>
                    @endforeach
                </div>
            </div>
        </div>

    </div>





    <!-- Modal Perubahan Tabungan -->
    <div class="modal fade" id="perubahan" tabindex="-1" role="dialog" aria-labelledby="perubahanLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="perubahanLabel">Perubahan Akun</h5>
                    <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/dashboard/akunpd/ubah" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-2">
                            <label>Nama</label>
                            <input type="hidden" class="form-control" id="idSiswaUbah" name="idSiswaUbah">
                            <input type="text" class="form-control" id="namaUbah" name="namaUbah" readonly>
                        </div>
                        <div class="mb-2">
                            <label>NIS</label>
                            <input type="text" class="form-control" id="nisUbah" name="nisUbah">
                        </div>
                        <div class="mb-2">
                            <label>NISN</label>
                            <input type="text" class="form-control" id="nisnUbah" name="nisnUbah">
                        </div>
                        <div class="mb-2">
                            <label>Username</label>
                            <input type="text" class="form-control" id="usernameUbah" name="usernameUbah">
                        </div>
                        <div class="mb-2">
                            <label>Password</label>
                            <input type="text" class="form-control" id="passwordUbah" name="passwordUbah">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary tambahMenabung">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const akunPD = document.querySelectorAll(".akunPD");
        akunPD.forEach(function(button) {
            button.addEventListener("click", function() {
                // Dapatkan data ID siswa dari atribut data
                var id_siswa = this.getAttribute("data-idsiswa");
                var nama = this.getAttribute("data-nama");
                var nis = this.getAttribute("data-nis");
                var nisn = this.getAttribute("data-nisn");
                var username = this.getAttribute("data-username");
                $('#idSiswaUbah').val(id_siswa);
                $('#namaUbah').val(nama);
                $('#nisUbah').val(nis);
                $('#nisnUbah').val(nisn);
                $('#usernameUbah').val(username);
            });
        });
    </script>
@endsection
