$(function () {

    siswa = [];
    $('.test').on('click', function () {
        idadmin = $(this).data('idadmin');

        if (idadmin) {
            $('.siswamasukadmin').on('click', function () {
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
        $('.delete').on('click', function () {
            for (i = 0; i < siswa.length; i++) {
                $.ajax({
                    url: "hapusSiswaAdm",
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
