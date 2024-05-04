$(function () {
    $('.hapusAdmin').on('click', function () {
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



})