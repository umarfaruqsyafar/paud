<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DokumentasiKegiatan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id', 'id');
    }

    public static function dok_kegiatan($jenis)
    {
        return DB::select('SELECT a.* FROM dokumentasi_kegiatans a INNER JOIN kegiatans b ON a.kegiatan_id = b.id WHERE b.jenis = "' . $jenis . '" ORDER BY a.id DESC');
    }
}
