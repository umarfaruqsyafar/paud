$(function () {
    $('.hapusadm').on('click', function () {
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

    $('.hapusspp').on('click', function () {
        const idadmin = $(this).data('idadmin');
        // console.log(idadmin);
        $.ajax({
            url: "hapus2",
            data: {
                idadmin: idadmin
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#jenis').val(data.tingkat);
                $('#id_jenis').val(data.id);
            }
        });
    });



})