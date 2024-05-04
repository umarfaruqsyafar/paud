@extends('app.layouts.main')
@section('container')
    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="alert bg-warning text-white" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <!-- Page Heading -->
        @can('admin')
        <div class="row">
            <div class="col-lg-8 mb-3">
                <a data-toggle="modal" data-target="#newSubMenuModal" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Layanan Pembayaran</span>
                </a>
            </div>
        </div>
        @endcan
        

        <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            @foreach ($bank as $b)
                <div class="col-xl-3 col-md-6 mb-3">
                    <div class="card border-left-primary h-100 py-0">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        {{ $b->no_reg }} ({{ $b->layanan }})</div>
                                    <div class="h6 mb-0 font-weight-bold text-gray-800">{{ $b->nama }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-fax fa-2x text-gray-300"></i>
                                </div>
                            </div>
                            @can('admin')
                            <div class="row mt-2">
                                <div class="col">
                                    <a class="btn btn-success tombol-edit databank btn-sm" data-toggle="modal"
                                        data-target="#edit" data-idbank="{{ $b->id }}"
                                        data-nama="{{ $b->nama }}" data-layanan="{{ $b->layanan }}"
                                        data-no_reg="{{ $b->no_reg }}">
                                        <span class="text-white">Ubah
                                        </span>
                                    </a>
                                    <a class="btn btn-danger tombol-min databank btn-sm" data-toggle="modal"
                                        data-target="#hapus" data-idbank="{{ $b->id }}"
                                        data-nama="{{ $b->nama }}" data-layanan="{{ $b->layanan }}"
                                        data-no_reg="{{ $b->no_reg }}">
                                        <span class="text-white">Hapus
                                        </span>
                                    </a>
                                </div>
                            </div>
                            @endcan
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Layanan Bank</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/dashboard/bank/tambah" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="text" class="form-control" required id="layanan" name="layanan"
                                placeholder="Nama Bank">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" required id="no_reg" name="no_reg"
                                placeholder="No Rekening">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" required id="nama" name="nama"
                                placeholder="Nama Pemilik Rekening">
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

    <!-- MODAL -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="pluskegLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: grey;">Ubah Layanan</h5>
                    <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/dashboard/bank/ubah" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" class="form-control" required id="idbankUbah" name="idbankUbah">
                            <input type="text" class="form-control" required id="layananUbah" name="layananUbah">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" required id="no_regUbah" name="no_regUbah">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" required id="namaUbah" name="namaUbah">
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

    <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="pluskegLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: grey;">Hapus Layanan</h5>
                    <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/dashboard/bank/hapus" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-2">
                            <input type="hidden" class="form-control" id="idbankHapus" name="idbankHapus">
                            <p class="text-grey form-control border-0" id="nama" name="nama">
                                Yakin ingin menghapus layanan "<span id="bankhapus"></span>" ?
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
        const databank = document.querySelectorAll(".databank");
        databank.forEach(function(button) {
            button.addEventListener("click", function() {
                // Dapatkan data ID siswa dari atribut data
                var idbank = this.getAttribute("data-idbank");
                var nama = this.getAttribute("data-nama");
                var layanan = this.getAttribute("data-layanan");
                var no_reg = this.getAttribute("data-no_reg");
                $('#idbankUbah').val(idbank);
                $('#idbankHapus').val(idbank);
                $('#namaUbah').val(nama);
                $('#layananUbah').val(layanan);
                $('#no_regUbah').val(no_reg);
                document.getElementById('bankhapus').innerHTML = layanan;
            });
        });
    </script>
@endsection
