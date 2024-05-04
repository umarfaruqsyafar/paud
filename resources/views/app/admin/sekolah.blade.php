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
            <div class="col-lg-12 mb-3">
                @can('admin')
                    <a class="btn btn-info btn-icon-split" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <span class="text">Pilih</span>
                        <span class="icon text-white-50">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-center" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="/dashboard/lembaga/sekolah">
                            Sekolah
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/dashboard/lembaga/yayasan">
                            Yayasan
                        </a>
                    </div>
                    <a class="btn btn-info btn-icon-split">
                        <span class="icon text-white bg-info">
                            <i class="fas fa-school"></i>
                        </span>
                        <span class="text text-capitalize" style="margin-left: -10px;">{{ $lembaga }}</span>
                    </a>
                @endcan
            </div>
        </div>
        <div>
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-capitalize">Profile {{ $lembaga }}</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="text-capitalize">Nama {{ $lembaga }}<span style="position: absolute; right:10px;">:</span>
                                    </p>
                                </div>
                                <div class="col-md-8">
                                    <p class="garis-sekolah">{{ $sekolah['nama'] }}</p>
                                    <hr class="garis-sekolah" style="background-color: white;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Alamat<span style="position: absolute; right:10px;">:</span></p>
                                </div>
                                <div class="col-md-8">
                                    <p class="garis-sekolah">{{ $sekolah['alamat'] }}</p>
                                    <hr class="garis-sekolah" style="background-color: white;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Desa/Kelurahan<span style="position: absolute; right:10px;">:</span></p>
                                </div>
                                <div class="col-md-8">
                                    <p class="garis-sekolah">{{ $sekolah['desa'] }}</p>
                                    <hr class="garis-sekolah" style="background-color: white;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Kecamatan<span style="position: absolute; right:10px;">:</span></p>
                                </div>
                                <div class="col-md-8">
                                    <p class="garis-sekolah">{{ $sekolah['kecamatan'] }}</p>
                                    <hr class="garis-sekolah" style="background-color: white;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Kabupaten<span style="position: absolute; right:10px;">:</span></p>
                                </div>
                                <div class="col-md-8">
                                    <p class="garis-sekolah">{{ $sekolah['kabupaten'] }}</p>
                                    <hr class="garis-sekolah" style="background-color: white;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Provinsi<span style="position: absolute; right:10px;">:</span></p>
                                </div>
                                <div class="col-md-8">
                                    <p class="garis-sekolah">{{ $sekolah['provinsi'] }}</p>
                                    <hr class="garis-sekolah" style="background-color: white;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Rt/Rw<span style="position: absolute; right:10px;">:</span></p>
                                </div>
                                <div class="col-md-8">
                                    <p class="garis-sekolah">{{ $sekolah['rtrw'] }}</p>
                                    <hr class="garis-sekolah" style="background-color: white;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Nama Dusun<span style="position: absolute; right:10px;">:</span></p>
                                </div>
                                <div class="col-md-8">
                                    <p class="garis-sekolah">{{ $sekolah['dusun'] }}</p>
                                    <hr class="garis-sekolah" style="background-color: white;">
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Kode Pos<span style="position: absolute; right:10px;">:</span></p>
                                </div>
                                <div class="col-md-8">
                                    <p class="garis-sekolah">{{ $sekolah['kode_pos'] }}</p>
                                    <hr class="garis-sekolah" style="background-color: white;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Nomer Telepon<span style="position: absolute; right:10px;">:</span></p>
                                </div>
                                <div class="col-md-8">
                                    <p class="garis-sekolah">{{ $sekolah['telepon'] }}</p>
                                    <hr class="garis-sekolah" style="background-color: white;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>No Fax<span style="position: absolute; right:10px;">:</span></p>
                                </div>
                                <div class="col-md-8">
                                    <p class="garis-sekolah">{{ $sekolah['fax'] }}</p>
                                    <hr class="garis-sekolah" style="background-color: white;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Email<span style="position: absolute; right:10px;">:</span></p>
                                </div>
                                <div class="col-md-8">
                                    <p class="garis-sekolah">{{ $sekolah['email'] }}</p>
                                    <hr class="garis-sekolah" style="background-color: white;">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p>Logo Lembaga<span style="position: absolute; right:10px;">:</span></p>

                                </div>
                                <div class="col-md-4 mb-4">
                                    <img src="{{ asset('storage/' . $sekolah['logo']) }}" class=" img-thumbnail">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <a data-toggle="modal" data-target="#dataSekolah"
                                        class="btn btn-success tombol-tambah">
                                        <span class="icon text-white mr-2">
                                            <i class="fas fa-recycle"></i>
                                        </span>
                                        <span class="text">Edit Profile</span>
                                    </a>
                                </div>
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-4">
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal Ubah Data -->
    <div class="modal fade" id="dataSekolah" tabindex="-1" role="dialog" aria-labelledby="dataSekolahLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header mb-3">
                    <h5 class="modal-title text-capitalize" id="dataSekolahLabel">Ubah Profile {{ $lembaga }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="/dashboard/lembaga/update" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <div class="form-group row">
                            <input type="hidden" class="form-control" id="lembaga" name="lembaga"
                                value="{{ $lembaga }}">
                            <input type="hidden" class="form-control" id="id" name="id"
                                value="{{ $sekolah['id'] }}">
                            <input type="hidden" class="form-control" id="old_image" name="old_image"
                                value="{{ $sekolah['logo'] }}">
                            <label for="sekolah" class="col-sm-2 col-form-label text-capitalize">{{ $lembaga }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ $sekolah['nama'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="{{ $sekolah['alamat'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="desa" class="col-sm-2 col-form-label">Des/Kel</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="desa" name="desa"
                                    value="{{ $sekolah['desa'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kecamatan" class="col-sm-2 col-form-label">Kec</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                                    value="{{ $sekolah['kecamatan'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kabupaten" class="col-sm-2 col-form-label">Kab</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kabupaten" name="kabupaten"
                                    value="{{ $sekolah['kabupaten'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="provinsi" class="col-sm-2 col-form-label">Prov</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="provinsi" name="provinsi"
                                    value="{{ $sekolah['provinsi'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rtrw" class="col-sm-2 col-form-label">Rt/Rw</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="rtrw" name="rtrw"
                                    value="{{ $sekolah['rtrw'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dusun" class="col-sm-2 col-form-label">Dusun</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="dusun" name="dusun"
                                    value="{{ $sekolah['dusun'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_pos" class="col-sm-2 col-form-label">KodePos</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kode_pos" name="kode_pos"
                                    value="{{ $sekolah['kode_pos'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_pos" class="col-sm-2 col-form-label">Telp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="telepon" name="telepon"
                                    value="{{ $sekolah['telepon'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_pos" class="col-sm-2 col-form-label">No Fax</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fax" name="fax"
                                    value="{{ $sekolah['fax'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_pos" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email"
                                    value="{{ $sekolah['email'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kode_pos" class="col-sm-2 col-form-label">Picture</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="{{ asset('storage/' . $sekolah['logo']) }}" class=" img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image"
                                                name="image" value="{{ $sekolah['logo'] }}">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
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
