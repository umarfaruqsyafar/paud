$(function () {

    $('.namaSiswa').on('click', function () {
        nama = $(this).data('siswa');
        $('#namastatus').val('yakin ingin menolak ' + nama + ' ?');
        $('#nama_hapus').val(nama);
    });

    $('.dataTendik').on('click', function () {
        nama = $(this).data('nama');
        role = $(this).data('role');
        username = $(this).data('username');
        $('#nama').val(nama);
        $('#role').val(role);
        $('#username').val(username);
    });

    $('.ubahBiayaAdmin').on('click', function () {
        id = $(this).data('id');
        uraian = $(this).data('uraian');
        mandiri = $(this).data('mandiri');
        subsidi = $(this).data('subsidi');
        $('#idubah').val(id);
        $('#uraian1').val(uraian);
        $('#rupiahubah').val(mandiri);
        $('#rupiahubah1').val(subsidi);
    });

    $('.hapusBiayaAdmin').on('click', function () {
        id = $(this).data('id');
        uraian = $(this).data('uraian');

        $('#idhapus').val(id);
        $('#idbatal').val(id);
        $('#idbatal1').val(id);
        $('#idbatal2').val(id);
        $('#uraian2').val('Hapus ' + uraian + ' ?');
        $('#uraian3').val('Kurangi ' + uraian + ' ?');
        $('#uraian4').val('Batal Mengurangi ' + uraian + ' ?');
        $('#uraian5').val('Batal Mengurangi ' + uraian + ' ?');
        $('#uraian6').val('Batal Menambah ' + uraian + ' ?');
    });

    $('.ubahBiayaSPP').on('click', function () {
        id = $(this).data('id');
        ekstra = $(this).data('ekstra');
        spp = $(this).data('spp');
        $('#idubahspp').val(id);
        $('#ekstra3').val(ekstra);
        $('#rupiahubah').val(spp);
    });

    $('.hapusBiayaSPP').on('click', function () {
        id = $(this).data('id');
        ekstra = $(this).data('ekstra');
        $('#idhapusspp').val(id);
        $('#ekstra1').val('Hapus ' + ekstra + ' ?');
    });

    $('.tambahSPPSiswa').on('click', function () {
        id = $(this).data('id');
        ekstra = $(this).data('ekstra');
        $('#id').val(id);
        $('#id1').val(id);
        $('#ekstra').val('Tambah ' + ekstra + ' ?');
        $('#ekstra1').val('Batal tambah ' + ekstra + ' ?');
    });

    $('.batalkurangSPP').on('click', function () {
        id = $(this).data('id');
        uraian = $(this).data('uraian');
        $('#idkurang').val(id);
        $('#uraiankurang').val('Batal Pengurangan ' + uraian + ' ?');
    });

    $('.dataSiswa').on('click', function () {
        id = $(this).data('id');
        nama = $(this).data('nama');
        bulan = $(this).data('bulan');
        idbulan = $(this).data('idbulan');
        nominal = $(this).data('nominal');
        tb = $(this).data('tb');
        bb = $(this).data('bb');
        lk = $(this).data('lk');

        $('#id').val(id);
        $('#id1').val(id);
        $('#nama').val(nama);
        $('#nama1').val(nama);
        $('#bulan').val(bulan);
        $('#idbulan').val(idbulan);
        $('#idbulan1').val(idbulan);
        $('#nominal').val(nominal);
        $('#tb1').val(tb);
        $('#bb1').val(bb);
        $('#lk1').val(lk);
    });

    $('.nilai_indikator').on('click', function () {
        idnilai = $(this).data('idnilai');
        idsiswa = $(this).data('idsiswa');

        if (idnilai) {
            $('.indikator_masuk').on('click', function () {
                var indikator = $(this).data('indikator');
                // console.log(indikator);
                // console.log(idnilai);
                // console.log(idsiswa);
                $.ajax({
                    url: "../../nilai_indikator",
                    data: {
                        idnilai: idnilai,
                        idsiswa: idsiswa,
                        indikator: indikator
                    },
                    method: 'post',
                    success: function (data) {
                        console.log(data);
                    }
                });
            });

        }
    });



    $('.kemunculanYa').on('click', function () {
        idtujuan = $(this).data('idtujuan');
        idsiswa = $(this).data('idsiswa');
        muncul = $(this).data('muncul');
        // console.log(idtujuan + ' ' + idsiswa + muncul);
        $.ajax({
            url: "../../kemunculan",
            data: {
                idtujuan: idtujuan,
                idsiswa: idsiswa,
                muncul: muncul
            },
            method: 'post',
            success: function (data) {
                console.log(data);
            }
        });
    });
    $('.kemunculanTidak').on('click', function () {
        idtujuan = $(this).data('idtujuan');
        idsiswa = $(this).data('idsiswa');
        tidakmuncul = $(this).data('tidakmuncul');
        // console.log(idtujuan + ' ' + idsiswa + muncul);
        $.ajax({
            url: "../../kemunculan",
            data: {
                idtujuan: idtujuan,
                idsiswa: idsiswa,
                muncul: tidakmuncul
            },
            method: 'post',
            success: function (data) {
                console.log(data);
            }
        });
    });


    $('.nilai21').on('click', function () {
        iddoa = $(this).data('iddoa');
        idsiswa = $(this).data('idsiswa');
        nilai = $(this).data('nilai');
        // console.log(iddoa);
        // console.log(idsiswa);
        // console.log(nilai);
        $.ajax({
            url: "../nilai_doa",
            data: {
                iddoa: iddoa,
                idsiswa: idsiswa,
                nilai: nilai
            },
            method: 'post',
            success: function (data) {
                console.log(data);
            }
        });
    });
    $('.nilai22').on('click', function () {
        iddoa = $(this).data('iddoa');
        idsiswa = $(this).data('idsiswa');
        nilai = $(this).data('nilai');
        // console.log(iddoa);
        // console.log(idsiswa);
        // console.log(nilai);
        $.ajax({
            url: "../nilai_doa",
            data: {
                iddoa: iddoa,
                idsiswa: idsiswa,
                nilai: nilai
            },
            method: 'post',
            success: function (data) {
                console.log(data);
            }
        });
    });
    $('.nilai23').on('click', function () {
        iddoa = $(this).data('iddoa');
        idsiswa = $(this).data('idsiswa');
        nilai = $(this).data('nilai');
        // console.log(iddoa);
        // console.log(idsiswa);
        // console.log(nilai);
        $.ajax({
            url: "../nilai_doa",
            data: {
                iddoa: iddoa,
                idsiswa: idsiswa,
                nilai: nilai
            },
            method: 'post',
            success: function (data) {
                console.log(data);
            }
        });
    });
    $('.nilai24').on('click', function () {
        iddoa = $(this).data('iddoa');
        idsiswa = $(this).data('idsiswa');
        nilai = $(this).data('nilai');
        // console.log(iddoa);
        // console.log(idsiswa);
        // console.log(nilai);
        $.ajax({
            url: "../nilai_doa",
            data: {
                iddoa: iddoa,
                idsiswa: idsiswa,
                nilai: nilai
            },
            method: 'post',
            success: function (data) {
                console.log(data);
            }
        });
    });

    $('.nilai31').on('click', function () {
        idhadits = $(this).data('idhadits');
        idsiswa = $(this).data('idsiswa');
        nilai = $(this).data('nilai');
        // console.log(idhadits);
        // console.log(idsiswa);
        // console.log(nilai);
        $.ajax({
            url: "../nilai_hadits",
            data: {
                idhadits: idhadits,
                idsiswa: idsiswa,
                nilai: nilai
            },
            method: 'post',
            success: function (data) {
                console.log(data);
            }
        });
    });
    $('.nilai32').on('click', function () {
        idhadits = $(this).data('idhadits');
        idsiswa = $(this).data('idsiswa');
        nilai = $(this).data('nilai');
        // console.log(idhadits);
        // console.log(idsiswa);
        // console.log(nilai);
        $.ajax({
            url: "../nilai_hadits",
            data: {
                idhadits: idhadits,
                idsiswa: idsiswa,
                nilai: nilai
            },
            method: 'post',
            success: function (data) {
                console.log(data);
            }
        });
    });
    $('.nilai33').on('click', function () {
        idhadits = $(this).data('idhadits');
        idsiswa = $(this).data('idsiswa');
        nilai = $(this).data('nilai');
        // console.log(idhadits);
        // console.log(idsiswa);
        // console.log(nilai);
        $.ajax({
            url: "../nilai_hadits",
            data: {
                idhadits: idhadits,
                idsiswa: idsiswa,
                nilai: nilai
            },
            method: 'post',
            success: function (data) {
                console.log(data);
            }
        });
    });
    $('.nilai34').on('click', function () {
        idhadits = $(this).data('idhadits');
        idsiswa = $(this).data('idsiswa');
        nilai = $(this).data('nilai');
        // console.log(idhadits);
        // console.log(idsiswa);
        // console.log(nilai);
        $.ajax({
            url: "../nilai_hadits",
            data: {
                idhadits: idhadits,
                idsiswa: idsiswa,
                nilai: nilai
            },
            method: 'post',
            success: function (data) {
                console.log(data);
            }
        });
    });

    $('.nilai41').on('click', function () {
        idasmaulhusna = $(this).data('idasmaulhusna');
        idsiswa = $(this).data('idsiswa');
        nilai = $(this).data('nilai');
        // console.log(idasmaulhusna);
        // console.log(idsiswa);
        // console.log(nilai);
        $.ajax({
            url: "../nilai_asmaulhusna",
            data: {
                idasmaulhusna: idasmaulhusna,
                idsiswa: idsiswa,
                nilai: nilai
            },
            method: 'post',
            success: function (data) {
                console.log(data);
            }
        });
    });
    $('.nilai42').on('click', function () {
        idasmaulhusna = $(this).data('idasmaulhusna');
        idsiswa = $(this).data('idsiswa');
        nilai = $(this).data('nilai');
        // console.log(idasmaulhusna);
        // console.log(idsiswa);
        // console.log(nilai);
        $.ajax({
            url: "../nilai_asmaulhusna",
            data: {
                idasmaulhusna: idasmaulhusna,
                idsiswa: idsiswa,
                nilai: nilai
            },
            method: 'post',
            success: function (data) {
                console.log(data);
            }
        });
    });
    $('.nilai43').on('click', function () {
        idasmaulhusna = $(this).data('idasmaulhusna');
        idsiswa = $(this).data('idsiswa');
        nilai = $(this).data('nilai');
        // console.log(idasmaulhusna);
        // console.log(idsiswa);
        // console.log(nilai);
        $.ajax({
            url: "../nilai_asmaulhusna",
            data: {
                idasmaulhusna: idasmaulhusna,
                idsiswa: idsiswa,
                nilai: nilai
            },
            method: 'post',
            success: function (data) {
                console.log(data);
            }
        });
    });
    $('.nilai44').on('click', function () {
        idasmaulhusna = $(this).data('idasmaulhusna');
        idsiswa = $(this).data('idsiswa');
        nilai = $(this).data('nilai');
        // console.log(idasmaulhusna);
        // console.log(idsiswa);
        // console.log(nilai);
        $.ajax({
            url: "../nilai_asmaulhusna",
            data: {
                idasmaulhusna: idasmaulhusna,
                idsiswa: idsiswa,
                nilai: nilai
            },
            method: 'post',
            success: function (data) {
                console.log(data);
            }
        });
    });



    $('.hapus_siswa').on('click', function () {
        idsiswa = $(this).data('idsiswa');
        $.ajax({
            url: "hapus_siswa",
            data: {
                idsiswa: idsiswa
            },
            method: 'post',
            success: function (data) {
                console.log(data);
            }
        });
    });











})

