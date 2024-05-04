$(function () {

    $('.ubahAkunSiswa').on('click', function () {
        idsiswaubah = $(this).data('siswaubah');

        $.ajax({
            url: "ambil_siswa",
            data: { idsiswaubah: idsiswaubah },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama').val(data.nama);
                $('#id').val(data.id);
                $('#username').val(data.username);
                $('#nis').val(data.nis);
                $('#nisn').val(data.nisn);
            }
        });
    });

})

