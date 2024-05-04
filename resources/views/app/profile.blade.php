@extends('app.layouts.main')

@section('container')
    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="row">
                <div class="col-md-6">
                    <div class="alert bg-warning text-white" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif

        <div class="row mb-3">
            <div class="col-md-6">

                <a data-toggle="modal" data-target="#ubah_profile" class="btn btn-secondary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-recycle"></i>
                    </span>
                    <span class="text">Data Diri</span>
                </a>
            </div>
        </div>
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">My Profile</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-6 mb-4">
                                        @if ($user->image == null)
                                            <img class="img-thumbnail" src="/img/app/default.jpg">
                                        @else
                                            <img class="img-thumbnail" src="{{ asset('storage/' . $user->image) }}">
                                        @endif
                                    </div>
                                    @can('no_siswa')
                                        <div class="col-6 mb-4">
                                            @if ($user->ttd == null)
                                                <img class="img-thumbnail" src="/img/app/image.png">
                                            @else
                                                <img class="img-thumbnail" src="{{ asset('storage/' . $user->ttd) }}">
                                            @endif
                                        </div>
                                    @endcan
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Nama<span style="position: absolute; right:10px;">:</span>
                                        </p>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="garis-sekolah">{{ $user->nama }}</p>
                                        <hr class="garis-sekolah">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>TTL<span style="position: absolute; right:10px;">:</span></p>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="garis-sekolah">{{ $user->tempat }},
                                            {{ date('d F Y', strtotime($user->lahir)) }}</p>
                                        <hr class="garis-sekolah">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Alamat<span style="position: absolute; right:10px;">:</span></p>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="garis-sekolah">{{ $user->alamat }}</p>
                                        <hr class="garis-sekolah">
                                    </div>
                                </div>
                                @can('no_siswa')
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>Deskripsi<span style="position: absolute; right:10px;">:</span></p>
                                        </div>
                                        <div class="col-md-8">
                                            <p class="garis-sekolah">{{ $user->deskripsi }}</p>
                                            <hr class="garis-sekolah">
                                        </div>
                                    </div>
                                @endcan

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="ubah_profile" tabindex="-1" role="dialog" aria-labelledby="dataSekolahLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header mb-3">
                    <h5 class="modal-title" id="dataSekolahLabel">Ubah Data Diri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="/ubah_foto_profile" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="{{ $user['nama'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempat" class="col-sm-2 col-form-label">Tempat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="tempat" name="tempat"
                                    value="{{ $user['tempat'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lahir" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="lahir" name="lahir"
                                    value="{{ $user['lahir'] }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="{{ $user['alamat'] }}">
                            </div>
                        </div>
                        @can('no_siswa')
                            <div class="form-group row">
                                <label for="deskripsi" class="col-sm-2 col-form-label">deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="deskripsi" id="deskripsi">{{ $user->deskripsi }}</textarea>
                                </div>
                            </div>
                        @endcan
                        <input type="hidden" id="iduser" name="iduser" value="{{ $user->id }}">
                        <div class="form-group row">
                            <label for="kode_pos" class="col-sm-2 col-form-label">Picture</label>
                            <div class="col-sm-10">
                                <div class="row">

                                    <div class="col-sm-3">
                                        @if ($user->image == null)
                                            <img src="/img/app/default.jpg" class="img-thumbnail">
                                        @else
                                            <img src="{{ asset('storage/' . $user->image) }}" class="img-thumbnail">
                                        @endif
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image"
                                                name="image" value="{{ $user->image }}">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @can('no_siswa')
                            <div class="form-group row">
                                <label for="kode_pos" class="col-sm-2 col-form-label">Ttd</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            @if ($user->ttd == null)
                                                <img src="/img/app/image.png" class="img-thumbnail">
                                            @else
                                                <img src="{{ asset('storage/' . $user->ttd) }}" class="img-thumbnail">
                                            @endif
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="ttd"
                                                    name="ttd" value="{{ $user->ttd }}">
                                                <label class="custom-file-label" for="ttd">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endcan
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
