<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaportDoaSiswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function nilai_doa()
    {
        return $this->belongsTo(RaportDoa::class, 'nilai_id', 'id');
    }
}
