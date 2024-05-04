$(function () {

    tendik = [];
    $('.adminTendik').on('click', function () {
        idtendik = $(this).data('idtendik');
        tambahtendik(idtendik, tendik);
        console.log(tendik);

    });
    tambahtendik = function (idtendik, tendik) {
        if (tendik.length == 0) {
            tendik.push(idtendik);
            return tendik;
        } else if (tendik.length > 0) {
            tendik.push(idtendik);
            for (i = 0; i < tendik.length; i++) {
                if (tendik[tendik.length - 1] == tendik[i - 1]) {
                    tendik.pop();
                    tendik[i - 1] = undefined;
                    return tendik;
                }
            }
        }
    }

    $('.ubahTendik').on('click', function () {
        for (i = 0; i < tendik.length; i++) {
            if (tendik[i] == undefined) {
            } else {
                $.ajax({
                    url: "ubahTendik",
                    data: {
                        idtendik: tendik[i]
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

    $('.hapusTendik').on('click', function () {
        if (tendik == undefined) {

            alert('pilih satu tendik');
        } else {
            a = confirm('yakin ingin meghapus tendik ini?');
            if (a === true) {
                for (i = 0; i < tendik.length; i++) {
                    if (tendik[i] == undefined) {
                    } else {
                        $.ajax({
                            url: "hapusTendik",
                            data: {
                                idtendik: tendik[i]
                            },
                            method: 'post',
                            success: function (data) {
                                console.log(data);
                            }
                        });
                    }
                } alert('tendik berhasil dihapus');

            } else {
                alert('tendik batal dihapus');
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