$(function () {
    siswaAdmin = [];
    $('.tambahAdmin').on('click', function () {
        idadmin = $(this).data('idadmin');
        if (idadmin) {
            $('.siswamasukadmin').on('click', function () {
                idsiswa = $(this).data('idsiswa');

                tambahSiswa(idsiswa, siswaAdmin);
            });
        };

        tambahSiswa = function (idsiswa, siswaAdmin) {
            if (siswaAdmin.length == 0) {
                siswaAdmin.push(idsiswa);
                return siswaAdmin;
            } else if (siswaAdmin.length > 0) {
                siswaAdmin.push(idsiswa);
                for (i = 0; i < siswaAdmin.length; i++) {
                    if (siswaAdmin[siswaAdmin.length - 1] == siswaAdmin[i - 1]) {
                        siswaAdmin.pop();
                        siswaAdmin[i - 1] = undefined;
                        return siswaAdmin;
                    }
                }


            }
        }

        $('.admin').on('click', function () {
            for (i = 0; i < siswaAdmin.length; i++) {
                $.ajax({
                    url: "tambahadmin",
                    data: {
                        idsiswa: siswaAdmin[i],
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

