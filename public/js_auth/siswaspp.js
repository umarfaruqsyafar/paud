$(function () {
    siswaspp = [];
    $('.tambahspp').on('click', function () {
        idadmin = $(this).data('idadmin');
        if (idadmin) {
            $('.siswamasukspp').on('click', function () {
                idsiswa = $(this).data('idsiswa');
                tambahSiswa(idsiswa, siswaspp);
                console.log(siswaspp);
            });
        };

        tambahSiswa = function (idsiswa, siswaspp) {
            if (siswaspp.length == 0) {
                siswaspp.push(idsiswa);
                return siswaspp;
            } else if (siswaspp.length > 0) {
                siswaspp.push(idsiswa);
                for (i = 0; i < siswaspp.length; i++) {
                    if (siswaspp[siswaspp.length - 1] == siswaspp[i - 1]) {
                        siswaspp.pop();
                        siswaspp[i - 1] = undefined;
                        return siswaspp;
                    }
                }


            }
        }

        $('.spp').on('click', function () {
            for (i = 0; i < siswaspp.length; i++) {
                $.ajax({
                    url: "tambahspp1",
                    data: {
                        idsiswa: siswaspp[i],
                        idadmin: idadmin
                    },
                    method: 'post',
                    success: function (data) {
                        console.log(data);
                    }
                });
            }
        });

        $('.hapusSppSiswa').on('click', function () {
            const idadmin = $(this).data('idadmin');
            // console.log(idadmin);
            $.ajax({
                url: "hapus1",
                data: {
                    idadmin: idadmin
                },
                method: 'post',
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    $('#jenis').val(data.paket);
                    $('#id_jenis').val(data.id);
                }
            });
        });



    });


    siswa = [];
    $('.hapusSpp').on('click', function () {
        idadmin = $(this).data('idadmin');

        if (idadmin) {
            $('.siswamasukspp').on('click', function () {
                idsiswa = $(this).data('idsiswa');

                tambahSiswa(idsiswa, siswa);
                console.log(siswa);


            });
        };

        tambahSiswa = function (idsiswa, siswa) {
            if (siswa.length == 0) {
                siswa.push(idsiswa);
                return siswa;
            } else if (siswa.length > 0) {
                siswa.push(idsiswa);
                for (i = 0; i < siswa.length; i++) {
                    if (siswa[siswa.length - 1] == siswa[i - 1]) {
                        siswa.pop();
                        siswa[i - 1] = undefined;
                        return siswa;
                    }
                }


            }
        }
        $('.deleteSpp').on('click', function () {
            for (i = 0; i < siswa.length; i++) {
                $.ajax({
                    url: "hapusSiswaSpp",
                    data: {
                        idsiswa: siswa[i],
                        idadmin: idadmin
                    },
                    method: 'post',
                    success: function (data) {
                        console.log(data);
                    }
                });
            }
        });



    });




})

