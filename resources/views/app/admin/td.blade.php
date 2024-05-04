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
                <a data-toggle="modal" data-target="#newtambahtendik" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah</span>
                </a>
            </div>
        </div>

        <div>
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tenaga Pendidik dan Kependidikan</h6>
                </div>
                <div class="card-body side-com">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tugas</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($tendik as $t)
                                    <tr>
                                        <td style="vertical-align: middle;" class="text-center">
                                            {{ $i }}</td>
                                        <td style="vertical-align: middle;">{{ $t->nama }}</td>
                                        <td style="vertical-align: middle;" class="text-center">
                                            {{ $t->role }}</td>
                                        <td style="vertical-align: middle;" class="text-center">
                                            {{ $t->username }}</td>
                                        <td style="vertical-align: middle;" class="text-center">***</td>
                                        <td style="vertical-align: middle;" class="text-center">
                                            @if ($t->role !== 'admin')
                                                <a data-toggle="modal" data-target="#ubahtendik"
                                                    class="btn btn-circle btn-sm tombol-edit ubahTendik" data-username="{{ $t->username }}"
                                                    data-idtendik="{{ $t->id }}" data-nama="{{ $t->nama }}">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-recycle"></i>
                                                    </span>
                                                </a>
                                                <a data-toggle="modal" data-target="#hapustendik"
                                                    class="btn btn-circle btn-sm tombol-min ubahTendik" data-idtendik="{{ $t->id }}"
                                                    data-nama="{{ $t->nama }}">
                                                    <span class="icon text-white">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                </a>
                                            @endif
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
                    @foreach ($tendik as $t)
                        <div class="topFileSiswa" id="topFile"
                            style="display:flex; margin-top:-10px; position:relative; font-size:14px;">
                            <div style="width:10vw;">
                                <div>{{ $i }}</div>
                            </div>
                            <div class="topMenuSiswa" style="width:80vw;" id="menuSiswa" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <p>{{ $t->nama }}</p>
                                <p style="margin-top:-18px;">{{ $t->role }}</p>
                                <p style="margin-top:-18px;">Username : {{ $t->username }}</p>
                                <p style="margin-top:-18px;">Password : ***</p>
                            </div>
                            @if ($t->role !== 'admin')
                                <div class="btnMenuSiswa" style="width:10vw; display: flex; justify-content:right;"
                                    id="btnMenuSiswa" data-idsiswa="{{ $t->id }}">
                                    <i class="fas fa-info-circle text-warning"></i>
                                </div>
                            @endif
                            <div class="menuSiswaD shadow" style="display:none; width:25vw; position:absolute; right:0; top:0; z-index:3; background-color:white;"
                                id="menuSiswaD{{ $t->id }}">
                                <div style="border-radius:10px; padding-top:10px; padding-bottom:10px;">
                                    <a class="dropdown-item text-gray-800 ubahTendik" data-toggle="modal"
                                    data-target="#ubahtendik" data-username="{{ $t->username }}"
                                    data-idtendik="{{ $t->id }}" data-nama="{{ $t->nama }}">
                                        Ubah
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-gray-800 ubahTendik" data-toggle="modal"
                                    data-target="#hapustendik" data-idtendik="{{ $t->id }}"
                                    data-nama="{{ $t->nama }}">
                                        Hapus
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
    <!-- /.container-fluid -->


    <div class="modal fade" id="newtambahtendik" tabindex="-1" role="dialog" aria-labelledby="newtambahtendikLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newtambahtendikLabel">Tambah Tendik</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/dashboard/td/tambah" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="nama_td" name="nama_td" placeholder="Nama"
                                required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Username" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="pass" name="pass"
                                placeholder="Password" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <select name="id_role" id="id_role" class="form-control" required>
                                <option value="">Sebagai</option>
                                @foreach ($role as $r)
                                    @if ($r->role !== 'admin')
                                        <option value="{{ $r->id }}">{{ $r->role }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ubahtendik" tabindex="-1" role="dialog" aria-labelledby="ubahLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ubahLabel">Ubah Tendik</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/dashboard/td/ubah" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="namatendik">Nama</label>
                            <input type="hidden" class="form-control" id="idtendikUbah" name="idtendikUbah">
                            <input type="text" class="form-control" id="namatendikUbah" name="namatendikUbah"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="usernameUbah" name="usernameUbah" required>
                        </div>
                        <div class="mb-3">
                            <label for="pass">Password</label>
                            <input type="text" class="form-control" id="passUbah" name="passUbah">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="hapustendik" tabindex="-1" role="dialog" aria-labelledby="hapusLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-grey" id="hapusLabel">Hapus Tenaga
                        Pendidik</h5>
                    <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/dashboard/td/hapus" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-2">
                            <input type="hidden" class="form-control" id="idtendikHapus" name="idtendikHapus">
                            <label>Yakin ingin menghapus "<span id="tendikhapus"></span>" ?</label>
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

    <script>
        const tendik = document.querySelectorAll(".ubahTendik");
        tendik.forEach(function(button) {
            button.addEventListener("click", function() {
                // Dapatkan data ID siswa dari atribut data
                var id_tendik = this.getAttribute("data-idtendik");
                var nama = this.getAttribute("data-nama");
                var username = this.getAttribute("data-username");
                $('#idtendikUbah').val(id_tendik);
                $('#idtendikHapus').val(id_tendik);
                $('#namatendikUbah').val(nama);
                $('#usernameUbah').val(username);
                document.getElementById('tendikhapus').innerHTML = nama;
            });
        });
    </script>
@endsection
