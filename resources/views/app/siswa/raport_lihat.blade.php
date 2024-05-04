<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="materialize is a material design based mutipurpose responsive template">
    <meta name="keywords"
        content="material design, card style, material template, portfolio, corporate, business, creative, agency">
    <meta name="author" content="trendytheme.net">

    <title>{{ $sekolah->nama }}</title>

    <!--  favicon -->
    <link rel="shortcut icon" href="{{ asset('storage/' . $sekolah['logo']) }}">
    <!--  apple-touch-icon -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="/assets/img/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="/assets/img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/assets/img/ico/apple-touch-icon-57-precomposed.png">

    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,700,900' rel='stylesheet' type='text/css'>
    <!-- Material Icons CSS -->
    <link href="/assets/fonts/iconfont/material-icons.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link href="/assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- owl.carousel -->
    <link href="/assets/owl.carousel/assets/owl.carousel.css" rel="stylesheet">
    <link href="/assets/owl.carousel/assets/owl.theme.default.min.css" rel="stylesheet">
    <!-- flexslider -->
    <link href="/assets/flexSlider/flexslider.css" rel="stylesheet">
    <!-- materialize -->
    <link href="/assets/materialize/css/materialize.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- shortcodes -->
    <link href="/assets/css/shortcodes/shortcodes.css" rel="stylesheet">
    <!-- Style CSS -->
    <!-- <link href="style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="/assets/raport.css">

</head>

