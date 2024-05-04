<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaportSurah extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function surah_siswa()
    {
        return $this->hasMany(RaportSurahSiswa::class, 'nilai_id');
    }
}
