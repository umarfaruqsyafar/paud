<?php
header('Content-type: application/vnd-ms-excel');
header('Content-Disposition: attachment; filename=data_siswa_' . $kelas . '.xls');

?>

<p align="center" style="font-weight:bold;font-size:16pt">Data Peserta Didik {{ $kelas }}</p>

<div class="table-responsive" id="tabelpdwalas">
    <table class="table table-bordered" cellspacing="0">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Nama</th>
                <th>Panggilan</th>
                <th>Jk</th>
                <th>NIS</th>
                <th>NISN</th>
                <th>NIK</th>
                <th>Tempat</th>
                <th>Tgl Lahir</th>
                <th>Anak Ke</th>
                <th>Alamat</th>
                <th>Umur</th>
                <th>Nama Ibu</th>
                <th>Pendidikan Ibu</th>
                <th>Pekerjaan Ibu</th>
                <th>Agama Ibu</th>
                <th>No.HP Ibu</th>
                <th>Nama Ayah</th>
                <th>Pendidikan Ayah</th>
                <th>Pekerjaan Ayah</th>
                <th>Agama Ayah</th>
                <th>No.HP Ayah</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($siswa as $sm) : ?>
            <?php
            $tanggal_lahir = new DateTime($sm->lahir);
            $tanggal_sekarang = new DateTime();
            $selisih = $tanggal_lahir->diff($tanggal_sekarang);
            
            $umur_tahun = $selisih->y; // Umur dalam tahun
            $umur_bulan = $selisih->m; // Umur dalam bulan
            
            ?>
            <tr>
                <td class="text-center"><?= $i ?></td>
                <td><?= $sm->nama ?></td>
                <td><?= $sm->panggilan ?></td>
                <td><?= $sm->jk ?></td>
                <td><?= $sm->nis ?></td>
                <td><?= $sm->nisn ?></td>
                <td><?= "'" . $sm->nik ?></td>
                <td><?= $sm->tempat ?></td>
                <td><?= $sm->lahir ?></td>
                <td><?= $sm->anak_ke ?></td>
                <td><?= $sm->alamat ?></td>
                <td><?= $umur_tahun . ' tahun ' . $umur_bulan . ' bulan' ?></td>
                <td><?= $sm->nama_ibu ?></td>
                <td><?= $sm->pdd_ibu ?></td>
                <td><?= $sm->pekerjaan_ibu ?></td>
                <td><?= $sm->agama_ibu ?></td>
                <td><?= "'" . $sm->no_ibu ?></td>
                <td><?= $sm->nama_ayah ?></td>
                <td><?= $sm->pdd_ayah ?></td>
                <td><?= $sm->pekerjaan_ayah ?></td>
                <td><?= $sm->agama_ayah ?></td>
                <td><?= "'" . $sm->no_ayah ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
