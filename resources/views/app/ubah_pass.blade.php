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
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">My Account</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Username<span style="position: absolute; right:10px;">:</span>
                                        </p>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="garis-sekolah">{{ $akun->username }}</p>
                                        <hr class="garis-sekolah">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p>Password<span style="position: absolute; right:10px;">:</span></p>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="garis-sekolah">*****</p>
                                        <hr class="garis-sekolah">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">

                                        <a data-toggle="modal" data-target="#ubah_pass"
                                            class="btn btn-secondary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-recycle"></i>
                                            </span>
                                            <span class="text">Password</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="ubah_pass" tabindex="-1" role="dialog" aria-labelledby="dataSekolahLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header mb-3">
                    <h5 class="modal-title" id="dataSekolahLabel">Ubah Username dan Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="/ubah_password" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <div class="form-group row">
                            <input type="hidden" id="iduser" name="iduser" value="{{ $akun->id }}">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" name="username"
                                    value="{{ $akun->username }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="password" name="password">
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
@endsection
