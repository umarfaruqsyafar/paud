<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SppSiswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function spp_terbayar()
    {
        return DB::select('SELECT siswa_id, COUNT(siswa_id) AS total FROM `spp_siswas` GROUP BY siswa_id');
    }

    public static function spp_terbayar_akhir()
    {
        return DB::select('SELECT a.siswa_id, a.bulan_id, b.bulan
        FROM spp_siswas a
        INNER JOIN bulans b ON a.bulan_id = b.id
        WHERE (a.siswa_id, a.bulan_id) IN (
            SELECT siswa_id, MAX(bulan_id)
            FROM spp_siswas
            GROUP BY siswa_id
        );');
    }

    public static function spp_terbayar_akhir_siswa($idsiswa)
    {
        return DB::select('SELECT a.siswa_id, a.bulan_id, b.bulan
        FROM spp_siswas a
        INNER JOIN bulans b ON a.bulan_id = b.id
        WHERE (a.siswa_id, a.bulan_id) IN (
            SELECT siswa_id, MAX(bulan_id)
            FROM spp_siswas
            GROUP BY siswa_id
        ) AND a.siswa_id = ' . $idsiswa);
    }

    public static function total_spp($tingkat)
    {
        return DB::select('SELECT SUM(a.nominal) AS nominal FROM spp_siswas a INNER JOIN siswas b ON a.siswa_id = b.id WHERE b.tingkat LIKE "%' . $tingkat . '%"');
    }
}
