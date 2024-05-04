$(function () {
    idEditSiswa = [];
    $('.siswaEdit').on('click', function () {
        idsiswa = $(this).data('siswa');

        editSiswa(idsiswa, idEditSiswa);
    });

    editSiswa = function (idsiswa, idEditSiswa) {
        if (idEditSiswa.length == 0) {
            idEditSiswa.push(idsiswa);
            return idEditSiswa;
        } else if (idEditSiswa.length > 0) {
            idEditSiswa.push(idsiswa);
            for (i = 0; i < idEditSiswa.length; i++) {
                if (idEditSiswa[idEditSiswa.length - 1] == idEditSiswa[i - 1]) {
                    idEditSiswa.pop();
                    idEditSiswa[i - 1] = undefined;
                    return idEditSiswa;
                }
            }


        }
    }

    $('.tombolEditSiswa').on('click', function () {
        for (i = 0; i < idEditSiswa.length; i++) {
            $.ajax({
                url: "editSiswa",
                data: {
                    idsiswa: idEditSiswa[i]
                },
                method: 'post',
                dataType: 'json',
                success: function (data) {
                    $('#nama').val(data.nama);
                    $('#panggilan').val(data.panggilan);
                    $('#tempat').val(data.tempat);
                    $('#lahir').val(data.lahir);
                    $('#nik').val(data.nik);
                    $('#nis').val(data.nis);
                    $('#id').val(data.id);
                }
            });
        }
    });

    hapusSiswa = [];
    $('.siswaEdit').on('click', function () {
        idsiswa = $(this).data('siswa');

        idHapusSiswa(idsiswa, hapusSiswa);
    });

    idHapusSiswa = function (idsiswa, hapusSiswa) {
        if (hapusSiswa.length == 0) {
            hapusSiswa.push(idsiswa);
            return hapusSiswa;
        } else if (hapusSiswa.length > 0) {
            hapusSiswa.push(idsiswa);
            for (i = 0; i < hapusSiswa.length; i++) {
                if (hapusSiswa[hapusSiswa.length - 1] == hapusSiswa[i - 1]) {
                    hapusSiswa.pop();
                    hapusSiswa[i - 1] = undefined;
                    return hapusSiswa;
                }
            }


        }
    }

    $('.hapusSiswa').on('click', function () {
        for (i = 0; i < hapusSiswa.length; i++) {
            $.ajax({
                url: "hapusSiswa",
                data: {
                    idsiswa: hapusSiswa[i]
                },
                method: 'post',
                success: function (data) {
                    console.log(data)
                }
            });
        }
    });


    $('.unduhSiswa').on('click', function () {
        console.log('okay');
    });

    // Tendik

    idEditTendik = [];
    $('.tendikEdit').on('click', function () {
        idtendik = $(this).data('tendik');

        editTendik(idtendik, idEditTendik);
    });

    editTendik = function (idtendik, idEditTendik) {
        if (idEditTendik.length == 0) {
            idEditTendik.push(idtendik);
            return idEditTendik;
        } else if (idEditTendik.length > 0) {
            idEditTendik.push(idtendik);
            for (i = 0; i < idEditTendik.length; i++) {
                if (idEditTendik[idEditTendik.length - 1] == idEditTendik[i - 1]) {
                    idEditTendik.pop();
                    idEditTendik[i - 1] = undefined;
                    return idEditTendik;
                }
            }


        }
    }

    $('.tombolEditTendik').on('click', function () {
        for (i = 0; i < idEditTendik.length; i++) {
            $.ajax({
                url: "editTendik",
                data: {
                    idtendik: idEditTendik[i]
                },
                method: 'post',
                dataType: 'json',
                success: function (data) {
                    $('#nama').val(data.nama);
                    $('#alamat').val(data.alamat);
                    $('#tempat').val(data.tempat);
                    $('#lahir').val(data.lahir);
                    $('#id').val(data.id);
                }
            });
        }
    });

    hapusTendik = [];
    $('.tendikEdit').on('click', function () {
        idtendik = $(this).data('tendik');

        idhapusTendik(idtendik, hapusTendik);
    });

    idhapusTendik = function (idtendik, hapusTendik) {
        if (hapusTendik.length == 0) {
            hapusTendik.push(idtendik);
            return hapusTendik;
        } else if (hapusTendik.length > 0) {
            hapusTendik.push(idtendik);
            for (i = 0; i < hapusTendik.length; i++) {
                if (hapusTendik[hapusTendik.length - 1] == hapusTendik[i - 1]) {
                    hapusTendik.pop();
                    hapusTendik[i - 1] = undefined;
                    return hapusTendik;
                }
            }


        }
    }

    $('.hapusTendik').on('click', function () {
        for (i = 0; i < hapusTendik.length; i++) {
            $.ajax({
                url: "hapusTendik",
                data: {
                    idtendik: hapusTendik[i]
                },
                method: 'post',
                success: function (data) {
                    console.log(data)
                }
            });
        }
    });

    



})
