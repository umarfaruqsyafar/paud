<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaportEkstraSiswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function nilai_ekstra()
    {
        return $this->belongsTo(RaportEkstra::class, 'ekstra_id', 'id');
    }
}