<body>
    <!-- Halaman 1 -->
    <div class="dua">
        <img class="logo" src="{{ asset('storage/' . $sekolah['logo']) }}">
    </div>
    <div class="satu">
        <!-- KOP -->
        <div class="row" style="background-attachment: fixed;">
            <div style="position:absolute;">
                <img class="logo-light" src="{{ asset('storage/' . $sekolah['logo']) }}"
                    style="width: 80px; height: 80px; margin-top: 8px; margin-left: 30px;" alt="" />
            </div>
            <div style="margin-left: 50px; text-align:center; font-family: 'Times New Roman', Times, serif;">
                <p class="black-text times" style="font-size: 18px;"><b>{{ $yayasan->nama }}</b></p>
                <p class="black-text times" style="font-size: 18px; margin-top: -5px;"><b><?= $sekolah['nama'] ?></b>
                </p>
                <p class="black-text times" style="font-size: 14px; margin-top: -5px;"><b>"<?= $tingkat ?>"</b></p>
                <p style="margin-top: -5px; font-size: 14px;" class="black-text times"><?= $sekolah['alamat'] ?>
                    {{ $sekolah->desa }} Kecamatan {{ $sekolah->kecamatan }} Kabupaten {{ $sekolah->kabupaten }}</p>
                <p class="black-text times" style="margin-top: -5px; font-size: 14px;" class="black-text times">Telp.
                    <?= $sekolah['telpon'] ?>, e-mail :
                    <span style="color: blue;"><?= $sekolah['email'] ?></span>
                </p>
            </div>
        </div>
        <hr class="mb-20 kop-border" style="margin-top: -10px;">
        <!-- END KOP -->

        <!-- DATA ANAK -->
        <div class="isi-data-anak">
            <h2 align="center">
                <b>DATA ANAK</b><br>
            </h2><br>

            <div class="main" align="left" style="margin-left: 4em; font-family: 'Times New Roman', Times, serif;">
                <h4 class="sub" style="font-size: 14px;"><b>1. IDENTITAS ANAK</b></h4>
                <div style="margin-left: 2em; font-size:14px; margin-bottom:2em;">
                    <p style="font-size: 14px;"><span class="bdt">a. Nama</span><span class="isi_bdt">:
                            <?= $siswa['nama'] ?></span></p>
                    <p style="font-size: 14px;"><span class="bdt">b. Nama Panggilan</span><span class="isi_bdt">:
                            <?= $siswa['panggilan'] ?></span></p>
                    <p style="font-size: 14px;"><span class="bdt">c. Nomor Induk</span><span class="isi_bdt">:
                            <?= $siswa['nis'] ?></span></p>
                    <p style="font-size: 14px;"><span class="bdt">d. Tempat Tanggal Lahir</span><span
                            class="isi_bdt">:
                            <?= $siswa['tempat'] ?>, <?= date('d-m-Y', strtotime($siswa['lahir'])) ?></span></p>
                    <p style="font-size: 14px;"><span class="bdt">e. Jenis Kelamin</span><span class="isi_bdt">:
                            <?= $siswa['jk'] ?></span></p>
                </div>
                <h4 class="sub" style="font-size: 14px;"><b>2. DI TERIMA DI PAUD</b></h4>
                <div style="margin-left: 2em; font-size:14px; margin-bottom:2em;">
                    <p style="font-size: 14px;"><span class="bdt">a. Tanggal</span><span class="isi_bdt">: 17 Juli
                            2022</span></p>
                    <p style="font-size: 14px;"><span class="bdt">b. Kelompok</span><span class="isi_bdt">:
                            <?= $kelompok ?></span></p>
                </div>
                <h4 class="sub" style="font-size: 14px;"><b>3. ORANG TUA/WALI</b></h4>
                <div style="margin-left: 2em; font-size:14px; margin-bottom:2em;">
                    <p style="font-size: 14px;"><span class="bdt">a. Nama Ayah</span><span class="isi_bdt">:
                            <?= $siswa['nama_ayah'] ?></span></p>
                    <p style="font-size: 14px;"><span class="bdt">b. Agama Ayah</span><span class="isi_bdt">:
                            <?= $siswa['agama_ayah'] ?></span></p>
                    <p style="font-size: 14px;"><span class="bdt">c. Pendidikan Ayah</span><span class="isi_bdt">:
                            <?= $siswa['pdd_ayah'] ?></span></p>
                    <p style="font-size: 14px;"><span class="bdt">d. Pekerjaan Ayah</span><span class="isi_bdt">:
                            <?= $siswa['pekerjaan_ayah'] ?></span></p>
                    <p style="font-size: 14px;"><span class="bdt">e. Nama Ibu</span><span class="isi_bdt">:
                            <?= $siswa['nama_ibu'] ?></span></p>
                    <p style="font-size: 14px;"><span class="bdt">f. Agama Ibu</span><span class="isi_bdt">:
                            <?= $siswa['agama_ibu'] ?></span></p>
                    <p style="font-size: 14px;"><span class="bdt">g. Pendidikan Ibu</span><span class="isi_bdt">:
                            <?= $siswa['pdd_ibu'] ?></span></p>
                    <p style="font-size: 14px;"><span class="bdt">h. Pekerjaan Ibu</span><span class="isi_bdt">:
                            <?= $siswa['pekerjaan_ibu'] ?></span></p>
                    <p style="font-size: 14px;"><span class="bdt">i. Alamat</span><span class="isi_bdt">:
                            <?= $siswa['alamat'] ?></span></p>
                    <p style="font-size: 14px;"><span class="bdt">j. No. Telp</span><span class="isi_bdt">:
                            <?= $siswa['no_ibu'] ?></span></p>
                </div>
            </div>

            <br>
            <div class="footer" align="left" style="position: absolute;">
                <img style="width: 3cm; height:4cm; margin-left: 80px;" class="foto" src="/img/app/ukuran.png">
            </div>
            <div
                style="margin-left: 300px; text-align:center; font-family: 'Times New Roman', Times, serif; font-size:14px;">
                <p class="ttd">Pengelola</p>
                <p class="ttd"><?= $sekolah['nama'] ?></p>
                <div class="text-center">
                    @if ($kep->ttd == null)
                        <img style="width: 40%; height: 30%;" src="/img/app/image.png" alt="">
                    @else
                        <img style="width: 40%; height: 30%;" src="{{ asset('storage/' . $kep->ttd) }}"
                            alt="">
                    @endif
                </div>
                <p class="ttd"><strong><u><?= $kep['nama'] ?></u></strong></p>

            </div>
        </div>
        <!-- END DATA ANAK -->
    </div>
    <!-- END Halaman 1 -->

    {{-- Halaman 2 --}}
    <div class="satu">
        {{-- Kop --}}
        <div class="row" style="background-attachment: fixed;">
            <div style="position:absolute;">
                <img class="logo-light" src="{{ asset('storage/' . $sekolah['logo']) }}"
                    style="width: 80px; height: 80px; margin-top: 8px; margin-left: 30px;" alt="" />
            </div>
            <div style="margin-left: 50px; text-align:center; font-family: 'Times New Roman', Times, serif;">
                <p class="black-text times" style="font-size: 18px;"><b>{{ $yayasan->nama }}</b></p>
                <p class="black-text times" style="font-size: 18px; margin-top: -5px;"><b><?= $sekolah['nama'] ?></b>
                </p>
                <p class="black-text times" style="font-size: 14px; margin-top: -5px;"><b>"<?= $tingkat ?>"</b></p>
                <p style="margin-top: -5px; font-size: 14px;" class="black-text times"><?= $sekolah['alamat'] ?>
                    {{ $sekolah->desa }} Kecamatan {{ $sekolah->kecamatan }} Kabupaten {{ $sekolah->kabupaten }}</p>
                <p class="black-text times" style="margin-top: -5px; font-size: 14px;" class="black-text times">Telp.
                    <?= $sekolah['telpon'] ?>, e-mail :
                    <span style="color: blue;"><?= $sekolah['email'] ?></span>
                </p>
            </div>
        </div>
        <hr class="mb-20 kop-border" style="margin-top: -10px;">
        {{-- END Kop --}}

        <div class="isi-halaman-2">
            <!-- DATA SISWA 2 -->
            <div class="main text-center" style="margin-bottom: 20px;">
                <h4><b>PERKEMBANGAN PESERTA DIDIK</b></h4>
                <h4><b>USIA {{ $nilai_awal->usia }} TAHUN</b></h4>
            </div>
            <div>
                <div style="display:flex; font-family: 'Times New Roman', Times, serif; font-size:14px;">
                    <div style="display:flex; justify-content:left; margin-right:50px; widtH:50%;">
                        <div style="width: 60px;">
                            <p style="font-size: 14px;"><b>Nama </b></p>
                        </div>
                        <div>
                            <p style="font-size: 14px; text-transform:uppercase;"><b>: <?= $siswa['nama'] ?></b></p>
                        </div>
                    </div>
                    <div style="display:flex; justify-content:left;">
                        <div style="display: inline-block; width: 150px">
                            <p style="font-size: 14px;"><b>Semester</b></p>
                        </div>
                        <div style="display: inline-block;">
                            <p style="font-size: 14px;"><b>: {{ $nilai_awal->semester }}</b></p>
                        </div>
                    </div>
                </div>
                <div style="display:flex; font-family: 'Times New Roman', Times, serif; font-size:14px;">
                    <div style="display:flex; justify-content:left; margin-right:50px; widtH:50%;">
                        <div style="width: 60px;">
                            <p style="font-size: 14px;"><b>NIS </b></p>
                        </div>
                        <div>
                            <p style="font-size: 14px; text-transform:uppercase;"><b>: <?= $siswa['nis'] ?></b></p>
                        </div>
                    </div>
                    <div style="display:flex; justify-content:left;">
                        <div style="display: inline-block; width: 150px">
                            <p style="font-size: 14px;"><b>Tahun Ajaran</b></p>
                        </div>
                        <div style="display: inline-block;">
                            <p style="font-size: 14px;"><b>: {{ $nilai_awal->tahun }}</b></p>
                        </div>
                    </div>
                </div>
                <div style="display:flex; font-family: 'Times New Roman', Times, serif; font-size:14px;">
                    <div style="display:flex; justify-content:left; margin-right:50px; widtH:50%;">
                        <div style="width: 60px;">
                            <p style="font-size: 14px;"><b>Fase </b></p>
                        </div>
                        <div>
                            <p style="font-size: 14px; text-transform:uppercase;"><b>: {{ $nilai_awal->fase }}</b></p>
                        </div>
                    </div>
                    <div style="display:flex; justify-content:left;">
                        <div style="display: inline-block; width: 150px">
                            <p style="font-size: 14px;"><b>Kurikulum</b></p>
                        </div>
                        <div style="display: inline-block;">
                            <p style="font-size: 14px;"><b>: {{ $nilai_awal->kurikulum }}</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END DATA SISWA 2 -->

            <!-- 9 Pilar -->
            <div class="data-pilar">
                <div class="main" style="margin-top: 20px;">
                    <h5><b>9 PILAR KARAKTER DAN K4</b></h5>
                </div>
                <section style="margin-top: 20px; font-family: 'Times New Roman', Times, serif; font-size:14px;">
                    <h6><b>Pilar 1. Cinta Tuhan dan Segenap CiptaanNya</b></h6>
                    <table class="table-bordered"
                        style="font-family: 'Times New Roman', Times, serif; font-size:14px;">
                        <tr class="text-center">
                            <th rowspan="2" class="text-center" style="width: 6%;">No</th>
                            <th rowspan="2" class="text-center">Bidang Pengembangan Karakter</th>
                            <th colspan="4" class="text-center" style=" width: 30%;">Semester 1</th>
                        </tr>
                        <tr>
                            <th class="text-center">BM</th>
                            <th class="text-center">KM</th>
                            <th class="text-center">SM</th>
                            <th class="text-center">K</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pilar1 as $s) : ?>
                            <?php $cek = DB::select('SELECT * FROM raport_pilar_siswas WHERE siswa_id =' . $siswa->id . ' AND pilar_id =' . $s->id);
                            if (count($cek) > 0) {
                                if ($cek[0]->nilai == 'bm') {
                                    $bm = 'v';
                                    $km = '';
                                    $sm = '';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'km') {
                                    $bm = '';
                                    $km = 'v';
                                    $sm = '';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'sm') {
                                    $bm = '';
                                    $km = '';
                                    $sm = 'v';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'k') {
                                    $bm = '';
                                    $km = '';
                                    $sm = '';
                                    $k = 'v';
                                }
                            } else {
                                $bm = '';
                                $km = '';
                                $sm = '';
                                $k = '';
                            }
                            ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td><?= $s['keterangan'] ?></td>
                                <td class="text-center">
                                    <?= $bm ?></td>
                                <td class="text-center">
                                    <?= $km ?></td>
                                <td class="text-center">
                                    <?= $sm ?></td>
                                <td class="text-center">
                                    <?= $k ?></td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
                <section style="margin-top: 20px; font-family: 'Times New Roman', Times, serif; font-size:14px;">
                    <h6><b>Pilar 2. Mandiri, Disiplin, dan Tanggung Jawab</b></h6>
                    <table class="table-bordered"
                        style="font-family: 'Times New Roman', Times, serif; font-size:14px;">
                        <tr class="text-center">
                            <th rowspan="2" class="text-center" style="width: 6%;">No</th>
                            <th rowspan="2" class="text-center">Bidang Pengembangan Karakter</th>
                            <th colspan="4" class="text-center" style=" width: 30%;">Semester 1</th>
                        </tr>
                        <tr>
                            <th class="text-center">BM</th>
                            <th class="text-center">KM</th>
                            <th class="text-center">SM</th>
                            <th class="text-center">K</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pilar2 as $s) : ?>
                            <?php $cek = DB::select('SELECT * FROM raport_pilar_siswas WHERE siswa_id =' . $siswa->id . ' AND pilar_id =' . $s->id);
                            if (count($cek) > 0) {
                                if ($cek[0]->nilai == 'bm') {
                                    $bm = 'v';
                                    $km = '';
                                    $sm = '';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'km') {
                                    $bm = '';
                                    $km = 'v';
                                    $sm = '';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'sm') {
                                    $bm = '';
                                    $km = '';
                                    $sm = 'v';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'k') {
                                    $bm = '';
                                    $km = '';
                                    $sm = '';
                                    $k = 'v';
                                }
                            } else {
                                $bm = '';
                                $km = '';
                                $sm = '';
                                $k = '';
                            }
                            ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td><?= $s['keterangan'] ?></td>
                                <td class="text-center">
                                    <?= $bm ?></td>
                                <td class="text-center">
                                    <?= $km ?></td>
                                <td class="text-center">
                                    <?= $sm ?></td>
                                <td class="text-center">
                                    <?= $k ?></td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
                <section style="margin-top: 20px; font-family: 'Times New Roman', Times, serif; font-size:14px;">
                    <h6><b>Pilar 3. Jujur, Amanah, dan Berkata Bijak</b></h6>
                    <table class="table-bordered"
                        style="font-family: 'Times New Roman', Times, serif; font-size:14px;">
                        <tr class="text-center">
                            <th rowspan="2" class="text-center" style="width: 6%;">No</th>
                            <th rowspan="2" class="text-center">Bidang Pengembangan Karakter</th>
                            <th colspan="4" class="text-center" style=" width: 30%;">Semester 1</th>
                        </tr>
                        <tr>
                            <th class="text-center">BM</th>
                            <th class="text-center">KM</th>
                            <th class="text-center">SM</th>
                            <th class="text-center">K</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pilar3 as $s) : ?>
                            <?php $cek = DB::select('SELECT * FROM raport_pilar_siswas WHERE siswa_id =' . $siswa->id . ' AND pilar_id =' . $s->id);
                            if (count($cek) > 0) {
                                if ($cek[0]->nilai == 'bm') {
                                    $bm = 'v';
                                    $km = '';
                                    $sm = '';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'km') {
                                    $bm = '';
                                    $km = 'v';
                                    $sm = '';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'sm') {
                                    $bm = '';
                                    $km = '';
                                    $sm = 'v';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'k') {
                                    $bm = '';
                                    $km = '';
                                    $sm = '';
                                    $k = 'v';
                                }
                            } else {
                                $bm = '';
                                $km = '';
                                $sm = '';
                                $k = '';
                            }
                            ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td><?= $s['keterangan'] ?></td>
                                <td class="text-center">
                                    <?= $bm ?></td>
                                <td class="text-center">
                                    <?= $km ?></td>
                                <td class="text-center">
                                    <?= $sm ?></td>
                                <td class="text-center">
                                    <?= $k ?></td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
                <section style="margin-top: 20px; font-family: 'Times New Roman', Times, serif; font-size:14px;">
                    <h6><b>Pilar 4. Hormat dan Santun</b></h6>
                    <table class="table-bordered"
                        style="font-family: 'Times New Roman', Times, serif; font-size:14px;">
                        <tr class="text-center">
                            <th rowspan="2" class="text-center" style="width: 6%;">No</th>
                            <th rowspan="2" class="text-center">Bidang Pengembangan Karakter</th>
                            <th colspan="4" class="text-center" style=" width: 30%;">Semester 1</th>
                        </tr>
                        <tr>
                            <th class="text-center">BM</th>
                            <th class="text-center">KM</th>
                            <th class="text-center">SM</th>
                            <th class="text-center">K</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pilar4 as $s) : ?>
                            <?php $cek = DB::select('SELECT * FROM raport_pilar_siswas WHERE siswa_id =' . $siswa->id . ' AND pilar_id =' . $s->id);
                            if (count($cek) > 0) {
                                if ($cek[0]->nilai == 'bm') {
                                    $bm = 'v';
                                    $km = '';
                                    $sm = '';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'km') {
                                    $bm = '';
                                    $km = 'v';
                                    $sm = '';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'sm') {
                                    $bm = '';
                                    $km = '';
                                    $sm = 'v';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'k') {
                                    $bm = '';
                                    $km = '';
                                    $sm = '';
                                    $k = 'v';
                                }
                            } else {
                                $bm = '';
                                $km = '';
                                $sm = '';
                                $k = '';
                            }
                            ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td><?= $s['keterangan'] ?></td>
                                <td class="text-center">
                                    <?= $bm ?></td>
                                <td class="text-center">
                                    <?= $km ?></td>
                                <td class="text-center">
                                    <?= $sm ?></td>
                                <td class="text-center">
                                    <?= $k ?></td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
                <section style="margin-top: 20px; font-family: 'Times New Roman', Times, serif; font-size:14px;">
                    <h6><b>Pilar 5. Dermawan, Suka Menolong, dan Bekerja Sama</b></h6>
                    <table class="table-bordered"
                        style="font-family: 'Times New Roman', Times, serif; font-size:14px;">
                        <tr class="text-center">
                            <th rowspan="2" class="text-center" style="width: 6%;">No</th>
                            <th rowspan="2" class="text-center">Bidang Pengembangan Karakter</th>
                            <th colspan="4" class="text-center" style=" width: 30%;">Semester 1</th>
                        </tr>
                        <tr>
                            <th class="text-center">BM</th>
                            <th class="text-center">KM</th>
                            <th class="text-center">SM</th>
                            <th class="text-center">K</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pilar5 as $s) : ?>
                            <?php $cek = DB::select('SELECT * FROM raport_pilar_siswas WHERE siswa_id =' . $siswa->id . ' AND pilar_id =' . $s->id);
                            if (count($cek) > 0) {
                                if ($cek[0]->nilai == 'bm') {
                                    $bm = 'v';
                                    $km = '';
                                    $sm = '';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'km') {
                                    $bm = '';
                                    $km = 'v';
                                    $sm = '';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'sm') {
                                    $bm = '';
                                    $km = '';
                                    $sm = 'v';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'k') {
                                    $bm = '';
                                    $km = '';
                                    $sm = '';
                                    $k = 'v';
                                }
                            } else {
                                $bm = '';
                                $km = '';
                                $sm = '';
                                $k = '';
                            }
                            ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td><?= $s['keterangan'] ?></td>
                                <td class="text-center">
                                    <?= $bm ?></td>
                                <td class="text-center">
                                    <?= $km ?></td>
                                <td class="text-center">
                                    <?= $sm ?></td>
                                <td class="text-center">
                                    <?= $k ?></td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
                <section style="margin-top: 20px; font-family: 'Times New Roman', Times, serif; font-size:14px;">
                    <h6><b>Pilar 6. Percaya Diri, Kreatif, dan Pantang Menyerah</b></h6>
                    <table class="table-bordered"
                        style="font-family: 'Times New Roman', Times, serif; font-size:14px;">
                        <tr class="text-center">
                            <th rowspan="2" class="text-center" style="width: 6%;">No</th>
                            <th rowspan="2" class="text-center">Bidang Pengembangan Karakter</th>
                            <th colspan="4" class="text-center" style=" width: 30%;">Semester 1</th>
                        </tr>
                        <tr>
                            <th class="text-center">BM</th>
                            <th class="text-center">KM</th>
                            <th class="text-center">SM</th>
                            <th class="text-center">K</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pilar6 as $s) : ?>
                            <?php $cek = DB::select('SELECT * FROM raport_pilar_siswas WHERE siswa_id =' . $siswa->id . ' AND pilar_id =' . $s->id);
                            if (count($cek) > 0) {
                                if ($cek[0]->nilai == 'bm') {
                                    $bm = 'v';
                                    $km = '';
                                    $sm = '';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'km') {
                                    $bm = '';
                                    $km = 'v';
                                    $sm = '';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'sm') {
                                    $bm = '';
                                    $km = '';
                                    $sm = 'v';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'k') {
                                    $bm = '';
                                    $km = '';
                                    $sm = '';
                                    $k = 'v';
                                }
                            } else {
                                $bm = '';
                                $km = '';
                                $sm = '';
                                $k = '';
                            }
                            ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td><?= $s['keterangan'] ?></td>
                                <td class="text-center">
                                    <?= $bm ?></td>
                                <td class="text-center">
                                    <?= $km ?></td>
                                <td class="text-center">
                                    <?= $sm ?></td>
                                <td class="text-center">
                                    <?= $k ?></td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
                <section style="margin-top: 20px; font-family: 'Times New Roman', Times, serif; font-size:14px;">
                    <h6><b>Pilar 7. Pemimpin Yang Baik dan Adil</b></h6>
                    <table class="table-bordered"
                        style="font-family: 'Times New Roman', Times, serif; font-size:14px;">
                        <tr class="text-center">
                            <th rowspan="2" class="text-center" style="width: 6%;">No</th>
                            <th rowspan="2" class="text-center">Bidang Pengembangan Karakter</th>
                            <th colspan="4" class="text-center" style=" width: 30%;">Semester 1</th>
                        </tr>
                        <tr>
                            <th class="text-center">BM</th>
                            <th class="text-center">KM</th>
                            <th class="text-center">SM</th>
                            <th class="text-center">K</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pilar7 as $s) : ?>
                            <?php $cek = DB::select('SELECT * FROM raport_pilar_siswas WHERE siswa_id =' . $siswa->id . ' AND pilar_id =' . $s->id);
                            if (count($cek) > 0) {
                                if ($cek[0]->nilai == 'bm') {
                                    $bm = 'v';
                                    $km = '';
                                    $sm = '';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'km') {
                                    $bm = '';
                                    $km = 'v';
                                    $sm = '';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'sm') {
                                    $bm = '';
                                    $km = '';
                                    $sm = 'v';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'k') {
                                    $bm = '';
                                    $km = '';
                                    $sm = '';
                                    $k = 'v';
                                }
                            } else {
                                $bm = '';
                                $km = '';
                                $sm = '';
                                $k = '';
                            }
                            ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td><?= $s['keterangan'] ?></td>
                                <td class="text-center">
                                    <?= $bm ?></td>
                                <td class="text-center">
                                    <?= $km ?></td>
                                <td class="text-center">
                                    <?= $sm ?></td>
                                <td class="text-center">
                                    <?= $k ?></td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
                <section style="margin-top: 20px; font-family: 'Times New Roman', Times, serif; font-size:14px;">
                    <h6><b>Pilar 8. Baik dan Rendah Hati</b></h6>
                    <table class="table-bordered"
                        style="font-family: 'Times New Roman', Times, serif; font-size:14px;">
                        <tr class="text-center">
                            <th rowspan="2" class="text-center" style="width: 6%;">No</th>
                            <th rowspan="2" class="text-center">Bidang Pengembangan Karakter</th>
                            <th colspan="4" class="text-center" style=" width: 30%;">Semester 1</th>
                        </tr>
                        <tr>
                            <th class="text-center">BM</th>
                            <th class="text-center">KM</th>
                            <th class="text-center">SM</th>
                            <th class="text-center">K</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pilar8 as $s) : ?>
                            <?php $cek = DB::select('SELECT * FROM raport_pilar_siswas WHERE siswa_id =' . $siswa->id . ' AND pilar_id =' . $s->id);
                            if (count($cek) > 0) {
                                if ($cek[0]->nilai == 'bm') {
                                    $bm = 'v';
                                    $km = '';
                                    $sm = '';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'km') {
                                    $bm = '';
                                    $km = 'v';
                                    $sm = '';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'sm') {
                                    $bm = '';
                                    $km = '';
                                    $sm = 'v';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'k') {
                                    $bm = '';
                                    $km = '';
                                    $sm = '';
                                    $k = 'v';
                                }
                            } else {
                                $bm = '';
                                $km = '';
                                $sm = '';
                                $k = '';
                            }
                            ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td><?= $s['keterangan'] ?></td>
                                <td class="text-center">
                                    <?= $bm ?></td>
                                <td class="text-center">
                                    <?= $km ?></td>
                                <td class="text-center">
                                    <?= $sm ?></td>
                                <td class="text-center">
                                    <?= $k ?></td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
                <section style="margin-top: 20px; font-family: 'Times New Roman', Times, serif; font-size:14px;">
                    <h6><b>Pilar 9. Toleran, Cinta Damai, dan Bersatu</b></h6>
                    <table class="table-bordered"
                        style="font-family: 'Times New Roman', Times, serif; font-size:14px;">
                        <tr class="text-center">
                            <th rowspan="2" class="text-center" style="width: 6%;">No</th>
                            <th rowspan="2" class="text-center">Bidang Pengembangan Karakter</th>
                            <th colspan="4" class="text-center" style=" width: 30%;">Semester 1</th>
                        </tr>
                        <tr>
                            <th class="text-center">BM</th>
                            <th class="text-center">KM</th>
                            <th class="text-center">SM</th>
                            <th class="text-center">K</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pilar9 as $s) : ?>
                            <?php $cek = DB::select('SELECT * FROM raport_pilar_siswas WHERE siswa_id =' . $siswa->id . ' AND pilar_id =' . $s->id);
                            if (count($cek) > 0) {
                                if ($cek[0]->nilai == 'bm') {
                                    $bm = 'v';
                                    $km = '';
                                    $sm = '';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'km') {
                                    $bm = '';
                                    $km = 'v';
                                    $sm = '';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'sm') {
                                    $bm = '';
                                    $km = '';
                                    $sm = 'v';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'k') {
                                    $bm = '';
                                    $km = '';
                                    $sm = '';
                                    $k = 'v';
                                }
                            } else {
                                $bm = '';
                                $km = '';
                                $sm = '';
                                $k = '';
                            }
                            ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td><?= $s['keterangan'] ?></td>
                                <td class="text-center">
                                    <?= $bm ?></td>
                                <td class="text-center">
                                    <?= $km ?></td>
                                <td class="text-center">
                                    <?= $sm ?></td>
                                <td class="text-center">
                                    <?= $k ?></td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
                <section style="margin-top: 20px; font-family: 'Times New Roman', Times, serif; font-size:14px;">
                    <h6><b>Kebersihan, Kerapian, Kesehatan, dan Keamanan</b></h6>
                    <table class="table-bordered"
                        style="font-family: 'Times New Roman', Times, serif; font-size:14px;">
                        <tr class="text-center">
                            <th rowspan="2" class="text-center" style="width: 6%;">No</th>
                            <th rowspan="2" class="text-center">Bidang Pengembangan Karakter</th>
                            <th colspan="4" class="text-center" style=" width: 30%;">Semester 1</th>
                        </tr>
                        <tr>
                            <th class="text-center">BM</th>
                            <th class="text-center">KM</th>
                            <th class="text-center">SM</th>
                            <th class="text-center">K</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pilar10 as $s) : ?>
                            <?php $cek = DB::select('SELECT * FROM raport_pilar_siswas WHERE siswa_id =' . $siswa->id . ' AND pilar_id =' . $s->id);
                            if (count($cek) > 0) {
                                if ($cek[0]->nilai == 'bm') {
                                    $bm = 'v';
                                    $km = '';
                                    $sm = '';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'km') {
                                    $bm = '';
                                    $km = 'v';
                                    $sm = '';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'sm') {
                                    $bm = '';
                                    $km = '';
                                    $sm = 'v';
                                    $k = '';
                                } elseif ($cek[0]->nilai == 'k') {
                                    $bm = '';
                                    $km = '';
                                    $sm = '';
                                    $k = 'v';
                                }
                            } else {
                                $bm = '';
                                $km = '';
                                $sm = '';
                                $k = '';
                            }
                            ?>
                            <tr>
                                <td class="text-center"><?= $i ?></td>
                                <td><?= $s['keterangan'] ?></td>
                                <td class="text-center">
                                    <?= $bm ?></td>
                                <td class="text-center">
                                    <?= $km ?></td>
                                <td class="text-center">
                                    <?= $sm ?></td>
                                <td class="text-center">
                                    <?= $k ?></td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </div>
            <!-- END 9 Pilar -->

            <!-- Capaian -->
            @foreach ($capaian_awal as $cp_awal)
                <section style="margin-top: 20px; font-family: 'Times New Roman', Times, serif; font-size:14px;">
                    <div>
                        <table class="table-bordered">
                            <thead>
                                <tr>
                                    <td colspan="4" class="text-center" id="capaian">
                                        <h6 style="font-size: 14px;"><b>{{ $cp_awal->capaian }}</b></h6>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4" class="isi-capaian" id="capaian">
                                        {{ $cp_awal->deskripsi }}</td>
                                </tr>
                            </tbody>
                            <thead style="font-family: 'Times New Roman', Times, serif; font-size:14px;">
                                <tr>
                                    <td id="capaian" style="width: 6%;" rowspan="2"><b>No</b></td>
                                    <td id="capaian" style="width: 74%;" rowspan="2"><b>Tujuan Pembelajaran</b>
                                    </td>
                                    <td id="capaian" style="width: 20%;" colspan="2"><b>Kemunculan</b></td>
                                </tr>
                                <tr>
                                    <td id="capaian" style="width: 10%;"><b>Ya</b></td>
                                    <td id="capaian" style="width: 10%;"><b>Tidak</b></td>
                                </tr>
                            </thead>
                            <tbody style="font-family: 'Times New Roman', Times, serif; font-size:14px;">
                                <?php $i = 1; ?>
                                <?php foreach ($cp_tujuan as $cp) : ?>
                                <?php if ($cp['raport_capaian_id'] == $cp_awal->id) : ?>
                                <?php
                                $cek_tujuan = DB::select('SELECT * FROM raport_kemunculans WHERE tujuan_id = ' . $cp->id . ' AND siswa_id =' . $siswa->id);
                                ?>
                                <?php if ($cek_tujuan) : ?>
                                <?php
                                if ($cek_tujuan[0]->ya == 1) {
                                    $ya = 'v';
                                } else {
                                    $ya = '';
                                }
                                if ($cek_tujuan[0]->tidak == 1) {
                                    $tidak = 'v';
                                } else {
                                    $tidak = '';
                                }
                                ?>
                                <tr>
                                    <td class="text-center" id="capaian"><?= $i ?></td>
                                    <td id="capaian"><?= $cp['tujuan'] ?></td>
                                    <td class="text-center" id="capaian"><?= $ya ?></td>
                                    <td class="text-center" id="capaian"><?= $tidak ?></td>
                                </tr>
                                <?php else : ?>
                                <tr>
                                    <td class="text-center" id="capaian"><?= $i ?></td>
                                    <td id="capaian"><?= $cp['tujuan'] ?></td>
                                    <td class="text-center" id="capaian"></td>
                                    <td class="text-center" id="capaian"></td>
                                </tr>
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </section>
                <section style="margin-top: 20px; font-family: 'Times New Roman', Times, serif; font-size:16px;">
                    <?php
                    $deskripsi_full = null;
                    $deskripsi_awal = null;
                    $deskripsi_akhir = null;
                    foreach ($nilai_capaian as $nilai_cp) {
                        if ($nilai_cp->capaian_id == $cp_awal->id) {
                            $deskripsi_full = $nilai_cp->deskripsi;
                            $image1 = $nilai_cp->image1;
                            $image2 = $nilai_cp->image2;
                        }
                    }
                    ?>
                    <div class="main text-center capaian">
                        <h6><b>{{ $cp_awal->capaian }}</b></h6>
                    </div>
                    <div class="main text-left isi-capaian" style="overflow: auto;">
                        <?php
                        if ($deskripsi_full !== null) :
                            $banyak = strlen($deskripsi_full);
                            $b = $banyak / 2;
                            $deskripsi_tengah = substr($deskripsi_full, $b);
                            $posisi_tengah = strpos($deskripsi_tengah, "\n");
                            $awal = substr($deskripsi_full, 0, $posisi_tengah + $b);
                            $deskripsi_awal = str_replace("* ", "<br>* ", $awal);
                            $akhir = substr($deskripsi_full, $posisi_tengah + $b);
                            $deskripsi_akhir = str_replace("* ", "<br>* ", $akhir);
                        
                        ?>
                        <p style="font-size: 14px; margin-top:-15px;"><?php if($image1 !== null) : ?><span><img
                                    src="{{ asset('storage/' . $image1) }}" alt="" style="float: left;"
                                    class="gambar"></span><?php endif; ?><?php echo $deskripsi_awal; ?><span><?php if($image2 !== null) : ?><span><img
                                        src="{{ asset('storage/' . $image2) }}" alt="" style="float: right;"
                                        class="gambar"></span><?php endif; ?></span><?= $deskripsi_akhir ?></p>
                        <?php endif; ?>
                    </div>
                </section>
            @endforeach
            <!-- End Capaian -->

            <div style="page-break-before: always;"></div>
            {{-- Doa --}}
            <section>
                {{-- Kop --}}
                <div class="row" style="background-attachment: fixed;">
                    <div style="position:absolute;">
                        <img class="logo-light" src="{{ asset('storage/' . $sekolah['logo']) }}"
                            style="width: 80px; height: 80px; margin-top: 8px; margin-left: 30px;" alt="" />
                    </div>
                    <div style="margin-left: 50px; text-align:center; font-family: 'Times New Roman', Times, serif;">
                        <p class="black-text times" style="font-size: 18px;"><b>{{ $yayasan->nama }}</b></p>
                        <p class="black-text times" style="font-size: 18px; margin-top: -5px;">
                            <b><?= $sekolah['nama'] ?></b>
                        </p>
                        <p class="black-text times" style="font-size: 14px; margin-top: -5px;">
                            <b>"<?= $tingkat ?>"</b>
                        </p>
                        <p style="margin-top: -5px; font-size: 14px;" class="black-text times">
                            <?= $sekolah['alamat'] ?> {{ $sekolah->desa }} Kecamatan {{ $sekolah->kecamatan }}
                            Kabupaten {{ $sekolah->kabupaten }}</p>
                        <p class="black-text times" style="margin-top: -5px; font-size: 14px;"
                            class="black-text times">Telp.
                            <?= $sekolah['telpon'] ?>, e-mail :
                            <span style="color: blue;"><?= $sekolah['email'] ?></span>
                        </p>
                    </div>
                </div>
                <hr class="mb-20 kop-border" style="margin-top: -10px;">
                {{-- END Kop --}}

                <div class="main text-center" style="margin-bottom: 20px;">
                    <h6><b>LAPORAN PENILAIAN DOA DAN SURAH</b></h6>
                </div>
                <div class="main" style="font-family: 'Times New Roman', Times, serif; font-size:14px;">
                    <h6 class="text-center" style="margin-top: -15px;"><b>Perkembangan Do'a - Do'a Pendek</b></h6>
                    <table class="table-bordered text-white" cellspacing="0">
                        <thead>
                            <tr>
                                <th rowspan="2" style="vertical-align: middle; text-align:center; width: 7%;">No
                                </th>
                                <th rowspan="2" style="vertical-align: middle; text-align:center; width: 30%;">
                                    Materi Do'a</th>
                                <th colspan="4" style="vertical-align: middle; text-align:center; width: 28%;">
                                    Penilaian</th>
                                <th rowspan="2" style="vertical-align: middle; text-align:center; width: 25%;">
                                    Keterangan</th>
                            </tr>
                            <tr>
                                <th style="vertical-align: middle; text-align:center; width: 7%;">BM</th>
                                <th style="vertical-align: middle; text-align:center; width: 7%;">KM</th>
                                <th style="vertical-align: middle; text-align:center; width: 7%;">SM</th>
                                <th style="vertical-align: middle; text-align:center; width: 7%;">K</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($nilai_doa as $s) : ?>
                            <tr>
                                <td style="vertical-align: middle;" class="text-center"><?= $i ?></td>
                                <td style="vertical-align: middle;">{{ $s->nilai_doa->doa }}</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <p>
                                            @if ($s->bm)
                                                V
                                            @endif
                                        </p>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <p>
                                            @if ($s->mm)
                                                V
                                            @endif
                                        </p>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <p>
                                            @if ($s->bsh)
                                                V
                                            @endif
                                        </p>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <p>
                                            @if ($s->bsb)
                                                V
                                            @endif
                                        </p>
                                    </div>
                                </td>
                                <td style="vertical-align: middle;"><?= $s->keterangan ?></td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="main" style="font-family: 'Times New Roman', Times, serif; font-size:14px;">
                    <h6 class="text-center" style="margin-top: 20px;"><b>Perkembangan Surah - Surah Pendek</b></h6>
                    <table class="table-bordered text-white" cellspacing="0">
                        <thead>
                            <tr>
                                <th rowspan="2" style="vertical-align: middle; text-align:center; width: 7%;">No
                                </th>
                                <th rowspan="2" style="vertical-align: middle; text-align:center; width: 30%;">
                                    Materi Surah</th>
                                <th colspan="4" style="vertical-align: middle; text-align:center; width: 28%;">
                                    Penilaian</th>
                                <th rowspan="2" style="vertical-align: middle; text-align:center; width: 25%;">
                                    Keterangan</th>
                            </tr>
                            <tr>
                                <th style="vertical-align: middle; text-align:center; width: 7%;">BM</th>
                                <th style="vertical-align: middle; text-align:center; width: 7%;">KM</th>
                                <th style="vertical-align: middle; text-align:center; width: 7%;">SM</th>
                                <th style="vertical-align: middle; text-align:center; width: 7%;">K</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($nilai_surah as $s) : ?>
                            <tr>
                                <td style="vertical-align: middle;" class="text-center"><?= $i ?></td>
                                <td style="vertical-align: middle;">{{ $s->nilai_surah->surah }}</td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <p>
                                            @if ($s->bm)
                                                V
                                            @endif
                                        </p>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <p>
                                            @if ($s->mm)
                                                V
                                            @endif
                                        </p>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <p>
                                            @if ($s->bsh)
                                                V
                                            @endif
                                        </p>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="form-check">
                                        <p>
                                            @if ($s->bsb)
                                                V
                                            @endif
                                        </p>
                                    </div>
                                </td>
                                <td style="vertical-align: middle;"><?= $s->keterangan ?></td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>
            {{-- End Doa --}}

            <div style="page-break-before: always;"></div>
            {{-- Tambahan --}}
            <section>
                {{-- Kop --}}
                <div class="row" style="background-attachment: fixed;">
                    <div style="position:absolute;">
                        <img class="logo-light" src="{{ asset('storage/' . $sekolah['logo']) }}"
                            style="width: 80px; height: 80px; margin-top: 8px; margin-left: 30px;" alt="" />
                    </div>
                    <div style="margin-left: 50px; text-align:center; font-family: 'Times New Roman', Times, serif;">
                        <p class="black-text times" style="font-size: 18px;"><b>{{ $yayasan->nama }}</b></p>
                        <p class="black-text times" style="font-size: 18px; margin-top: -5px;">
                            <b><?= $sekolah['nama'] ?></b>
                        </p>
                        <p class="black-text times" style="font-size: 14px; margin-top: -5px;">
                            <b>"<?= $tingkat ?>"</b>
                        </p>
                        <p style="margin-top: -5px; font-size: 14px;" class="black-text times">
                            <?= $sekolah['alamat'] ?> {{ $sekolah->desa }} Kecamatan {{ $sekolah->kecamatan }}
                            Kabupaten {{ $sekolah->kabupaten }}</p>
                        <p class="black-text times" style="margin-top: -5px; font-size: 14px;"
                            class="black-text times">Telp.
                            <?= $sekolah['telpon'] ?>, e-mail :
                            <span style="color: blue;"><?= $sekolah['email'] ?></span>
                        </p>
                    </div>
                </div>
                <hr class="mb-20 kop-border" style="margin-top: -10px;">
                {{-- END Kop --}}

                <div class="main text-center" style="margin-bottom: 20px;">
                    <h4><b>PERKEMBANGAN PESERTA DIDIK</b></h4>
                </div>
                <section style="margin-top: 10px; font-family: 'Times New Roman', Times, serif; font-size:14px;">
                    <div class="main text-center capaian">
                        <div style="margin: 20px 30px 15px 30px;">
                            <table class="table-bordered">
                                <thead>
                                    <tr>
                                        <td class="text-center" id="capaian"><b>Perkembangan Fisik</b></td>
                                        <td class="text-center" id="capaian"><b>Keterangan</b></td>
                                    </tr>
                                </thead>
                                <?php
                                $bb = null;
                                $tb = null;
                                $lk = null;
                                if ($fisik) {
                                    $bb = $fisik->bb;
                                    $tb = $fisik->tb;
                                    $lk = $fisik->lk;
                                }
                                ?>
                                <tbody>
                                    <tr>
                                        <td id="capaian">Berat badan</td>
                                        <td class="text-center" id="capaian" style="width: 30%;"><?= $bb ?> kg</td>
                                    </tr>
                                    <tr>
                                        <td id="capaian">Tinggi badan</td>
                                        <td class="text-center" id="capaian" style="width: 30%;"><?= $tb ?> cm</td>
                                    </tr>
                                    <tr>
                                        <td id="capaian">Lingkar kepala</td>
                                        <td class="text-center" id="capaian" style="width: 30%;"><?= $lk ?> cm</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>

                <h6><b>Tinggi Badan</b></h6>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChartTB"></canvas>
                        </div>
                        <hr>
                    </div>
                </div>
                <h6><b>Berat Badan</b></h6>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChartBB"></canvas>
                        </div>
                        <hr>
                    </div>
                </div>
                <h6><b>Lingkar epala</b></h6>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChartLK"></canvas>
                        </div>
                        <hr>
                    </div>
                </div>

                <div style="page-break-before: always;"></div>

                <!-- Ekskul -->
                <section style="margin-top: 20px; font-family: 'Times New Roman', Times, serif; font-size:14px;">
                    <div class="main text-center capaian">
                        <h6><b>EKSTRAKURIKULER<br></b></h6>
                        <div style="margin: 20px 30px 15px 30px;">
                            <table class="table-bordered">
                                <thead>
                                    <tr>
                                        <td class="text-center" id="capaian"><b>Nama Ekstrakulikuler</b></td>
                                        <td class="text-center" id="capaian"><b>Nilai</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($nilai_ekstra as $eks) : ?>
                                    <tr>
                                        <td id="capaian">{{ $eks->nilai_ekstra->ekstra }}</td>
                                        <td class="text-center" id="capaian" style="width: 30%;">
                                            {{ $eks->nilai }}</td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>

                <section style="margin-top: 20px; font-family: 'Times New Roman', Times, serif; font-size:14px;">
                    <div class="main text-center capaian">
                        <h6><b>KETIDAK HADIRAN<br></b></h6>
                        <div style="margin: 20px 30px 15px 30px;">
                            <table class="table-bordered">
                                <?php
                                $sakit = '-';
                                $izin = '-';
                                $alpa = '-';
                                $gigi = '-';
                                $kebersihan = '-';
                                $kerapihan = '-';
                                $pesan = '<hr><hr>';
                                if ($tambahan) {
                                    $sakit = $tambahan->sakit;
                                    $izin = $tambahan->izin;
                                    $alpa = $tambahan->alpa;
                                    $gigi = $tambahan->gigi;
                                    $kebersihan = $tambahan->kebersihan;
                                    $kerapihan = $tambahan->kerapihan;
                                    $pesan = $tambahan->pesan;
                                }
                                ?>
                                <tbody>
                                    <tr>
                                        <td id="capaian">Sakit</td>
                                        <td class="text-center" id="capaian" style="width: 30%;"><?= $sakit ?></td>
                                    </tr>
                                    <tr>
                                        <td id="capaian">Izin</td>
                                        <td class="text-center" id="capaian" style="width: 30%;"><?= $izin ?></td>
                                    </tr>
                                    <tr>
                                        <td id="capaian">Tanpa Keterangan</td>
                                        <td class="text-center" id="capaian" style="width: 30%;"><?= $alpa ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
                <section style="margin-top: 20px; font-family: 'Times New Roman', Times, serif; font-size:14px;">
                    <div class="main text-center capaian">
                        <h6><b>PERKEMBANGAN FISIK DAN KESEHATAN<br></b></h6>
                        <div style="margin: 20px 30px 15px 30px;">
                            <table class="table-bordered">
                                <thead>
                                    <tr>
                                        <td class="text-center" id="capaian"><b>Aspek Yang Dinilai</b></td>
                                        <td class="text-center" id="capaian"><b>Keterangan</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="capaian">Kesehatan gigi</td>
                                        <td class="text-center" id="capaian" style="width: 30%;"><?= $gigi ?></td>
                                    </tr>
                                    <tr>
                                        <td id="capaian">Kerapihan</td>
                                        <td class="text-center" id="capaian" style="width: 30%;"><?= $kerapihan ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="capaian">Kebersihan</td>
                                        <td class="text-center" id="capaian" style="width: 30%;"><?= $kebersihan ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>

                <section style="margin-top: 20px; font-family: 'Times New Roman', Times, serif; font-size:14px;">
                    <div class="main text-center capaian">
                        <h6><b>PESAN GURU<br></b></h6>
                        <div class="main" style="margin: 20px 30px 15px 30px;">
                            <p style="text-align: justify; font-size: 14px;"><?= $pesan ?></p>
                        </div>
                    </div>

                </section>
                <section style="margin-top: 20px; font-family: 'Times New Roman', Times, serif; font-size:14px;">
                    <div class="main text-center capaian">
                        <h6><b>KOMENTAR ORANG TUA<br></b></h6>
                        <div class="main" style="text-align: justify; margin: 20px 30px 15px 30px;">
                            <p style="text-align: justify;">
                                <hr>
                                <hr>
                                <hr>
                                <hr>
                            </p>
                        </div>
                    </div>

                </section>
            </section>
            <section style="margin-top: 40px; font-family: 'Times New Roman', Times, serif; font-size:14px;">
                <div class="main" style="height: 200px">
                    <div style="height: 150px; width: 200px; float: left;">
                        <p class="text-center">Mengetahui, <br><span>Kepala {{ $sekolah->nama }}</span></p>
                        <div class="text-center">
                            @if ($kep->ttd == null)
                                <img style="width: 170px; height: 100px;" src="/img/app/image.png" alt="">
                            @else
                                <img style="width: 170px; height: 100px;" src="{{ asset('storage/' . $kep->ttd) }}"
                                    alt="">
                            @endif
                        </div>
                        <p class="text-center"><b><u>{{ $kep->nama }}</u></b></p>
                    </div>
                    <div style="height: 150px; width: 200px; float: right;">
                        <p class="text-center">Bangkalan, {{ $nilai_awal->tanggal_raport }}<br><span>Guru Kelas</span>
                        </p>
                        <div class="text-center">
                            @if ($walas->ttd == null)
                                <img style="width: 170px; height: 100px;" src="/img/app/image.png" alt="">
                            @else
                                <img style="width: 170px; height: 100px;" src="{{ asset('storage/' . $walas->ttd) }}"
                                    alt="">
                            @endif
                        </div>
                        <p class="text-center"><b><u>{{ $walas->nama }}</u></b></p>
                    </div>
                    <div style="height: 150px; width: 200px; float: right; margin-right: 44px;">
                        <p class="text-center text-white"><br><span>Orang Tua/Wali</span></p>
                        <div class="text-center" style="width: 170px; height: 100px;">
                        </div>
                        <p class="text-center"><b><u>. . . . . . . <span>. . . . . . . </span><span>. . . . . . .
                                    </span><span>. . . . . . . </span></u></b></p>
                    </div>
                </div>
            </section>
        </div>
    </div>
    {{-- END Halaman 2 --}}


    <script src="/js_auth/chart.js/Chart.min.js"></script>
    <script>
        var fisikTotal = @json($fisik_total);
    </script>
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        var tbSiswa = [];
        var bbSiswa = [];
        var lkSiswa = [];

        for (const row of fisikTotal) {
            tbSiswa.push(row.tb);
            bbSiswa.push(row.bb);
            lkSiswa.push(row.lk);
        }
        diagramGaris(tbSiswa, "myAreaChartTB");
        diagramGaris(bbSiswa, "myAreaChartBB");
        diagramGaris(lkSiswa, "myAreaChartLK");

        function diagramGaris(dataFisik, idChart) {
            Chart.defaults.global.defaultFontFamily = 'Nunito',
                '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            // var ab = ["100", "100.4", "100.5", "101", "102", "102.5", "102.8", "103", "105", "105.6", "106", "107"];
            // console.log(ab);

            function number_format(number, decimals, dec_point, thousands_sep) {
                // *     example: number_format(1234.56, 2, ',', ' ');
                // *     return: '1 234,56'
                number = (number + '').replace(',', '').replace(' ', '');
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function(n, prec) {
                        var k = Math.pow(10, prec);
                        return '' + Math.round(n * k) / k;
                    };
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            }

            // Area Chart Example
            var ctx = document.getElementById(idChart);
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jul", "Agt", "Sep", "Okt", "Nov", "Des", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Earnings",
                        lineTension: 0.3,
                        backgroundColor: "rgba(78, 115, 223, 0.05)",
                        borderColor: "rgba(78, 115, 223, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointBorderColor: "rgba(78, 115, 223, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: dataFisik,
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                        }
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 7
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                maxTicksLimit: 5,
                                padding: 10,
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return number_format(value) + 'cm';
                                }
                            },
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        intersect: false,
                        mode: 'index',
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                            }
                        }
                    }
                }
            });
        }
    </script>

    @if ($indikator_cek == 'print')
        <script>
            window.print();
        </script>
    @endif


</body>

</html>
