<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaportEkstra extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function ekstra_siswa()
    {
        return $this->hasMany(RaportEkstraSiswa::class, 'ekstra_id');
    }
}
