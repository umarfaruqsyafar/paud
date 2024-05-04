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
    <div class="dua">
        <img class="logo" src="{{ asset('storage/' . $sekolah['logo']) }}">
    </div>

    <?php $fisik = DB::select('SELECT * FROM fisiks WHERE siswa_id = ' . $siswa->id . ' ORDER BY bulan_id DESC LIMIT 1');
    if ($fisik) {
        $tb = $fisik[0]->tb;
        $bb = $fisik[0]->bb;
        $lk = $fisik[0]->lk;
    } else {
        $tb = '';
        $bb = '';
        $lk = '';
    }
    $kelompok = DB::select('SELECT * FROM kelas a INNER JOIN masuk_kelas b ON a.id = b.kela_id WHERE b.siswa_id = ' . $siswa->id);
    if ($kelompok) {
        $tingkat = $kelompok[0]->tingkat;
    } else {
        $tingkat = '';
    }
    $nis = $siswa->nis;
    $jumlah_nis = strlen($nis);
    
    ?>
    <!-- Halaman 1 -->

    <div class="satu">
        <!-- HALAMAN 1 -->
        <div style="display: flex; flex-direction:row; justify-content:right;">
            <?php if ($jumlah_nis < 7) : ?>
            <div style="display: flex; flex-direction:row; justify-content:right;">
                <div style="display: flex; flex-direction:column; align-items:center;">
                    <div>Nomer Induk Siswa</div>
                    <div style="display: flex; flex-direction:row;">
                        <div style="height: 25px; width:25px; border:solid 1px black;"></div>
                        <div style="height: 25px; width:25px; border:solid 1px black;"></div>
                        <div style="height: 25px; width:25px; border:solid 1px black;"></div>
                        <div style="height: 25px; width:25px; border:solid 1px black;"></div>
                        <div style="height: 25px; width:25px; border:solid 1px black;"></div>
                        <div style="height: 25px; width:25px; border:solid 1px black;"></div>
                        <div style="height: 25px; width:25px; border:solid 1px black;"></div>
                    </div>
                </div>
            </div>
            <?php else : ?>
            <div style="display: flex; flex-direction:row; justify-content:right;">
                <div style="display: flex; flex-direction:column; align-items:center;">
                    <div>Nomer Induk Siswa</div>
                    <div style="display: flex; flex-direction:row;">
                        <div style="height: 25px; width:25px; border:solid 1px black; text-align:center;">
                            <?= substr($nis, 0, 1) ?></div>
                        <div style="height: 25px; width:25px; border:solid 1px black; text-align:center;">
                            <?= substr($nis, 1, 1) ?></div>
                        <div style="height: 25px; width:25px; border:solid 1px black; text-align:center;">
                            <?= substr($nis, 2, 1) ?></div>
                        <div style="height: 25px; width:25px; border:solid 1px black; text-align:center;">
                            <?= substr($nis, 3, 1) ?></div>
                        <div style="height: 25px; width:25px; border:solid 1px black; text-align:center;">
                            <?= substr($nis, 4, 1) ?></div>
                        <div style="height: 25px; width:25px; border:solid 1px black; text-align:center;">
                            <?= substr($nis, 5, 1) ?></div>
                        <div style="height: 25px; width:25px; border:solid 1px black; text-align:center;">
                            <?= substr($nis, 6, 1) ?></div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div style="display: flex; flex-direction:row; justify-content:right; margin-left:20px;">
                <div style="display: flex; flex-direction:column; align-items:center;">
                    <div>No. Urut</div>
                    <div style="display: flex; flex-direction:row;">
                        <div style="height: 25px; width:25px; border:solid 1px black;"></div>
                        <div style="height: 25px; width:25px; border:solid 1px black;"></div>
                        <div style="height: 25px; width:25px; border:solid 1px black;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div style="display: flex; flex-direction:row; margin-top:7px; justify-content:center;">
            <div>
                <hr style="width: 555px; border: solid 1px black;">
                <h2 style="margin-top: -13px; text-align:center;">DATA ANAK DIDIK</h2>
                <hr style="width: 555px; border: solid 1px black; margin-top: -3px;">
            </div>
            <div class="footer" align="left">
                <img style="width: 3cm; height:4cm; margin-left: 25px; margin-top:10px; " class="foto"
                    src="/img/app/ukuran.png">
            </div>
        </div>

        <div>
            <div class="main" align="left" style="font-family: 'Times New Roman', Times, serif;">
                <h4 class="sub" style="font-size: 14px;"><b>A. KETERANGAN ANAK DIDIK</b></h4>
                <div style="font-size:14px; margin-bottom:2em; margin-top:10px;">
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt">1. Nama Lengkap</span><span
                            class="isi_bdt">: <?= $siswa->nama ?></span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt">2. Nama Panggilan</span><span
                            class="isi_bdt">: <?= $siswa->panggilan ?></span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt">3. NIK</span><span
                            class="isi_bdt">: <?= $siswa->nik ?></span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt">4. NISN</span><span
                            class="isi_bdt">: <?= $siswa->nisn ?></span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt">5. Jenis Kelamin</span><span
                            class="isi_bdt">: <?= $siswa->jk ?></span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt">6. Tempat Tanggal
                            Lahir</span><span class="isi_bdt">: <?= $siswa->tempat ?>,
                            <?= date('d-m-Y', strtotime($siswa->lahir)) ?></span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt">7. Agama</span><span
                            class="isi_bdt">: <?= $siswa->agama_ibu ?></span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt">8. Kewarganegaraan</span><span
                            class="isi_bdt">: Indonesia</span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt">9. Anak Ke</span><span
                            class="isi_bdt">: <?= $siswa->anak_ke ?></span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt">10. Jumlah Saudara
                            Kandung</span><span class="isi_bdt">: </span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt">11. Bahasa
                            Sehari-hari</span><span class="isi_bdt">: Indonesia</span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt">12. Berat/Tinggi
                            Badan</span><span class="isi_bdt">: <?= $bb . ' Kg / ' . $tb . ' Cm' ?></span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt">13. Golongan Darah</span><span
                            class="isi_bdt">: </span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt">14. Penyakit yang pernah
                            diderita</span><span class="isi_bdt">: </span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt">15. Alamat Domisili</span><span
                            class="isi_bdt">: <?= $siswa->alamat ?></span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt" style="margin-left: 39px;">No
                            Telp/HP</span><span class="isi_bdt" style="margin-left: -20px;">:
                            <?= $siswa->no_ibu ?></span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt">16. Jarak ke Sekolah</span><span
                            class="isi_bdt">: </span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                </div>
            </div>
        </div>
        <!-- END HALAMAN 1 -->

        <!-- HALAMAN 2 -->
        <div style="page-break-before: always;"></div>
        <div style="margin-top: 30px;">
            <div class="main" align="left" style="font-family: 'Times New Roman', Times, serif;">
                <h4 class="sub" style="font-size: 14px;"><b>B. KETERANGAN ORANG TUA ANAK DIDIK</b></h4>
                <div style="font-size:14px; margin-bottom:2em; margin-top:10px;">
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt">17. Nama Orang Tua</span><span
                            class="isi_bdt">: </span>
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt" style="margin-left: 39px;">-
                            Ayah Kandung</span><span class="isi_bdt" style="margin-left: -20px;">:
                            <?= $siswa->nama_ayah ?></span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt" style="margin-left: 39px;">-
                            Ibu Kandung</span><span class="isi_bdt" style="margin-left: -20px;">:
                            <?= $siswa->nama_ibu ?></span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt">18. Pendidikan
                            Tertinggi</span><span class="isi_bdt">: </span>
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt" style="margin-left: 39px;">-
                            Ayah</span><span class="isi_bdt" style="margin-left: -20px;">:
                            <?= $siswa->pdd_ayah ?></span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt" style="margin-left: 39px;">-
                            Ibu</span><span class="isi_bdt" style="margin-left: -20px;">: <?= $siswa->pdd_ibu ?></span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt">19. Pekerjaan</span><span
                            class="isi_bdt">: </span>
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt" style="margin-left: 39px;">-
                            Ayah</span><span class="isi_bdt" style="margin-left: -20px;">:
                            <?= $siswa->pekerjaan_ayah ?></span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt" style="margin-left: 39px;">-
                            Ibu</span><span class="isi_bdt" style="margin-left: -20px;">:
                            <?= $siswa->pekerjaan_ibu ?></span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt">20. Wali Anak</span><span
                            class="isi_bdt">: </span>
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt" style="margin-left: 39px;">-
                            Nama</span><span class="isi_bdt" style="margin-left: -20px;">: </span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt" style="margin-left: 39px;">-
                            Pendidikan Tertinggi</span><span class="isi_bdt" style="margin-left: -20px;">: </span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt" style="margin-left: 39px;">-
                            Hubungan Keluarga</span><span class="isi_bdt" style="margin-left: -20px;">: </span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt" style="margin-left: 39px;">-
                            Pekerjaan</span><span class="isi_bdt" style="margin-left: -20px;">: </span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                </div>
                <h4 class="sub" style="font-size: 14px;"><b>C. ASAL MULA ANAK</b></h4>
                <div style="font-size:14px; margin-bottom:2em; margin-top:10px;">
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt">21. Masuk Sekolah Ini
                            Sebagai</span><span class="isi_bdt">: Anak Didik Baru/Pindahan *)</span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt">22. Pindahan dari</span><span
                            class="isi_bdt">: </span>
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt" style="margin-left: 39px;">a.
                            Nama Sekolah</span><span class="isi_bdt" style="margin-left: -20px;">: </span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt" style="margin-left: 39px;">b.
                            Tanggal</span><span class="isi_bdt" style="margin-left: -20px;">: </span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt">23. Diterima Di Sekolah
                            Ini</span><span class="isi_bdt">: </span>
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt" style="margin-left: 39px;">a.
                            Tanggal Sekolah</span><span class="isi_bdt" style="margin-left: -20px;">:
                            <?= date('d-m-Y', strtotime($siswa->created_at)) ?></span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt" style="margin-left: 39px;">b.
                            Kelompok</span><span class="isi_bdt" style="margin-left: -20px;">: <?= $tingkat ?></span>
                        <hr
                            style="border-top: 1px dotted black; width:470px; position:absolute; right:0; margin-top:-6px;">
                    </p>
                    <p style="font-size: 14px; margin-top:10px;"><span class="bdt">*) Coret yang tidak perlu</span>
                    </p>

                </div>
            </div>
        </div>
        <!-- END HALAMAN 2 -->



        <!-- END DATA ANAK -->
    </div>
    <!-- END Halaman 1 -->

    <script>
        window.print();
    </script>

</body>

</html>
