<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaportSurahSiswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function nilai_surah()
    {
        return $this->belongsTo(RaportSurah::class, 'nilai_id', 'id');
    }
}
