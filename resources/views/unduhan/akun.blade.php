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

    <title>Print</title>

    <!--  favicon -->
    <link rel="shortcut icon" href="{{ asset('storage/' . $sekolah->logo) }}">
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
    <link href="/assets/style.css" rel="stylesheet">

</head>

<body id="page-top">
    <div class="container" style="text-align: center; width: 750px;">

        <!-- KOP -->
        <div class="row" style="background-attachment: fixed;">
            <div style="position:absolute;">
                <img class="logo-light" src="{{ asset('storage/' . $sekolah['logo']) }}"
                    style="width: 80px; height: 80px; margin-top: 8px; margin-left: 30px;" alt="" />
            </div>
            <div style="margin-left: 50px; text-align:center; font-family: 'Times New Roman', Times, serif;">
                <p class="black-text times" style="font-size: 18px;"><b>YAYASAN ANNA HUSADA KABUPATEN BANGKALAN</b></p>
                <p class="black-text times" style="font-size: 18px; margin-top: -40px;"><b>{{ $sekolah->nama }}</b>
                </p>
                <p style="margin-top: -40px; font-size: 14px;" class="black-text times">{{ $sekolah->alamat }} Telp.
                    {{ $sekolah->telepon }}</p>
                <p class="black-text times" style="margin-top: -40px; font-size: 14px;" class="black-text times">e-mail
                    :
                    <span style="color: blue;">{{ $sekolah->email }}</span>
                </p>
            </div>
        </div>
        <hr class="mb-20 kop-border" style="margin-top: -10px;">
        <!-- END KOP -->

        <div>
            <h4><b>DAFTAR AKUN PESERTA DIDIK</b></h4>
            {{ $kelas }}
        </div>
        <div class="table-responsive" id="tabelpd">

            <table class="table table-bordered" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Panggilan</th>
                        <th class="text-center">NIS</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($siswa as $sm)
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td class="text-left">{{ $sm->nama }}</td>
                            <td class="text-center">{{ $sm->panggilan }}</td>
                            <td class="text-center">{{ $sm->nis }}</td>
                            <td class="text-center">{{ $sm->username }}</td>
                            <td class="text-center">{{ $sm->username }}</td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    {{-- <script type="text/javascript">
        window.print();
    </script> --}}
</body>

</html>
