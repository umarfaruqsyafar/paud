$(function () {


    $('.edit').on('click', function () {
        const idadmin = $(this).data('idadmin');
        $.ajax({
            url: "edit1",
            data: {
                idadmin: idadmin
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#id_ubah').val(data.id);
                $('#tingkat_ubah').val(data.tingkat);
                $('#paket_ubah').val(data.paket);
                $('#biaya_ubah').val(data.biaya);
            }
        });
    });

})