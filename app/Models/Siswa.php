<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function masukKelas()
    {
        return $this->hasOne(MasukKelas::class, 'siswa_id');
    }

    public static function cari_siswa_kelas($search)
    {
        $a = DB::select('SELECT siswas.id, siswas.nama, siswas.nik FROM siswas LEFT JOIN masuk_kelas ON siswas.id = masuk_kelas.siswa_id WHERE siswas.status = 1 AND masuk_kelas.id IS NULL AND siswas.nama LIKE "%' . $search . '%"');
        return $a;
    }
    public static function siswa_baru_limit()
    {
        $a = DB::select('SELECT * FROM siswas WHERE status = 0 LIMIT 5');
        return $a;
    }

    public static function siswa_baru()
    {
        $a = DB::select('SELECT * FROM siswas WHERE status =0');
        return $a;
    }
    public static function siswa_kelas($idkelas)
    {
        $a = DB::select('SELECT a.*, c.username FROM siswas a INNER JOIN masuk_kelas b ON a.id = b.siswa_id INNER JOIN users c ON a.id = c.id_user where c.id_role = 6 and a.status = 1 and b.kela_id = ' . $idkelas . ' ORDER BY a.nama');
        return $a;
    }

    public static function siswa_kelas_cari($idkelas, $search)
    {
        $a = DB::select('SELECT siswas.* FROM siswas INNER JOIN masuk_kelas ON siswas.id = masuk_kelas.siswa_id WHERE masuk_kelas.kela_id = ' . $idkelas . ' AND siswas.nama LIKE "%' . $search . '%"');
        return $a;
    }

    public static function akunpd()
    {
        $a = DB::select('SELECT a.*, b.username as username FROM siswas a INNER JOIN users b ON a.id = b.id_user where b.id_role = 6 and a.status = 1 order by a.nama asc');
        return $a;
    }

    public static function cariakunpd($search)
    {
        $a = DB::select('SELECT a.*, b.username as username FROM siswas a INNER JOIN users b ON a.id = b.id_user where b.id_role = 6 and  a.status = 1 and (a.nama like "%' . $search . '%" or a.panggilan like "%' . $search . '%" or b.username like "%' . $search . '%") order by a.nama asc');
        return $a;
    }
}
