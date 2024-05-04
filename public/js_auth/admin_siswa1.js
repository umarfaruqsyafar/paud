$(function () {

    siswa = [];
    $('.adminSiswaPD').on('click', function () {
        idsiswa = $(this).data('idsiswa');
        tambahSiswa(idsiswa, siswa);
        console.log(siswa);

    });
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

    $('.ubahSiswaPD').on('click', function () {
        for (i = 0; i < siswa.length; i++) {
            if (siswa[i] == undefined) {
            } else {
                $.ajax({
                    url: "ubahSiswaPD",
                    data: {
                        idsiswa: siswa[i]
                    },
                    method: 'post',
                    dataType: 'json',
                    success: function (data) {
                        $('#idUbah').val(data.id);
                    }
                });
            }

        }
    });

    $('.hapusSiswaPD1').on('click', function () {
        if (siswa == undefined) {

            alert('pilih satu siswa');
        } else {
            a = confirm('yakin ingin meghapus siswa ini?');
            if (a === true) {
                for (i = 0; i < siswa.length; i++) {
                    if (siswa[i] == undefined) {
                    } else {
                        $.ajax({
                            url: "hapusSiswaPD",
                            data: {
                                idsiswa: siswa[i]
                            },
                            method: 'post',
                            success: function (data) {
                                console.log(data);
                            }
                        });
                    }
                } alert('siswa berhasil dihapus');

            } else {
                alert('siswa batal dihapus');
            }
        }

    });


    kelas = [];
    $('.adminKelasPD').on('click', function () {
        idkelas = $(this).data('idkelas');
        tambahkelas(idkelas, kelas);
        console.log(kelas);

    });
    tambahkelas = function (idkelas, kelas) {
        if (kelas.length == 0) {
            kelas.push(idkelas);
            return kelas;
        } else if (kelas.length > 0) {
            kelas.push(idkelas);
            for (i = 0; i < kelas.length; i++) {
                if (kelas[kelas.length - 1] == kelas[i - 1]) {
                    kelas.pop();
                    kelas[i - 1] = undefined;
                    return kelas;
                }
            }
        }
    }

    $('.hapusKelasPD').on('click', function () {
        if (kelas) {
            var b = confirm("Yakin Ingin Menghapus Kelas Ini ? ");
            if (b = true) {
                for (i = 0; i < kelas.length; i++) {
                    if (kelas[i] == undefined) {
                    } else {
                        $.ajax({
                            url: "hapusKelasPD",
                            data: {
                                idkelas: kelas[i]
                            },
                            method: 'post',
                            success: function (data) {
                                console.log(data);
                            }
                        });
                    }
                }
            }
        }

    });









})