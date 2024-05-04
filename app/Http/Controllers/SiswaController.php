<?php

namespace App\Http\Controllers;

use App\Models\Bulan;
use App\Models\Fisik;
use App\Models\Kelas;
use App\Models\MasukKelas;
use App\Models\RaportAwal;
use App\Models\RaportCapaian;
use App\Models\RaportCapaianSiswa;
use App\Models\RaportCapaianSiswa1;
use App\Models\RaportDoa;
use App\Models\RaportDoaSiswa;
use App\Models\RaportEkstra;
use App\Models\RaportEkstraSiswa;
use App\Models\RaportIndikator;
use App\Models\RaportIndikatorSiswa;
use App\Models\RaportKemunculan;
use App\Models\RaportPilar;
use App\Models\RaportPilarSiswa;
use App\Models\RaportSurah;
use App\Models\RaportSurahSiswa;
use App\Models\RaportTambahanSiswa;
use App\Models\RaportTujuan;
use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\Tendik;
use App\Models\Yayasan;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function fisik($idbulan)
    {

        $username = auth()->user()->username;
        $iduser = auth()->user()->id_user;
        if (auth()->user()->id_role == 6) {
            $siswa = Siswa::where('id', $iduser)->get();
            $dataTendik = $siswa;
            $datakelas = MasukKelas::where('siswa_id', $iduser)->get();
            if (count($datakelas) < 1) {
                return view('app.siswa.kelas_kosong_siswa', [
                    'user' => $siswa[0]
                ]);
            }
            $kelas = Kelas::where('id', $datakelas[0]->kela_id)->get();
        } else {
            $kelas = Kelas::where('tendik_id', $iduser)->get();
            $search = request('cari_siswa');
            if ($search) {
                $siswa = Siswa::siswa_kelas_cari($kelas[0]->id, $search);
            } else {
                $siswa = Siswa::siswa_kelas($kelas[0]->id);
            }
            $dataTendik = Tendik::datatendik($username);
        }

        $fisik = Fisik::where('bulan_id', $idbulan)->get();
        $bulan = Bulan::all();
        $bulan_aktif = Bulan::where('id', $idbulan)->get();
        return view('app.siswa.fisik', [
            'siswa' => $siswa,
            'user' => $dataTendik[0],
            'fisik' => $fisik,
            'bulan' => $bulan,
            'bulan_aktif' => $bulan_aktif[0],
            'kelas' => $kelas[0]
        ]);
    }

    public function fisik_tambah(Request $request)
    {
        $cek = Fisik::where('siswa_id', $request->idsiswa)->where('bulan_id', $request->idbulan)->get();
        $data = [
            'siswa_id' => $request->idsiswa,
            'bulan_id' => $request->idbulan,
            'tb' => $request->tb,
            'bb' => $request->bb,
            'lk' => $request->lk,
        ];
        if (count($cek) < 1) {
            Fisik::create($data);
        } else {
            Fisik::where('id', $cek[0]->id)->update($data);
        }
        return redirect('/siswa/fisik/' . $request->idbulan)->with('success', 'Perkembangan fisik siswa berhasil ditambah!');
    }

    public function format_raport()
    {
        $username = auth()->user()->username;
        $iduser = auth()->user()->id_user;
        $dataTendik = Tendik::datatendik($username);
        $cek_raport_awal = RaportAwal::where('tendik_id', $iduser)->get();
        if (count($cek_raport_awal) < 1) {
            $raport_awal = 0;
        } else {
            $raport_awal = $cek_raport_awal[0];
        }
        $raport_capaian = RaportCapaian::all();
        return view('app.siswa.format_raport', [
            'user' => $dataTendik[0],
            'raport_awal' => $raport_awal,
            'raport_capaian' => $raport_capaian,
            'iduser' => $iduser
        ]);
    }

    public function raport_lihat($idsiswa, $indikator_cek)
    {
        $sekolah = Sekolah::first();
        $yayasan = Yayasan::first();
        $kep = Tendik::where('role', 'kepala sekolah')->get();
        $siswa = Siswa::where('id', $idsiswa)->get();
        $datakelas = MasukKelas::where('siswa_id', $idsiswa)->get();
        if (count($datakelas) < 1) {
            return view('app.siswa.kelas_kosong_siswa', [
                'user' => $siswa[0]
            ]);
        }
        $kelas = Kelas::where('id', $datakelas[0]->kela_id)->get();
        $dataTendik = Tendik::where('id', $kelas[0]->tendik_id)->get();
        $idtendik = $dataTendik[0]->id;

        if ($kelas[0]->tingkat == 'KB') {
            $tingkat = 'KELOMPOK BERMAIN';
        } else {
            $tingkat = 'TAMAN KANAK KANAK';
        }
        $kelompok = $kelas[0]->tingkat;
        $nilai_awal = RaportAwal::where('tendik_id', $idtendik)->get();
        if (count($nilai_awal) > 0) {
            $nilai_awal = $nilai_awal[0];
        } else {
            $nilai_awal = (object)[
                'usia' => null,
                'fase' => null,
                'kurikulum' => null,
                'semester' => null,
                'tahun' => null,
                'tanggal_raport' => null
            ];
        }
        $pilar1 = RaportPilar::where('pilar_id', 1)->get();
        $pilar2 = RaportPilar::where('pilar_id', 2)->get();
        $pilar3 = RaportPilar::where('pilar_id', 3)->get();
        $pilar4 = RaportPilar::where('pilar_id', 4)->get();
        $pilar5 = RaportPilar::where('pilar_id', 5)->get();
        $pilar6 = RaportPilar::where('pilar_id', 6)->get();
        $pilar7 = RaportPilar::where('pilar_id', 7)->get();
        $pilar8 = RaportPilar::where('pilar_id', 8)->get();
        $pilar9 = RaportPilar::where('pilar_id', 9)->get();
        $pilar10 = RaportPilar::where('pilar_id', 10)->get();

        $capaian_awal = RaportCapaian::all();
        $cp_tujuan = RaportTujuan::all();

        $nilai_capaian = RaportCapaianSiswa::where('siswa_id', $siswa[0]->id)->get();

        $nilai_doa = RaportDoaSiswa::where('siswa_id', $siswa[0]->id)->get();
        $nilai_surah = RaportSurahSiswa::where('siswa_id', $siswa[0]->id)->get();
        $nilai_ekstra = RaportEkstraSiswa::where('siswa_id', $siswa[0]->id)->get();
        $fisik = Fisik::where('siswa_id', $siswa[0]->id)->orderBy('bulan_id', 'desc')->first();
        $tambahan = RaportTambahanSiswa::where('siswa_id', $siswa[0]->id)->first();
        $fisik_total = Fisik::where('siswa_id', $siswa[0]->id)->get();

        return view('app.siswa.raport_lihat', [
            'sekolah' => $sekolah,
            'yayasan' => $yayasan,
            'kep' => $kep[0],
            'siswa' => $siswa[0],
            'walas' => $dataTendik[0],
            'tingkat' => $tingkat,
            'kelompok' => $kelompok,
            'nilai_awal' => $nilai_awal,
            'pilar1' => $pilar1,
            'pilar2' => $pilar2,
            'pilar3' => $pilar3,
            'pilar4' => $pilar4,
            'pilar5' => $pilar5,
            'pilar6' => $pilar6,
            'pilar7' => $pilar7,
            'pilar8' => $pilar8,
            'pilar9' => $pilar9,
            'pilar10' => $pilar10,
            'capaian_awal' => $capaian_awal,
            'cp_tujuan' => $cp_tujuan,
            'nilai_capaian' => $nilai_capaian,
            'nilai_doa' => $nilai_doa,
            'nilai_surah' => $nilai_surah,
            'nilai_ekstra' => $nilai_ekstra,
            'fisik' => $fisik,
            'tambahan' => $tambahan,
            'fisik_total' => $fisik_total,
            'indikator_cek' => $indikator_cek,
        ]);
    }

    public function format_raport_capaian($idcapaian)
    {
        $username = auth()->user()->username;
        $iduser = auth()->user()->id_user;
        $search = request('cari_tujuan');
        if ($search) {
            $tujuan = RaportTujuan::where('tujuan', 'like', '%' . $search . '%')
                ->get();
        } else {
            $tujuan = RaportTujuan::where('raport_capaian_id', $idcapaian)->get();
        }
        $indikator = RaportIndikator::where('raport_capaian_id', $idcapaian)->get();
        $capaian = RaportCapaian::where('id', $idcapaian)->get();
        $dataTendik = Tendik::datatendik($username);
        return view('app.siswa.format_raport_tujuan', [
            'user' => $dataTendik[0],
            'capaian' => $capaian[0],
            'tujuan' => $tujuan,
            'indikator' => $indikator,
            'iduser' => $iduser
        ]);
    }

    public function deskripsi(Request $request)
    {
        $data = ['deskripsi' => $request->deskripsi];
        RaportCapaian::where('id', $request->id)->update($data);
        return redirect('/siswa/format_raport/' . $request->id)->with('success', 'Deskripsi berhasil diperbarui!');
    }

    public function format_raport_tujuan($idcapaian, $idtujuan)
    {
        $username = auth()->user()->username;
        $iduser = auth()->user()->id_user;
        $tujuan = RaportTujuan::where('id', $idtujuan)->get();
        $search = request('cari_indikator');
        if ($search) {
            $indikator = RaportIndikator::where('raport_capaian_id', $idcapaian)
                ->where('raport_tujuan_id', $idtujuan)
                ->where('indikator', 'like', '%' . $search . '%')
                ->get();
        } else {
            $indikator = RaportIndikator::where('raport_capaian_id', $idcapaian)
                ->where('raport_tujuan_id', $idtujuan)
                ->get();
        }
        $capaian = RaportCapaian::where('id', $idcapaian)->get();
        $dataTendik = Tendik::datatendik($username);
        return view('app.siswa.format_raport_indikator', [
            'user' => $dataTendik[0],
            'capaian' => $capaian[0],
            'tujuan' => $tujuan[0],
            'indikator' => $indikator,
            'iduser' => $iduser
        ]);
    }

    public function tambah_tujuan(Request $request)
    {
        $data = [
            'raport_capaian_id' => $request->idcapaian,
            'tujuan' => $request->tujuan
        ];
        RaportTujuan::create($data);
        return redirect('/siswa/format_raport/' . $request->idcapaian)->with('success', 'Tujuan berhasil ditambah!');
    }

    public function ubah_tujuan(Request $request)
    {
        RaportTujuan::where('id', $request->id)->update(['tujuan' => $request->tujuan]);
        return redirect('/siswa/format_raport/' . $request->idcapaian)->with('success', 'Tujuan berhasil diubah!');
    }

    public function hapus_tujuan(Request $request)
    {
        $indikator = RaportIndikator::where('raport_tujuan_id', $request->id)->get();
        if ($indikator) {
            foreach ($indikator as $i) {
                RaportIndikator::destroy($i->id);
                RaportIndikatorSiswa::where('indikator', $i->indikator)->delete();
            }
        }
        RaportTujuan::destroy($request->id);
        return redirect('/siswa/format_raport/' . $request->idcapaian)->with('success', 'Tujuan telah dihapus!');
    }

    public function tambah_indikator(Request $request)
    {
        $data = [
            'raport_capaian_id' => $request->idcapaian,
            'raport_tujuan_id' => $request->idtujuan,
            'indikator' => $request->indikator
        ];
        RaportIndikator::create($data);
        return redirect('/siswa/format_raport/' . $request->idcapaian . '/' . $request->idtujuan)->with('success', 'Indikator berhasil ditambah!');
    }

    public function ubah_indikator(Request $request)
    {
        RaportIndikator::where('id', $request->id)->update(['indikator' => $request->indikator]);
        return redirect('/siswa/format_raport/' . $request->idcapaian . '/' . $request->idtujuan)->with('success', 'Indikator berhasil diubah!');
    }

    public function hapus_indikator(Request $request)
    {
        $cek = RaportIndikator::where('id', $request->id)->get();
        if (count($cek) > 0) {
            RaportIndikatorSiswa::where('indikator', $cek[0]->indikator)->delete();
        }
        RaportIndikator::destroy($request->id);
        return redirect('/siswa/format_raport/' . $request->idcapaian . '/' . $request->idtujuan)->with('success', 'Indikator telah dihapus!');
    }

    public function format_raport_awal(Request $request)
    {
        $data = [
            'tendik_id' => $request->idtendik,
            'usia' => $request->usia,
            'fase' => $request->fase,
            'semester' => $request->semester,
            'tahun' => $request->tahun,
            'kurikulum' => $request->kurikulum,
            'tanggal_raport' => $request->tgl,
        ];
        $cek = RaportAwal::where('tendik_id', $request->idtendik)->get();
        if (count($cek) < 1) {
            RaportAwal::create($data);
        } else {
            RaportAwal::where('id', $cek[0]->id)->update($data);
        }
        return redirect('/siswa/format_raport')->with('success', 'Data raport berhasil diperbarui!');
    }

    public function format_raport2()
    {
        $username = auth()->user()->username;
        $iduser = auth()->user()->id_user;
        $dataTendik = Tendik::datatendik($username);
        $doa = RaportDoa::where('tendik_id', $iduser)->get();
        $surah = RaportSurah::where('tendik_id', $iduser)->get();
        return view('app.siswa.format_raport2', [
            'user' => $dataTendik[0],
            'iduser' => $iduser,
            'doa' => $doa,
            'surah' => $surah
        ]);
    }

    public function tambah_doa(Request $request)
    {
        $data = [
            'tendik_id' => $request->idtendik,
            'doa' => $request->doa
        ];
        RaportDoa::create($data);
        return redirect('/siswa/format_raport2')->with('success', "Do'a berhasil ditambah!");
    }

    public function ubah_doa(Request $request)
    {
        RaportDoa::where('id', $request->id)->update(['doa' => $request->doa]);
        return redirect('/siswa/format_raport2')->with('success', "Do'a berhasil diubah!");
    }

    public function hapus_doa(Request $request)
    {
        RaportDoa::destroy($request->id);
        return redirect('/siswa/format_raport2')->with('success', "Do'a telah dihapus!");
    }

    public function tambah_surah(Request $request)
    {
        $data = [
            'tendik_id' => $request->idtendik,
            'surah' => $request->surah
        ];
        RaportSurah::create($data);
        return redirect('/siswa/format_raport2')->with('success', "Surah berhasil ditambah!");
    }

    public function ubah_surah(Request $request)
    {
        RaportSurah::where('id', $request->id)->update(['surah' => $request->surah]);
        return redirect('/siswa/format_raport2')->with('success', "Surah berhasil diubah!");
    }

    public function hapus_surah(Request $request)
    {
        RaportSurah::destroy($request->id);
        return redirect('/siswa/format_raport2')->with('success', "Surah telah dihapus!");
    }


    public function format_raport3()
    {
        $username = auth()->user()->username;
        $iduser = auth()->user()->id_user;
        $dataTendik = Tendik::datatendik($username);
        $pilar1 = RaportPilar::where('pilar_id', 1)->get();
        $pilar2 = RaportPilar::where('pilar_id', 2)->get();
        $pilar3 = RaportPilar::where('pilar_id', 3)->get();
        $pilar4 = RaportPilar::where('pilar_id', 4)->get();
        $pilar5 = RaportPilar::where('pilar_id', 5)->get();
        $pilar6 = RaportPilar::where('pilar_id', 6)->get();
        $pilar7 = RaportPilar::where('pilar_id', 7)->get();
        $pilar8 = RaportPilar::where('pilar_id', 8)->get();
        $pilar9 = RaportPilar::where('pilar_id', 9)->get();
        $pilar10 = RaportPilar::where('pilar_id', 10)->get();
        return view('app.siswa.format_raport3', [
            'user' => $dataTendik[0],
            'iduser' => $iduser,
            'pilar1' => $pilar1,
            'pilar2' => $pilar2,
            'pilar3' => $pilar3,
            'pilar4' => $pilar4,
            'pilar5' => $pilar5,
            'pilar6' => $pilar6,
            'pilar7' => $pilar7,
            'pilar8' => $pilar8,
            'pilar9' => $pilar9,
            'pilar10' => $pilar10
        ]);
    }

    public function tambah_pilar(Request $request)
    {
        $data = [
            'pilar_id' => $request->idpilar,
            'keterangan' => $request->keterangan_pilar
        ];
        RaportPilar::create($data);
        return redirect('/siswa/format_raport3')->with('success', "Data pilar berhasil ditambah!");
    }

    public function ubah_pilar(Request $request)
    {
        RaportPilar::where('id', $request->idpilarUbah)->update(['keterangan' => $request->keterangan_ubah]);
        return redirect('/siswa/format_raport3')->with('success', "Data pilar berhasil diubah!");
    }

    public function hapus_pilar(Request $request)
    {
        RaportPilar::destroy($request->idpilarHapus);
        return redirect('/siswa/format_raport3')->with('success', "Data pilar telah dihapus!");
    }


    public function format_raport4()
    {
        $username = auth()->user()->username;
        $iduser = auth()->user()->id_user;
        $dataTendik = Tendik::datatendik($username);
        $ekstra = RaportEkstra::all();
        return view('app.siswa.format_raport4', [
            'user' => $dataTendik[0],
            'iduser' => $iduser,
            'ekstra' => $ekstra
        ]);
    }

    public function tambah_ekstra(Request $request)
    {
        $data = [
            'tendik_id' => $request->idtendik,
            'ekstra' => $request->ekstra
        ];
        RaportEkstra::create($data);
        return redirect('/siswa/format_raport4')->with('success', "Kegiatan ekstra berhasil ditambah!");
    }

    public function ubah_ekstra(Request $request)
    {
        RaportEkstra::where('id', $request->id)->update(['ekstra' => $request->ekstra]);
        return redirect('/siswa/format_raport4')->with('success', "Kegiatan ekstra berhasil diubah!");
    }

    public function hapus_ekstra(Request $request)
    {
        RaportEkstra::destroy($request->id);
        return redirect('/siswa/format_raport4')->with('success', "Kegiatan ekstra telah dihapus!");
    }

    // Penilaian Raport

    public function raport()
    {
        $username = auth()->user()->username;
        $iduser = auth()->user()->id_user;
        $dataTendik = Tendik::datatendik($username);
        $kelas = Kelas::where('tendik_id', $iduser)->get();
        $search = request('cari_siswa');
        if ($search) {
            $siswa = Siswa::siswa_kelas_cari($kelas[0]->id, $search);
        } else {
            $siswa = Siswa::siswa_kelas($kelas[0]->id);
        }
        return view('app.siswa.raport', [
            'user' => $dataTendik[0],
            'iduser' => $iduser,
            'siswa' => $siswa
        ]);
    }

    public function raport_siswa($idsiswa, $idcapaian)
    {
        $username = auth()->user()->username;
        $iduser = auth()->user()->id_user;
        $dataTendik = Tendik::datatendik($username);
        $siswa = Siswa::where('id', $idsiswa)->get();
        $capaian = RaportCapaian::all();
        $capaian_aktif = RaportCapaian::where('id', $idcapaian)->get();
        $tujuan = RaportTujuan::where('raport_capaian_id', $idcapaian)->get();
        $indikator = RaportIndikator::where('raport_capaian_id', $idcapaian)->get();
        $indikator_siswa = RaportIndikatorSiswa::where('siswa_id', $idsiswa)->get();
        $nilai_siswa = RaportCapaianSiswa1::where('capaian_id', $idcapaian)->where('siswa_id', $idsiswa)->get();
        $nilai_siswa_fix = RaportCapaianSiswa::where('siswa_id', $idsiswa)->where('capaian_id', $idcapaian)->get();
        return view('app.siswa.raport1', [
            'user' => $dataTendik[0],
            'iduser' => $iduser,
            'siswa' => $siswa[0],
            'capaian' => $capaian,
            'capaian_aktif' => $capaian_aktif[0],
            'tujuan' => $tujuan,
            'indikator' => $indikator,
            'indikator_siswa' => $indikator_siswa,
            'nilai_siswa' => $nilai_siswa,
            'nilai_siswa_fix' => $nilai_siswa_fix
        ]);
    }

    public function raport_nilai1(Request $request)
    {
        $idtujuan = $request->idtujuan;
        $cektujuan = RaportTujuan::where('id', $idtujuan)->get();
        $tujuan = $cektujuan[0]->tujuan;
        $skor = $request->skor;
        if ($skor == 'sm') {
            $nilai = 'sudah mampu dalam ' . $tujuan . ', hal ini tampak dalam ';
            $nilai2 = ' sudah berkembang sesuai harapan';
            $skor1 = 'sudah mampu';
        } elseif ($skor == 'mm') {
            $nilai = 'mulai mampu dalam ' . $tujuan . ', hal ini tampak dalam ';
            $nilai2 = ' sudah mulai berkembang';
            $skor1 = 'mulai mampu';
        } elseif ($skor == 'pd') {
            $nilai = 'perlu ditingkatkan lagi untuk hasil yang lebih baik dalam ' . $tujuan . ', hal ini tampak dalam ';
            $nilai2 = ' masih perlu bimbingan';
            $skor1 = 'perlu ditingkatkan';
        }

        $data = [
            'siswa_id' => $request->idsiswa,
            'capaian_id' => $request->idcapaian,
            'tujuan_id' => $request->idtujuan,
            'tujuan' => $tujuan,
            'skor' => $skor1,
            'nilai' => $nilai,
            'nilai2' => $nilai2
        ];

        RaportCapaianSiswa1::create($data);
        return redirect('/siswa/raport/' . $request->idsiswa . '/' . $request->idcapaian)->with('success', "Nilai berhasil ditambahkan!");
    }

    public function raport_hapus_nilai(Request $request)
    {
        $cek_indikator = RaportIndikatorSiswa::where('nilai_id', $request->idnilai)->get();
        foreach ($cek_indikator as $ci) {
            RaportIndikatorSiswa::destroy('id', $ci->id);
        }
        RaportCapaianSiswa1::destroy('id', $request->idnilai);
        return redirect('/siswa/raport/' . $request->idsiswa . '/' . $request->idcapaian)->with('success', "Nilai telah dihapus!");
    }

    public function raport_nilai1_fix(Request $request)
    {
        if ($request->deskripsi == null) {
            $cek_nilai = RaportCapaianSiswa::where('siswa_id', $request->idsiswa)->where('capaian_id', $request->idcapaian)->get();
            if (count($cek_nilai) < 1) {
                return redirect('/siswa/raport/' . $request->idsiswa . '/' . $request->idcapaian)->with('success', "Silahkan lakukan pengisisan nilai dengan benar!");
            } else {
                RaportCapaianSiswa::destroy($cek_nilai[0]->id);
                return redirect('/siswa/raport/' . $request->idsiswa . '/' . $request->idcapaian)->with('success', "Penilaian dibatalkan!");
            }
        }
        $cek_nilai = RaportCapaianSiswa::where('siswa_id', $request->idsiswa)->where('capaian_id', $request->idcapaian)->get();
        $data = [
            'siswa_id' => $request->idsiswa,
            'capaian_id' => $request->idcapaian,
            'deskripsi' => $request->deskripsi,
        ];
        if (count($cek_nilai) < 1) {
            RaportCapaianSiswa::create($data);
        } else {
            RaportCapaianSiswa::where('id', $cek_nilai[0]->id)->update($data);
        }

        return redirect('/siswa/raport/' . $request->idsiswa . '/' . $request->idcapaian)->with('success', "Nilai berhasil ditambahkan!");
    }

    public function raport_dokumentasi(Request $request)
    {
        if ($request->file('image') == null) {
            return redirect('/siswa/raport/' . $request->idsiswa . '/' . $request->idcapaian)->with('success', "Tambahkan foto dengan benar!");
        }
        $cek_nilai = RaportCapaianSiswa::where('siswa_id', $request->idsiswa)->where('capaian_id', $request->idcapaian)->get();
        if (count($cek_nilai) < 1) {
            return redirect('/siswa/raport/' . $request->idsiswa . '/' . $request->idcapaian)->with('success', "Simpan nilai terlebih dahulu!");
        } elseif ($cek_nilai[0]->image1 == null and $cek_nilai[0]->image2 == null) {
            $data = [
                'image1' => $request->file('image')->store('raport-images')
            ];
        } elseif ($cek_nilai[0]->image1 !== null and $cek_nilai[0]->image2 == null) {
            $data = [
                'image2' => $request->file('image')->store('raport-images')
            ];
        } else {
            return redirect('/siswa/raport/' . $request->idsiswa . '/' . $request->idcapaian)->with('success', "Foto sudah lengkap, hapus foto terlebih dahulu jika ingin mengganti!");
        }

        RaportCapaianSiswa::where('id', $cek_nilai[0]->id)->update($data);
        return redirect('/siswa/raport/' . $request->idsiswa . '/' . $request->idcapaian)->with('success', "Foto berhasil ditambah!");
    }

    public function raport_dokumentasi_hapus(Request $request)
    {
        $cek_nilai = RaportCapaianSiswa::where('siswa_id', $request->idsiswa)->where('capaian_id', $request->idcapaian)->get();
        if ($request->image == null) {
            return redirect('/siswa/raport/' . $request->idsiswa . '/' . $request->idcapaian)->with('success', "Foto tidak tersedia!");
        } else {
            Storage::delete($request->image);
            if ($request->idgambar == 1) {
                $data = ['image1' => null];
            } elseif ($request->idgambar == 2) {
                $data = ['image2' => null];
            }
            RaportCapaianSiswa::where('id', $cek_nilai[0]->id)->update($data);
            return redirect('/siswa/raport/' . $request->idsiswa . '/' . $request->idcapaian)->with('success', "Foto telah dihapus!");
        }
    }

    public function nilai_indikator(Request $request)
    {
        $cekIndikator = RaportIndikatorSiswa::where('siswa_id', $request->idsiswa)
            ->where('nilai_id', $request->idnilai)
            ->where('indikator', 'like', '%' . $request->indikator . '%')
            ->get();
        if (count($cekIndikator) > 0) {
            RaportIndikatorSiswa::destroy($cekIndikator);
        } else {
            $data = [
                'siswa_id' => $request->idsiswa,
                'nilai_id' => $request->idnilai,
                'indikator' => $request->indikator
            ];
            RaportIndikatorSiswa::create($data);
        }
    }

    public function nilai_kemunculan(Request $request)
    {
        $cek_kemunculan = RaportKemunculan::where('siswa_id', $request->idsiswa)->where('tujuan_id', $request->idtujuan)->get();
        if (count($cek_kemunculan) < 1) {
            if ($request->muncul == 'ya') {
                $data = [
                    'tujuan_id' => $request->idtujuan,
                    'siswa_id' => $request->idsiswa,
                    'ya' => 1,
                    'tidak' => 0
                ];
            } elseif ($request->muncul == 'tidak') {
                $data = [
                    'tujuan_id' => $request->idtujuan,
                    'siswa_id' => $request->idsiswa,
                    'ya' => 0,
                    'tidak' => 1
                ];
            }
            RaportKemunculan::create($data);
        } else {
            if ($request->muncul == 'ya') {
                if ($cek_kemunculan[0]->ya == 1) {
                    $data = ['ya' => 0];
                } elseif ($cek_kemunculan[0]->ya == 0) {
                    $data = ['ya' => 1];
                }
            }
            if ($request->muncul == 'tidak') {
                if ($cek_kemunculan[0]->tidak == 1) {
                    $data = ['tidak' => 0];
                } elseif ($cek_kemunculan[0]->tidak == 0) {
                    $data = ['tidak' => 1];
                }
            }
            RaportKemunculan::where('id', $cek_kemunculan[0]->id)->update($data);
        }
        $data_kosong = RaportKemunculan::where('ya', 0)->where('tidak', 0)->get();
        if (count($data_kosong) > 0) {
            foreach ($data_kosong as $dk) {
                RaportKemunculan::destroy($dk->id);
            }
        }
    }

    public function raport2($idsiswa, $ket)
    {
        $username = auth()->user()->username;
        $iduser = auth()->user()->id_user;
        $dataTendik = Tendik::datatendik($username);
        $siswa = Siswa::where('id', $idsiswa)->get();
        if ($ket == 1) {
            $penilaian = RaportDoa::where('tendik_id', $iduser)->get();
            $penilaian_siswa = RaportDoaSiswa::where('siswa_id', $siswa[0]->id)->get();
            $keterangan = "Do'a";
            $nilai = "doa";
        } else {
            $penilaian = RaportSurah::where('tendik_id', $iduser)->get();
            $penilaian_siswa = RaportDoaSiswa::where('siswa_id', $siswa[0]->id)->get();
            $keterangan = "Surah";
            $nilai = "surah";
        }
        return view('app.siswa.raport2', [
            'user' => $dataTendik[0],
            'iduser' => $iduser,
            'siswa' => $siswa[0],
            'penilaian' => $penilaian,
            'penilaian_siswa' => $penilaian_siswa,
            'keterangan' => $keterangan,
            'nilai' => $nilai
        ]);
    }

    public function raport2_nilai(Request $request)
    {
        if ($request->ket == 'doa') {
            $cek_hasil = RaportDoaSiswa::where('siswa_id', $request->idsiswa)
                ->where('nilai_id', $request->idnilai)
                ->where($request->nilai, 1)
                ->get();
            if (count($cek_hasil) > 0) {
                RaportDoaSiswa::destroy($cek_hasil[0]->id);
                exit();
            }
        }

        if ($request->ket == 'surah') {
            $cek_hasil = RaportSurahSiswa::where('siswa_id', $request->idsiswa)
                ->where('nilai_id', $request->idnilai)
                ->where($request->nilai, 1)
                ->get();
            if (count($cek_hasil) > 0) {
                RaportSurahSiswa::destroy($cek_hasil[0]->id);
                exit();
            }
        }
        $data = [
            'siswa_id' => $request->idsiswa,
            'nilai_id' => $request->idnilai
        ];
        if ($request->nilai == 'bm') {
            $data['bm'] = 1;
            $data['mm'] = 0;
            $data['bsh'] = 0;
            $data['bsb'] = 0;
        } elseif ($request->nilai == 'mm') {
            $data['bm'] = 0;
            $data['mm'] = 1;
            $data['bsh'] = 0;
            $data['bsb'] = 0;
        } elseif ($request->nilai == 'bsh') {
            $data['bm'] = 0;
            $data['mm'] = 0;
            $data['bsh'] = 1;
            $data['bsb'] = 0;
        } elseif ($request->nilai == 'bsb') {
            $data['bm'] = 0;
            $data['mm'] = 0;
            $data['bsh'] = 0;
            $data['bsb'] = 1;
        }
        if ($request->ket == 'doa') {
            $cek_nilai = RaportDoaSiswa::where('siswa_id', $request->idsiswa)->where('nilai_id', $request->idnilai)->get();
            if (count($cek_nilai) > 0) {
                RaportDoaSiswa::where('id', $cek_nilai[0]->id)->update($data);
            } else {
                RaportDoaSiswa::create($data);
            }
        }
        if ($request->ket == 'surah') {
            $cek_nilai = RaportSurahSiswa::where('siswa_id', $request->idsiswa)->where('nilai_id', $request->idnilai)->get();
            if (count($cek_nilai) > 0) {
                RaportSurahSiswa::where('id', $cek_nilai[0]->id)->update($data);
            } else {
                RaportSurahSiswa::create($data);
            }
        }
    }

    public function raport2_keterangan(Request $request)
    {
        $data = ['keterangan' => $request->keterangan];

        if ($request->ket == 'doa') {
            $cek_nilai = RaportDoaSiswa::where('siswa_id', $request->idsiswa)->where('nilai_id', $request->idnilai)->get();
            if (count($cek_nilai) > 0) {
                RaportDoaSiswa::where('id', $cek_nilai[0]->id)->update($data);
                return redirect('/siswa/raport2/' . $request->idsiswa . '/1')->with('success', "Keterangan berhasil ditambah!");
            } else {
                return redirect('/siswa/raport2/' . $request->idsiswa . '/1')->with('success', "Pilih nilai terlebih dahulu!");
            }
        } elseif ($request->ket == 'surah') {
            $cek_nilai = RaportSurahSiswa::where('siswa_id', $request->idsiswa)->where('nilai_id', $request->idnilai)->get();
            if (count($cek_nilai) > 0) {
                RaportSurahSiswa::where('id', $cek_nilai[0]->id)->update($data);
                return redirect('/siswa/raport2/' . $request->idsiswa . '/2')->with('success', "Keterangan berhasil ditambah!");
            } else {
                return redirect('/siswa/raport2/' . $request->idsiswa . '/2')->with('success', "Pilih nilai terlebih dahulu!");
            }
        }
    }

    public function raport3($idsiswa)
    {
        $username = auth()->user()->username;
        $iduser = auth()->user()->id_user;
        $dataTendik = Tendik::datatendik($username);
        $siswa = Siswa::where('id', $idsiswa)->get();
        $pilar1 = RaportPilar::where('pilar_id', 1)->get();
        $pilar2 = RaportPilar::where('pilar_id', 2)->get();
        $pilar3 = RaportPilar::where('pilar_id', 3)->get();
        $pilar4 = RaportPilar::where('pilar_id', 4)->get();
        $pilar5 = RaportPilar::where('pilar_id', 5)->get();
        $pilar6 = RaportPilar::where('pilar_id', 6)->get();
        $pilar7 = RaportPilar::where('pilar_id', 7)->get();
        $pilar8 = RaportPilar::where('pilar_id', 8)->get();
        $pilar9 = RaportPilar::where('pilar_id', 9)->get();
        $pilar10 = RaportPilar::where('pilar_id', 10)->get();
        return view('app.siswa.raport3', [
            'user' => $dataTendik[0],
            'iduser' => $iduser,
            'siswa' => $siswa[0],
            'pilar1' => $pilar1,
            'pilar2' => $pilar2,
            'pilar3' => $pilar3,
            'pilar4' => $pilar4,
            'pilar5' => $pilar5,
            'pilar6' => $pilar6,
            'pilar7' => $pilar7,
            'pilar8' => $pilar8,
            'pilar9' => $pilar9,
            'pilar10' => $pilar10
        ]);
    }

    public function raport3_nilai(Request $request)
    {
        $cek = RaportPilarSiswa::where('siswa_id', $request->idsiswa)
            ->where('pilar_id', $request->idpilar)
            ->where('nilai', $request->nilai)
            ->get();
        if (count($cek) > 0) {
            RaportPilarSiswa::destroy($cek[0]->id);
            exit();
        } else {
            $cek_dua = RaportPilarSiswa::where('siswa_id', $request->idsiswa)
                ->where('pilar_id', $request->idpilar)
                ->get();
            $data = [
                'siswa_id' => $request->idsiswa,
                'pilar_id' => $request->idpilar,
                'nilai' => $request->nilai
            ];
            if (count($cek_dua) > 0) {
                RaportPilarSiswa::where('id', $cek_dua[0]->id)->update($data);
            } else {
                RaportPilarSiswa::create($data);
            }
        }
    }

    public function raport4($idsiswa)
    {
        $username = auth()->user()->username;
        $iduser = auth()->user()->id_user;
        $dataTendik = Tendik::datatendik($username);
        $siswa = Siswa::where('id', $idsiswa)->get();
        $cek = RaportTambahanSiswa::where('siswa_id', $idsiswa)->get();
        $nilai_ekstra = RaportEkstraSiswa::where('siswa_id', $idsiswa)->get();
        if (count($cek) > 0) {
            $nilai = $cek[0];
        } else {
            $nilai = (object)[
                'sakit' => null,
                'izin' => null,
                'alpa' => null,
                'gigi' => null,
                'kerapihan' => null,
                'kebersihan' => null,
                'pesan' => null,
            ];
        }
        $ekstra = RaportEkstra::all();
        return view('app.siswa.raport4', [
            'user' => $dataTendik[0],
            'iduser' => $iduser,
            'siswa' => $siswa[0],
            'nilai' => $nilai,
            'ekstra' => $ekstra,
            'nilai_ekstra' => $nilai_ekstra
        ]);
    }

    public function raport4_nilai(Request $request)
    {
        if ($request->indikator == 1) {
            $data = [
                'siswa_id' => $request->idsiswa,
                'sakit' => $request->sakit,
                'izin' => $request->izin,
                'alpa' => $request->alpa,
                'gigi' => $request->gigi,
                'kebersihan' => $request->kebersihan,
                'kerapihan' => $request->kerapihan,
            ];
        } else {
            $data = [
                'siswa_id' => $request->idsiswa,
                'pesan' => $request->pesan
            ];
        }
        $cek = RaportTambahanSiswa::where('siswa_id', $request->idsiswa)->get();
        if (count($cek) > 0) {
            RaportTambahanSiswa::where('id', $cek[0]->id)->update($data);
        } else {
            RaportTambahanSiswa::create($data);
        }
        return redirect('/siswa/raport4/' . $request->idsiswa)->with('success', "Nilai berhasil ditambah!");
    }

    public function raport4_nilai_ekstra(Request $request)
    {
        $data = [
            'siswa_id' => $request->idsiswa,
            'ekstra_id' => $request->idekstra,
            'nilai' => $request->nilaiekstra,
        ];
        $cek = RaportEkstraSiswa::where('siswa_id', $request->idsiswa)->where('ekstra_id', $request->idekstra)->get();
        if (count($cek) > 0) {
            RaportEkstraSiswa::where('id', $cek[0]->id)->update($data);
        } else {
            RaportEkstraSiswa::create($data);
        }
        return redirect('/siswa/raport4/' . $request->idsiswa)->with('success', "Nilai ekstra berhasil ditambah!");
    }

    // End Penilaian Raport

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
