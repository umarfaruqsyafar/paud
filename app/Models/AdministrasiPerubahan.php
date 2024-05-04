<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdministrasiPerubahan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function perubahan_administrasi()
    {
        $a = DB::select('SELECT a.siswa_id, SUM(a.tambah) as tambah, SUM(a.kurang) as kurang FROM administrasi_perubahans a GROUP BY a.siswa_id');
        return $a;
    }
}
