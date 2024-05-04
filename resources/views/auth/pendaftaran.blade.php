@extends('auth.main')

@section('container')
    <div class="container">
        <div class="d-flex flex-row flax-wrap">
            <div class="card" style="width: 100%; height: 100%; margin-top:3rem; margin-bottom:3rem; padding-bottom:2rem;">
                <div class="d-flex flex-row justify-content-center">
                    <h4 style="margin-top: 2rem; margin-bottom:1rem;">FORM PENDAFTARAN</h4>
                </div>
                <div class="d-flex flex-row justify-content-center" style="width:100%;">
                </div>
                <form class="user" method="POST" action="/register">
                    @csrf
                    <div class="container d-flex flex-row flex-wrap" style="justify-content: center;">
                        <div style="width: 19rem; margin-left:5px; margin-right:5px;">
                            <div class="form-group">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" placeholder="Nama Lengkap" autofocus
                                    value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('panggilan') is-invalid @enderror"
                                    id="panggilan" name="panggilan" placeholder="Nama Panggilan"
                                    value="{{ old('panggilan') }}">
                                @error('panggilan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select name="tingkat" id="tingkat"
                                    class="form-control @error('tingkat') is-invalid @enderror">
                                    @if (old('tingkat'))
                                        <option value="{{ old('tingkat') }}">{{ old('tingkat') }}</option>
                                    @else
                                        <option value="">Tingkat</option>
                                    @endif
                                    <option value="TK A">TK A</option>
                                    <option value="TK B">TK B</option>
                                    <option value="KB A">KB A</option>
                                    <option value="KB B">KB B</option>
                                    <option value="Day Care">Day Care</option>
                                </select>
                                @error('tingkat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select name="jk" id="jk"
                                    class="form-control @error('jk') is-invalid @enderror">
                                    @if (old('jk'))
                                    <?php 
                                    if (old('jk') == 'L') {
                                        $jk = 'Laki-laki';
                                    } else {
                                        $jk = 'Laki-Perempuan';
                                    }
                                    ?>
                                        <option value="{{ old('jk') }}">{{ $jk }}</option>
                                    @else
                                        <option value="">Jenis kelamin</option>
                                    @endif
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                @error('jk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                                    name="nik" placeholder="NIK" value="{{ old('nik') }}">
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('anak_ke') is-invalid @enderror"
                                    id="anak_ke" name="anak_ke" placeholder="Anak ke-" value="{{ old('anak_ke') }}">
                                @error('anak_ke')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('tempat') is-invalid @enderror"
                                    id="tempat" name="tempat" placeholder="Tempat Lahir" value="{{ old('tempat') }}">
                                @error('tempat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input placeholder="Tanggal Lahir" type="text" onfocus="(this.type='date')"
                                    class="form-control @error('lahir') is-invalid @enderror" id="lahir" name="lahir"
                                    placeholder="Tanggal lahir" value="{{ old('lahir') }}">
                                @error('lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div style="width: 19rem; margin-left:5px; margin-right:5px;">
                            <div class="form-group">
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                    id="alamat" name="alamat" placeholder="Alamat" value="{{ old('alamat') }}">
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('desa') is-invalid @enderror"
                                    id="desa" name="desa" placeholder="Desa/Kelurahan" value="{{ old('desa') }}">
                                @error('desa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('kecamatan') is-invalid @enderror"
                                    id="kecamatan" name="kecamatan" placeholder="Kecamatan"
                                    value="{{ old('kecamatan') }}">
                                @error('kecamatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('kabupaten') is-invalid @enderror"
                                    id="kabupaten" name="kabupaten" placeholder="Kabupaten"
                                    value="{{ old('kabupaten') }}">
                                @error('kabupaten')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('provinsi') is-invalid @enderror"
                                    id="provinsi" name="provinsi" placeholder="Provinsi"
                                    value="{{ old('provinsi') }}">
                                @error('provinsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror"
                                    id="nama_ibu" name="nama_ibu" placeholder="Nama Lengkap Ibu"
                                    value="{{ old('nama_ibu') }}"> @error('nama_ibu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('pdd_ibu') is-invalid @enderror"
                                    id="pdd_ibu" name="pdd_ibu" placeholder="Pendidikan Terakhir Ibu"
                                    value="{{ old('pdd_ibu') }}">
                                @error('pdd_ibu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                                    id="pekerjaan_ibu" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu"
                                    value="{{ old('pekerjaan_ibu') }}">
                                @error('pekerjaan_ibu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div style="width: 19rem; margin-left:5px; margin-right:5px;">
                            <div class="form-group">
                                <input type="text" class="form-control @error('agama_ibu') is-invalid @enderror"
                                    id="agama_ibu" name="agama_ibu" placeholder="Agama Ibu"
                                    value="{{ old('agama_ibu') }}"> @error('agama_ibu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('no_ibu') is-invalid @enderror"
                                    id="no_ibu" name="no_ibu" placeholder="No Hp (Whatsapp) Ibu"
                                    value="{{ old('no_ibu') }}"> @error('no_ibu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah"
                                    placeholder="Nama Lengkap Ayah">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="pdd_ayah" name="pdd_ayah"
                                    placeholder="Pendidikan Terakhir Ayah">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah"
                                    placeholder="Pekerjaan Ayah">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="agama_ayah" name="agama_ayah"
                                    placeholder="Agama Ayah">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="no_ayah" name="no_ayah"
                                    placeholder="No Hp (Whatsapp) Ayah">
                            </div>

                            <button type="submit" class="btn btn-user btn-block"
                                style="background-color:#5da698; color:white;">
                                Daftarkan Peserta Didik
                            </button>
                        </div>
                    </div>
                </form>
                <div class="d-flex flex-row justify-content-center" style="margin-top: 1rem;">
                    <div>
                        <div class="text-center">
                            <a style="color: #5da698;" class="small" href="/login">Sudah memiliki akun. Pergi ke halaman Login</a>
                        </div>
                        <div class="text-center">
                            <a style="color: #5da698;" class="small" href="/">Kembali ke beranda</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
