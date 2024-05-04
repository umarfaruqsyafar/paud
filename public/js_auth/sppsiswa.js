$(function () {

    $('.sppSiswa').on('click', function () {
        idsppsiswa = $(this).data('siswa');
        namasppsiswa = $(this).data('nama');
        $('#idspp').val(idsppsiswa);
        $('#namaspp').val(namasppsiswa);
    });

})