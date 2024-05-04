<?php

namespace App\Http\Controllers;

use App\Models\DokumenPrestasi;
use App\Models\DokumentasiKegiatan;
use App\Models\Kegiatan;
use App\Models\Kelas;
use App\Models\Landing;
use App\Models\Sekolah;
use App\Models\Pengumuman;
use App\Models\Tendik;
use App\Models\Prestasi;
use App\Models\Yayasan;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $sekolah = Sekolah::first();
        $landing = Landing::all();
        $tendik = Tendik::all();
        $pengumuman = Pengumuman::orderBy('id', 'desc')->limit(3)->get();
        return view('landing.home.home', [
            'sekolah' => $sekolah,
            'landing' => $landing,
            'tendik' => $tendik,
            'pengumuman' => $pengumuman
        ]);
    }

    public function yayasan($idkegiatan)
    {
        $sekolah = Sekolah::first();
        $yayasan = Yayasan::first();
        $landing = Landing::all();
        $kegiatan = Kegiatan::where('jenis', 'yayasan')->get();
        if ($idkegiatan == '*') {
            $kegiatan_aktif = 'Semua Kegiatan';
            $dokumentasi = DokumentasiKegiatan::dok_kegiatan('yayasan');
        } else {
            $datakegiatan = Kegiatan::where('id', $idkegiatan)->get();
            $kegiatan_aktif = $datakegiatan[0]->judul;
            $dokumentasi = DokumentasiKegiatan::where('kegiatan_id', $idkegiatan)->orderBy('id', 'desc')->get();
        }
        $img = DokumentasiKegiatan::where('kegiatan_id', $idkegiatan)
            ->where('gambar', 'like', '%jpg')
            ->orWhere('gambar', 'like', '%jpeg')
            ->orWhere('gambar', 'like', '%png')
            ->orderBy('id', 'desc')
            ->get();
        return view('landing.home.yayasan', [
            'sekolah' => $sekolah,
            'yayasan' => $yayasan,
            'landing' => $landing,
            'kegiatan' => $kegiatan,
            'kegiatan_aktif' => $kegiatan_aktif,
            'dokumentasi' => $dokumentasi,
            'img' => $img
        ]);
    }

    public function komite($idkegiatan)
    {
        $sekolah = Sekolah::first();
        $landing = Landing::all();
        $kegiatan = Kegiatan::where('jenis', 'komite')->get();
        if ($idkegiatan == '*') {
            $kegiatan_aktif = 'Semua Kegiatan';
            $dokumentasi = DokumentasiKegiatan::dok_kegiatan('komite');
        } else {
            $datakegiatan = Kegiatan::where('id', $idkegiatan)->get();
            $kegiatan_aktif = $datakegiatan[0]->judul;
            $dokumentasi = DokumentasiKegiatan::where('kegiatan_id', $idkegiatan)->orderBy('id', 'desc')->get();
        }
        $img = DokumentasiKegiatan::where('kegiatan_id', $idkegiatan)
            ->where('gambar', 'like', '%jpg')
            ->orWhere('gambar', 'like', '%jpeg')
            ->orWhere('gambar', 'like', '%png')
            ->orderBy('id', 'desc')
            ->get();
        return view('landing.home.komite', [
            'sekolah' => $sekolah,
            'landing' => $landing,
            'kegiatan' => $kegiatan,
            'kegiatan_aktif' => $kegiatan_aktif,
            'dokumentasi' => $dokumentasi,
            'img' => $img
        ]);
    }

    public function kelas($jenis, $idkegiatan)
    {
        $sekolah = Sekolah::first();
        $kegiatan = Kegiatan::where('jenis', $jenis)->get();
        $kelas = Kelas::where('tendik_id', $jenis)->get();
        if ($idkegiatan == '*') {
            $kegiatan_aktif = 'Semua Kegiatan';
            $dokumentasi = DokumentasiKegiatan::dok_kegiatan($jenis);
        } else {
            $datakegiatan = Kegiatan::where('id', $idkegiatan)->get();
            $kegiatan_aktif = $datakegiatan[0]->judul;
            $dokumentasi = DokumentasiKegiatan::where('kegiatan_id', $idkegiatan)->orderBy('id', 'desc')->get();
        }
        $img = DokumentasiKegiatan::where('gambar', 'like', '%jpg')
            ->orWhere('gambar', 'like', '%jpeg')
            ->orWhere('gambar', 'like', '%png')
            ->orderBy('id', 'desc')
            ->get();
        return view('landing.home.kelas', [
            'sekolah' => $sekolah,
            'kegiatan' => $kegiatan,
            'kegiatan_aktif' => $kegiatan_aktif,
            'dokumentasi' => $dokumentasi,
            'kelas' => $kelas,
            'img' => $img
        ]);
    }

    public function dokumentasi($jenis, $idkegiatan)
    {

        if ($jenis == 'sekolah') {
            $judul = 'Kegiatan Sekolah';
        } elseif ($jenis == 'sarpras') {
            $judul = 'Sarana dan Prasarana';
        } elseif ($jenis == 'ekstra') {
            $judul = 'Kegiatan Ekstra';
        } elseif ($jenis == 'daycare') {
            $judul = 'Kegiatan Day Care';
        }

        $sekolah = Sekolah::first();
        $kegiatan = Kegiatan::where('jenis', $jenis)->get();
        if ($idkegiatan == '*') {
            $kegiatan_aktif = 'Semua Dokumentasi';
            $dokumentasi = DokumentasiKegiatan::dok_kegiatan($jenis);
        } else {
            $datakegiatan = Kegiatan::where('id', $idkegiatan)->get();
            $kegiatan_aktif = $datakegiatan[0]->judul;
            $dokumentasi = DokumentasiKegiatan::where('kegiatan_id', $idkegiatan)->orderBy('id', 'desc')->get();
        }
        $img = DokumentasiKegiatan::where('gambar', 'like', '%jpg')
            ->orWhere('gambar', 'like', '%jpeg')
            ->orWhere('gambar', 'like', '%png')
            ->orderBy('id', 'desc')
            ->get();
        return view('landing.home.dokumentasi', [
            'sekolah' => $sekolah,
            'kegiatan' => $kegiatan,
            'kegiatan_aktif' => $kegiatan_aktif,
            'dokumentasi' => $dokumentasi,
            'img' => $img,
            'jenis' => $jenis,
            'judul' => $judul,
        ]);
    }

    public function prestasi($jenis)
    {
        if ($jenis == '*') {
            $kegiatan_aktif = 'Semua Prestasi';
        } elseif ($jenis == 'sekolah') {
            $kegiatan_aktif = 'Sekolah';
        } elseif ($jenis == 'guru') {
            $kegiatan_aktif = 'Guru';
        } elseif ($jenis == 'siswa') {
            $kegiatan_aktif = 'Siswa';
        }
        $sekolah = Sekolah::first();
        if ($jenis == '*') {
            $prestasi = Prestasi::orderBy('id', 'desc')->get();
        } else {
            $prestasi = Prestasi::where('jenis', 'like', '%' . $jenis . '%')
                ->orWhere('judul', 'like', '%' . $jenis . '%')
                ->orderBy('id', 'desc')
                ->get();
        }
        return view('landing.home.prestasi', [
            'sekolah' => $sekolah,
            'prestasi' => $prestasi,
            'kegiatan_aktif' => $kegiatan_aktif,
        ]);
    }

    public function visi()
    {
        $sekolah = Sekolah::first();
        return view('landing.home.visi', [
            'sekolah' => $sekolah
        ]);
    }

    public function tendik()
    {
        $sekolah = Sekolah::first();
        $tendik = Tendik::all();
        return view('landing.home.tendik', [
            'sekolah' => $sekolah,
            'tendik' => $tendik
        ]);
    }

    public function layanan($tingkat)
    {
        $sekolah = Sekolah::first();
        $kelas = Kelas::where('tingkat', 'like', '%' . $tingkat . '%')->get();
        return view('landing.home.layanan', [
            'sekolah' => $sekolah,
            'kelas' => $kelas
        ]);
    }
}
