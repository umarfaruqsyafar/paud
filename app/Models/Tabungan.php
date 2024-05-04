<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tabungan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function total_tabungan()
    {
        return DB::select('SELECT siswa_id, SUM(menabung) AS total_tabungan, SUM(penarikan) AS total_penarikan FROM tabungans GROUP BY siswa_id');
    }

    public static function total_tabungan_siswa($idsiswa)
    {
        return DB::select('SELECT siswa_id, SUM(menabung) AS total_tabungan, SUM(penarikan) AS total_penarikan FROM tabungans WHERE siswa_id = ' . $idsiswa . ' GROUP BY siswa_id');
    }

    public static function jumlah_tabungan($idkelas)
    {
        if ($idkelas == 'all') {
            return DB::select('SELECT SUM(a.menabung) AS menabung, SUM(a.penarikan) AS penarikan FROM tabungans a');
        } else {
            return DB::select('SELECT SUM(a.menabung) AS menabung, SUM(a.penarikan) AS penarikan FROM tabungans a INNER JOIN masuk_kelas b ON a.siswa_id = b.siswa_id WHERE b.kela_id = ' . $idkelas);
        }
    }
}
