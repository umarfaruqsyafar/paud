<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function dokumenPrestasi()
    {
        return $this->hasMany(DokumenPrestasi::class, 'prestasi_id');
    }
}
