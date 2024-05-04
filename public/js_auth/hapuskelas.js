$(function () {
    $('.idkelas').on('click', function () {
        idkls = $(this).data('idkls');
        kls = $(this).data('kls');
        tingkat = $(this).data('tingkat');
        ruang = $(this).data('ruang');
        $('#hapuskelas').val(idkls);
    });

    $('.idkelascom').on('click', function () {
        idkls = $(this).data('idkls');
        kls = $(this).data('kls');
        tingkat = $(this).data('tingkat');
        ruang = $(this).data('ruang');
        $('#hapuskelascom').val(idkls);
        console.log(idkls + kls + tingkat + ruang);
    });

    $('.hapuskelas').on('click', function () {
        alert('yakin ingin menghapus kelas ' + kls + '?');
        a = confirm('Siswa yang ada di dalam kelas' + kls + ' akan dikeluarkan dan tidak memiliki kelas. Lanjutkan ?');
        if (a === true) {
            alert('Kelas akan dihapus')
        } else {
            alert('Kelas tidak dihapus')
        }
    });

    $('.hapuskelascom').on('click', function () {
        alert('yakin ' + kls + '?');
        a = confirm('Siswa yang ada di dalam kelas' + kls + ' akan dikeluarkan dan tidak memiliki kelas. Lanjutkan ?');
        if (a === true) {
            alert('Kelas akan dihapus')
        } else {
            alert('Kelas tidak dihapus')
        }
    });

    $('.ubahDataKelas').on('click', function () {
        $('#ubahid').val(idkls);
        $('#ubahkelas1').val(kls);
        $('#ubahtingkat').val(tingkat);
        $('#ubahruang').val(ruang);
    });





})