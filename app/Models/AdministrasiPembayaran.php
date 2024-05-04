<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdministrasiPembayaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function total_administrasi_terbayar()
    {
        $a = DB::select('SELECT a.siswa_id, SUM(a.nominal) AS total FROM administrasi_pembayarans a GROUP BY a.siswa_id');
        return $a;
    }

    public static function total_administrasi($tingkat)
    {
        return DB::select('SELECT SUM(a.nominal) AS nominal FROM administrasi_pembayarans a INNER JOIN siswas b ON a.siswa_id = b.id WHERE b.tingkat LIKE "%' . $tingkat . '%"');
    }
}
