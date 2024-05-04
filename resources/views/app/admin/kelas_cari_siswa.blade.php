<?php
function cek_idsiswa($id)
{
    $query = DB::select('SELECT * FROM id_siswas WHERE siswa_id = ' . $id);
    if (count($query) > 0) {
        return 'checked';
    } else {
        return '';
    }
}
?>
<div id="cariSiswaKelas">
    <div class="table-responsive" id="tabelpd">
        <table class="table table-bordered" cellspacing="0">
            <thead class="text-center">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Siswa</th>
                    <th scope="col">NIK</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($siswa as $s) : ?>
                <tr>
                    <th scope="row">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input idSiswa" {{ cek_idsiswa($s->id) }}
                                data-idsiswa="{{ $s->id }}">
                        </div>
                    </th>

                    <td>{{ $s->nama }}</td>
                    <td class="text-center">{{ $s->nik }}</td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
