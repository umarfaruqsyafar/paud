<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenPrestasi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function prestasi()
    {
        return $this->belongsTo(Prestasi::class, 'prestasi_id', 'id');
    }
}
