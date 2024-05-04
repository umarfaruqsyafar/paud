@extends('app.layouts.main')

@section('container')
    <div class="container-fluid">
        <div class="row">
            <!-- Earnings (Monthly) Card Example -->

            <div class="col-xl-4 col-md-6 mb-3">
                <div class="card border-left-primary h-100 py-0">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h6 mb-0 font-weight-bold text-gray-800">Tabungan</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calculator fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        @can('admin')
                            <div class="row mt-2">
                                <div class="col">
                                    <a href="/siswa/tabungan/siswa/{{ $siswa->id }}"
                                        class="btn btn-warning tombol-info btn-sm">
                                        <span class="text-white">Info
                                        </span>
                                    </a>
                                </div>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-3">
                <div class="card border-left-primary h-100 py-0">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h6 mb-0 font-weight-bold text-gray-800">SPP</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calculator fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        @can('admin')
                            <div class="row mt-2">
                                <div class="col">
                                    <a href="/siswa/spp/siswa/{{ $siswa->id }}" class="btn btn-warning tombol-info btn-sm">
                                        <span class="text-white">Info
                                        </span>
                                    </a>
                                </div>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-3">
                <div class="card border-left-primary h-100 py-0">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h6 mb-0 font-weight-bold text-gray-800">Administrasi</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calculator fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        @can('admin')
                            <div class="row mt-2">
                                <div class="col">
                                    <a href="/siswa/administrasi/siswa/{{ $siswa->id }}"
                                        class="btn btn-warning tombol-info btn-sm">
                                        <span class="text-white">Info
                                        </span>
                                    </a>
                                </div>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-3">
                <div class="card border-left-primary h-100 py-0">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h6 mb-0 font-weight-bold text-gray-800">Data Siswa</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        @can('admin')
                            <div class="row mt-2">
                                <div class="col">
                                    <a href="/siswa/datadiri/{{ $siswa->id }}" class="btn btn-warning tombol-info btn-sm">
                                        <span class="text-white">Info
                                        </span>
                                    </a>
                                </div>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-3">
                <div class="card border-left-primary h-100 py-0">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h6 mb-0 font-weight-bold text-gray-800">Raport Siswa</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        @can('admin')
                            <div class="row mt-2">
                                <div class="col">
                                    <a href="/siswa/raport/lihat/{{ $siswa->id }}"
                                        class="btn btn-warning tombol-info btn-sm">
                                        <span class="text-white">Info
                                        </span>
                                    </a>
                                </div>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
