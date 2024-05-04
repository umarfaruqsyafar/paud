@extends('auth.main')

@section('container')
    <div class="container">

        <div>
            <div class="row justify-content-center">

                <div class="col-xl-6 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-4">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Halaman Login</h1>
                                        </div>
                                        @if (session()->has('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        @if (session()->has('loginError'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ session('loginError') }}
                                            </div>
                                        @endif
                                        <form class="user" action="/login" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text"
                                                    class="form-control form-control-user @error('username') is-invalid @enderror"
                                                    value="{{ old('username') }}" id="username" name="username"
                                                    placeholder="Masukkan username" autofocus>
                                                @error('username')
                                                    <small class="text-danger pl-3">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="password"
                                                    class="form-control form-control-user @error('password') is-invalid @enderror"
                                                    value="{{ old('password') }}" id="password" name="password"
                                                    placeholder="Kata sandi">
                                                @error('password')
                                                    <small class="text-danger pl-3">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-user btn-block"
                                                style="background-color: #5da698; color:white;">
                                                <b>Masuk</b>
                                            </button>
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a style="color: #5da698;" class="small" href="/register">Daftar Sebagai
                                                Peserta Didik</a>
                                        </div>
                                        <div class="text-center">
                                            <a style="color: #5da698;" class="small" href="/">Kembali Ke Beranda</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
