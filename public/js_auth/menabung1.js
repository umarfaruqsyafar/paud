$(function () {

    $('.siswaMenabung').on('click', function () {
        idsiswa = $(this).data('siswa');
        namasiswa = $(this).data('nama');
        $('#id').val(idsiswa);
        $('#nama').val(namasiswa);
        $('#id1').val(idsiswa);
        $('#nama1').val(namasiswa);
        $('#id2').val(idsiswa);
        $('#nama2').val(namasiswa);
    });

})