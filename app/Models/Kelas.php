<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tendik()
    {
        return $this->belongsTo(Tendik::class, 'tendik_id', 'id');
    }

    public function masukKelas()
    {
        return $this->hasMany(MasukKelas::class, 'kela_id');
    }
}
