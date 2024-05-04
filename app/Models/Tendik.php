<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tendik extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'tendik_id');
    }

    public static function tendik()
    {
        $a = DB::select('SELECT a.*, a.role, b.username as username, b.id_role FROM tendiks a INNER JOIN users b ON a.id = b.id_user where b.id_role != 6 order by b.id_role asc');
        return $a;
    }

    public static function datatendik($username)
    {
        $a = DB::select('SELECT a.*, a.role, b.username as username, b.id_role FROM tendiks a INNER JOIN users b ON a.id = b.id_user where b.username = "' . $username . '"');
        return $a;
    }
}
