<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SppMasuk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function spp_perubahan()
    {
        return DB::select('SELECT a.siswa_id, a.spp_id, b.* FROM spp_masuks a INNER JOIN spp_perubahans b ON a.spp_id = b.id');
    }
}
