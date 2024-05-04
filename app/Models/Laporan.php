<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Laporan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function total_masuk($tingkat)
    {
        return DB::select('SELECT SUM(masuk) AS masuk FROM laporans WHERE masuk IS NOT NULL AND tingkat = "' . $tingkat . '"');
    }

    public static function total_keluar($tingkat)
    {
        return DB::select('SELECT SUM(keluar) keluar FROM laporans WHERE keluar IS NOT NULL AND tingkat = "' . $tingkat . '"');
    }
}
