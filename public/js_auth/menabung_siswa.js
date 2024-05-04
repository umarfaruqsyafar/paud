$(function () {
    $('.menabungSiswa').on('click', function () {
        idsiswa = $(this).data('siswa');
        namasiswa = $(this).data('nama');
        $('#id').val(idsiswa);
        $('#nama').val(namasiswa);

    });


})