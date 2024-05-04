<?php
$lahir = $siswa->lahir;
$lahir1 = new DateTime($lahir);
$today = new DateTime('today');

$umur = $today->diff($lahir1)->y;
$bulan = $today->diff($lahir1)->m;
?>
@extends('app.layouts.main')

@section('container')
    <div class="container-fluid">

        <div>
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-capitalize">Ubah Data <?= $siswa['nama'] ?></h6>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="container alert bg-warning text-white" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form class="user" method="POST" action="/dashboard/pd/update_siswa">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-hp m-hp">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control text-hp" id="id_siswa" name="id_siswa"
                                    value="<?= $siswa['id'] ?>">
                                <input type="text" class="form-control text-hp" id="nama" name="nama"
                                    value="<?= $siswa['nama'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-hp m-hp">Nama Panggilan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-hp" id="panggilan" name="panggilan"
                                    value="<?= $siswa['panggilan'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-hp m-hp">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select name="jk" id="jk" class="form-control text-hp" required>
                                    <option value="<?= $siswa['jk'] ?>"><?= $siswa['jk'] ?></option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        @can('admin')
                            <?php
                            if ($siswa->tingkat == 'tk_a') {
                                $tkt = 'TK A';
                            } elseif ($siswa->tingkat == 'tk_b') {
                                $tkt = 'TK B';
                            } elseif ($siswa->tingkat == 'kb_a') {
                                $tkt = 'KB A';
                            } elseif ($siswa->tingkat == 'kb_b') {
                                $tkt = 'KB B';
                            } else {
                                $tkt = 'DAY CARE';
                            }
                            
                            ?>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-hp m-hp">Tingkat</label>
                                <div class="col-sm-10">
                                    <select name="tingkat" id="tingkat" class="form-control text-hp" required>
                                        <option value="<?= $siswa['tingkat'] ?>"><?= $tkt ?></option>
                                        <option value="tk_a">TK A</option>
                                        <option value="tk_b">TK B</option>
                                        <option value="kb_a">KB A</option>
                                        <option value="kb_b">KB B</option>
                                        <option value="dc">Day Care</option>
                                    </select>
                                </div>
                            </div>
                        @endcan
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-hp m-hp">NIK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-hp" id="nik" name="nik"
                                    value="<?= $siswa['nik'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-hp m-hp">NIS</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-hp" id="nis" name="nis"
                                    value="<?= $siswa['nis'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-hp m-hp">NISN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-hp" id="nisn" name="nisn"
                                    value="<?= $siswa['nisn'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-hp m-hp">Anak Ke</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-hp" id="anak_ke" name="anak_ke"
                                    value="<?= $siswa['anak_ke'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-hp m-hp">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-hp" id="tempat" name="tempat"
                                    value="<?= $siswa['tempat'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-hp m-hp">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control text-hp" id="lahir" name="lahir"
                                    value="<?= $siswa['lahir'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-hp m-hp">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-hp" id="alamat" name="alamat"
                                    value="<?= $siswa['alamat'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-hp m-hp">Desa/Kelurahan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-hp" id="desa" name="desa"
                                    value="<?= $siswa['desa'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-hp m-hp">Kecamatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-hp" id="kecamatan" name="kecamatan"
                                    value="<?= $siswa['kecamatan'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-hp m-hp">Kabupaten</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-hp" id="kabupaten" name="kabupaten"
                                    value="<?= $siswa['kabupaten'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-hp m-hp">Provinsi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-hp" id="provinsi" name="provinsi"
                                    value="<?= $siswa['provinsi'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-hp m-hp">Nama Ibu</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-hp" id="nama_ibu" name="nama_ibu"
                                    value="<?= $siswa['nama_ibu'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-hp m-hp">Pendidikan Ibu</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-hp" id="pdd_ibu" name="pdd_ibu"
                                    value="<?= $siswa['pdd_ibu'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-hp m-hp">Pekerjaan Ibu</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-hp" id="pekerjaan_ibu"
                                    name="pekerjaan_ibu" value="<?= $siswa['pekerjaan_ibu'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-hp m-hp">Agama Ibu</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-hp" id="agama_ibu" name="agama_ibu"
                                    value="<?= $siswa['agama_ibu'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-hp m-hp">No. HP Ibu</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-hp" id="no_ibu" name="no_ibu"
                                    value="<?= $siswa['no_ibu'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-hp m-hp">Nama Ayah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-hp" id="nama_ayah" name="nama_ayah"
                                    value="<?= $siswa['nama_ayah'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-hp m-hp">Pendidikan Ayah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-hp" id="pdd_ayah" name="pdd_ayah"
                                    value="<?= $siswa['pdd_ayah'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-hp m-hp">Pekerjaan Ayah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-hp" id="pekerjaan_ayah"
                                    name="pekerjaan_ayah" value="<?= $siswa['pekerjaan_ayah'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-hp m-hp">Agama Ayah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-hp" id="agama_ayah" name="agama_ayah"
                                    value="<?= $siswa['agama_ayah'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-hp m-hp">No. HP Ayah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-hp" id="no_ayah" name="no_ayah"
                                    value="<?= $siswa['no_ayah'] ?>">
                            </div>
                        </div>
                        <div class="modal-footer" style="margin-right: -15px;">
                            <a href="/dashboard/pd" class="btn btn-success text-white btn-icon-split"><span
                                    class="text">Tutup</span></a>
                            <button type="submit" class="btn btn-primary text-white btn-icon-split"><span
                                    class="text">Simpan</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
