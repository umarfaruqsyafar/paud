<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaportDoa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function doa_siswa()
    {
        return $this->hasMany(RaportDoaSiswa::class, 'nilai_id');
    }
}
