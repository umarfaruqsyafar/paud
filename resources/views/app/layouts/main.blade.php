<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Admin</title>
    {{-- <link rel="shortcut icon" href=""> --}}

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css_auth/sb-admin-2.min.css" rel="stylesheet">
    <link href="/css_auth/app.css" rel="stylesheet">
    <link href="/css_auth/walas.css" rel="stylesheet">
    <link href="/css_auth/admin.css" rel="stylesheet">

    <!-- tambahan -->

    <!-- close -->

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion side-hp toggled bg-gradient-primary" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-school"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PAUD APP</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider" style="background-color: white;">

            @include('app.layouts.sidebar')

            <!-- Divider -->
            <hr class="sidebar-divider" style="background-color: white;">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion side-com bg-gradient-primary" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-school"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PAUD APP</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider" style="background-color: white;">

            @include('app.layouts.sidebar')

            <!-- Divider -->
            <hr class="sidebar-divider" style="background-color: white;">

            <!-- Sidebar Toggler (Sidebar) -->
            <div style="display: flex; justify-content:center">
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->

                        <?php if(Request::is('dashboard/pd*')) : ?>
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->

                                <span class="badge badge-danger badge-counter">{{ count($siswa_baru) }}</span>


                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Siswa Baru
                                </h6>
                                @foreach ($siswa_baru_limit as $sbl)
                                    <a class="dropdown-item d-flex align-items-center">
                                        <div class="mr-3">
                                            <div class="icon-circle bg-primary">
                                                <i class="fas fa-user text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500">
                                                {{ date('d-m-Y', strtotime($sbl->created_at)) }}
                                            </div>
                                            <span class="font-weight-bold">{{ $sbl->nama }}</span>
                                            <span>{{ $sbl->nik }}</span>
                                        </div>
                                    </a>
                                @endforeach
                                <a class="dropdown-item text-center small text-gray-500"
                                    href="/dashboard/pd/baru">Tampilkan
                                    Detail Siswa</a>
                            </div>
                        </li>
                        <?php endif; ?>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $user->nama }}</span>
                                @if ($user->image == null)
                                    <img class="img-profile rounded-circle" src="/img/app/default.jpg">
                                @else
                                    <img class="img-profile rounded-circle" src="{{ asset('storage/' . $user->image) }}">
                                @endif
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</button>
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                @yield('container')
            </div>
            <!-- Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto" id="footer">
                    <div class="copyright text-center my-auto text-white" id="footer">
                        <span id="copyright">Copyright &copy; UP DEVELOPMENT BANGKALAN <?= date('Y') ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" id="logout_modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Anda yakin ingin keluar ?.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="">Logout</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js_auth/sb-admin-2.min.js"></script>
    <script src="/js_auth/siswa.js"></script>
    <script src="/js_auth/administrasi.js"></script>
    <script src="/js_auth/edit.js"></script>
    <script src="/js_auth/delete.js"></script>
    <script src="/js_auth/editspp.js"></script>
    <script src="/js_auth/siswaspp.js"></script>
    <script src="/js_auth/admin_siswa1.js"></script>
    <script src="/js_auth/admin_tendik.js"></script>
    <script src="/js_auth/hapus_bendahara.js"></script>
    <script src="/js_auth/akun_siswa.js"></script>
    <script src="/js_auth/menabung_siswa.js"></script>
    <script src="/js_auth/sppsiswa.js"></script>
    <script src="/js_auth/menabung1.js"></script>
    <script src="/js_auth/hapuskelas.js"></script>
    <script src="/js_auth/y.js"></script>
    <script src="/js_auth/mobile.js"></script>
    <script>
        $('.tambahSiswa').on('click', function() {
            idkelas = $(this).data('idkelas');
            idwalas = $(this).data('idwalas');

            $('#dataKelas').val(idkelas);
            $('#dataWalas').val(idwalas);

            $('.siswamasuk').on('click', function() {
                idsiswa = $(this).data('idsiswa');
                console.log(idkelas, idsiswa, idwalas);
                $.ajax({
                    url: "tambahSiswa",
                    data: {
                        idsiswa: idsiswa
                    },
                    method: 'post'
                });


            });

        });
    </script>
    <script>
        $('.siswamasukwalas').on('click', function() {
            idsiswa = $(this).data('idsiswa');
            console.log(idsiswa);
            $.ajax({
                url: "walas/tambahSiswa",
                data: {
                    idsiswa: idsiswa
                },
                method: 'post'
            });


        });
    </script>

    <script type="text/javascript">
        var cariSiswaWalas = document.getElementById('siswaWalas');
        var tabelpd = document.getElementById('siswalivewalas');

        cariSiswaWalas.addEventListener('keyup', function() {
            var ajax = new XMLHttpRequest();
            var url = "/cariSiswaLive?keyword=" + cariSiswaWalas.value;
            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    tabelpd.innerHTML = ajax.responseText;
                    $('.siswamasukwalas').on('click', function() {
                        idsiswa = $(this).data('idsiswa');
                        $.ajax({
                            url: "walas/tambahSiswa",
                            data: {
                                idsiswa: idsiswa
                            },
                            method: 'post'
                        });
                    });
                }
            };
            ajax.open("GET", url, true);
            ajax.send();
        });
    </script>

    <script>
        $('.pilar1').on('click', function() {
            idpilar = $(this).data('idpilar');
            idsiswa = $(this).data('idsiswa');
            nilai = $(this).data('nilai');
            var xhr = new XMLHttpRequest();
            var url = "/nilai_pilar_siswa/" + idpilar + '/' + idsiswa + '/' + nilai;
            xhr.open("POST", url, true);
            xhr.send();
        });
    </script>
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>

    <script type="text/javascript">
        var rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>

    <script type="text/javascript">
        var rupiah1 = document.getElementById('rupiah1');
        rupiah1.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah1() untuk mengubah angka yang di ketik menjadi format angka
            rupiah1.value = formatRupiah1(this.value, 'Rp. ');
        });

        /* Fungsi formatRupiah1 */
        function formatRupiah1(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah1 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah1 += separator + ribuan.join('.');
            }

            rupiah1 = split[1] != undefined ? rupiah1 + ',' + split[1] : rupiah1;
            return prefix == undefined ? rupiah1 : (rupiah1 ? 'Rp. ' + rupiah1 : '');
        }
    </script>

    <script type="text/javascript">
        var rupiahubah = document.getElementById('rupiahubah');
        rupiahubah.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiahubah() untuk mengubah angka yang di ketik menjadi format angka
            rupiahubah.value = formatRupiahubah(this.value, 'Rp. ');
        });

        /* Fungsi formatRupiahubah */
        function formatRupiahubah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiahubah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiahubah += separator + ribuan.join('.');
            }

            rupiahubah = split[1] != undefined ? rupiahubah + ',' + split[1] : rupiahubah;
            return prefix == undefined ? rupiahubah : (rupiahubah ? 'Rp. ' + rupiahubah : '');
        }
    </script>

    <script type="text/javascript">
        var rupiahubah1 = document.getElementById('rupiahubah1');
        rupiahubah1.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiahubah1() untuk mengubah angka yang di ketik menjadi format angka
            rupiahubah1.value = formatRupiahubah1(this.value, 'Rp. ');
        });

        /* Fungsi formatRupiahubah1 */
        function formatRupiahubah1(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiahubah1 = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiahubah1 += separator + ribuan.join('.');
            }

            rupiahubah1 = split[1] != undefined ? rupiahubah1 + ',' + split[1] : rupiahubah1;
            return prefix == undefined ? rupiahubah1 : (rupiahubah1 ? 'Rp. ' + rupiahubah1 : '');
        }
    </script>
    <script type="text/javascript">
        // Dapatkan semua elemen dengan kelas "format-rupiah"
        var rpElements = document.querySelectorAll(".format-rupiah");

        // Loop melalui setiap elemen dan tambahkan event listener
        rpElements.forEach(function(rp) {
            rp.addEventListener('keyup', function(e) {
                // Tambahkan 'Rp.' saat form diketik
                // Gunakan fungsi formatrp() untuk mengubah angka yang diinput menjadi format angka
                this.value = formatrp(this.value, 'Rp. ');
            });
        });

        /* Fungsi formatrp */
        function formatrp(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rp = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // Tambahkan titik jika yang diinput sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rp += separator + ribuan.join('.');
            }

            rp = split[1] != undefined ? rp + ',' + split[1] : rp;
            return prefix == undefined ? rp : (rp ? 'Rp. ' + rp : '');
        }
    </script>

    <script>
        $('.pilar1').on('click', function() {
            idpilar = $(this).data('idpilar');
            idsiswa = $(this).data('idsiswa');
            nilai = $(this).data('nilai');
            console.log(idpilar);
            console.log(idsiswa);
            console.log(nilai);
            var xhr = new XMLHttpRequest();
            var url = "walas/nilai_raport_pilar";
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(xhr.responseText);
                }
            };
            xhr.open("POST", url, true);
            xhr.send();
        });
    </script>

    <script>
        // Fungsi untuk menambahkan kelas "btn-sm" jika lebar layar kurang dari atau sama dengan 992px
        function addBtnSmClass() {
            var elements = document.querySelectorAll('.btn-icon-split');
            var maxWidth = 992; // Lebar maksimal dalam piksel

            if (window.innerWidth <= maxWidth) {
                for (var i = 0; i < elements.length; i++) {
                    elements[i].classList.add('btn-sm');
                }
            } else {
                for (var i = 0; i < elements.length; i++) {
                    elements[i].classList.remove('btn-sm');
                }
            }
        }

        // Panggil fungsi saat halaman dimuat
        addBtnSmClass();

        // Tambahkan listener untuk mengubah kelas saat lebar layar berubah
        window.addEventListener('resize', addBtnSmClass);
    </script>




</body>


</html>
