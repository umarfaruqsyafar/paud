<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdministrasiMasuk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function administrasi_siswa()
    {
        $a = DB::select('SELECT a.siswa_id, SUM(b.biaya) as administrasi FROM administrasi_masuks a INNER JOIN administrasis b ON a.administrasi_id = b.id GROUP BY a.siswa_id');
        return $a;
    }
}
