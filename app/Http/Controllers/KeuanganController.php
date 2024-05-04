<?php

namespace App\Http\Controllers;

use App\Models\Administrasi;
use App\Models\AdministrasiMasuk;
use App\Models\AdministrasiPembayaran;
use App\Models\AdministrasiPerubahan;
use App\Models\Bulan;
use App\Models\Kelas;
use App\Models\Laporan;
use App\Models\MasukKelas;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\SppMasuk;
use App\Models\SppPerubahan;
use App\Models\SppSiswa;
use App\Models\Tabungan;
use App\Models\Tendik;

use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function administrasi($tingkat)
    {
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);
        $administrasi = Administrasi::where('tingkat', $tingkat)->get();
        $totalAdministrasi = Administrasi::where('tingkat', $tingkat)->sum('biaya');
        return view('app.keuangan.administrasi', [
            'user' => $dataTendik[0],
            'tingkat' => $tingkat,
            'administrasi' => $administrasi,
            'total' => $totalAdministrasi
        ]);
    }

    public function tambah_administrasi(Request $request)
    {
        $biaya = preg_replace("/[^0-9]/", "", $request->rupiah);
        $data = [
            'tingkat' => $request->tingkat,
            'uraian' => $request->uraian,
            'biaya' => $biaya
        ];
        Administrasi::create($data);
        $idadm = Administrasi::orderBy('id', 'desc')->limit(1)->get();
        $siswa = Siswa::where('tingkat', $request->tingkat)->get();
        foreach ($siswa as $s) {
            $data2 = [
                'siswa_id' => $s->id,
                'administrasi_id' => $idadm[0]->id
            ];
            AdministrasiMasuk::create($data2);
        }
        return redirect('/keuangan/administrasi/' . $request->tingkat)->with('success', 'Biaya administrasi berhasil ditambah!');
    }

    public function ubah_administrasi(Request $request)
    {
        $biaya = preg_replace("/[^0-9]/", "", $request->rupiahubah);
        $data = [
            'tingkat' => $request->tingkat,
            'uraian' => $request->uraian1,
            'biaya' => $biaya
        ];
        Administrasi::where('id', $request->idubah)->update($data);
        return redirect('/keuangan/administrasi/' . $request->tingkat)->with('success', 'Biaya administrasi berhasil diubah!');
    }

    public function hapus_administrasi(Request $request)
    {
        $data_siswa = AdministrasiMasuk::where('administrasi_id', $request->idhapus)->get();
        foreach ($data_siswa as $ds) {
            AdministrasiMasuk::destroy($ds['id']);
        }
        Administrasi::destroy($request->idhapus);
        return redirect('/keuangan/administrasi/' . $request->tingkat)->with('success', 'Biaya administrasi berhasil diubah!');
    }

    public function adm_info($idkelas)
    {
        $search = request('cari_siswa');
        if ($idkelas == 'all') {
            $kelas_aktif = 'Semua siswa';
            $kelas_aktif_id = 'all';
            if ($search) {
                $siswa = Siswa::where('nama', 'like', '%' . $search . '%')
                    ->orWhere('tingkat', 'like', '%' . $search . '%')
                    ->orderBy('nama', 'asc')
                    ->get();
            } else {
                $siswa = Siswa::orderBy('nama', 'asc')->get();
            }
        } else {
            $aktif = Kelas::where('id', $idkelas)->get();
            $kelas_aktif = $aktif[0]->kelas;
            $kelas_aktif_id = $aktif[0]->id;
            if ($search) {
                $siswa = Siswa::siswa_kelas_cari($idkelas, $search);
            } else {
                $siswa = Siswa::siswa_kelas($idkelas);
            }
        }
        $kelas = Kelas::orderBy('tingkat', 'desc')->get();
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);
        $administrasi_siswa = AdministrasiMasuk::administrasi_siswa();
        $penambahan = AdministrasiPerubahan::whereNotNull('tambah')->get();
        $pengurangan = AdministrasiPerubahan::whereNotNull('kurang')->get();
        $perubahan = AdministrasiPerubahan::perubahan_administrasi();
        return view('app.keuangan.administrasi_info', [
            'user' => $dataTendik[0],
            'kelas' => $kelas,
            'kelas_aktif' => $kelas_aktif,
            'kelas_aktif_id' => $kelas_aktif_id,
            'siswa' => $siswa,
            'administrasi_siswa' => $administrasi_siswa,
            'penambahan' => $penambahan,
            'pengurangan' => $pengurangan,
            'perubahan' => $perubahan
        ]);
    }

    public function adm_info_tambah(Request $request)
    {
        $biaya = preg_replace("/[^0-9]/", "", $request->rupiah);
        $data = [
            'siswa_id' => $request->idsiswa,
            'keterangan' => $request->uraian,
            'tambah' => $biaya
        ];
        AdministrasiPerubahan::create($data);
        $kelas = MasukKelas::where('siswa_id', $request->idsiswa)->get();
        if (count($kelas) > 0) {

            return redirect('/keuangan/info_adm/' . $kelas[0]->kela_id)->with('success', 'Biaya administrasi berhasil ditambah!');
        } else {
            return redirect('/keuangan/info_adm/' . 'all')->with('success', 'Biaya administrasi berhasil ditambah!');
        }
    }

    public function adm_info_kurang(Request $request)
    {
        $biaya = preg_replace("/[^0-9]/", "", $request->rupiah);
        $data = [
            'siswa_id' => $request->idsiswa,
            'keterangan' => $request->uraian,
            'kurang' => $biaya
        ];
        AdministrasiPerubahan::create($data);
        $kelas = MasukKelas::where('siswa_id', $request->idsiswa)->get();
        if (count($kelas) > 0) {

            return redirect('/keuangan/info_adm/' . $kelas[0]->kela_id)->with('success', 'Biaya administrasi berhasil kurangi!');
        } else {
            return redirect('/keuangan/info_adm/' . 'all')->with('success', 'Biaya administrasi berhasil kurangi!');
        }
    }

    public function adm_info_hapus(Request $request)
    {
        AdministrasiPerubahan::destroy($request->idperubahan);
    }

    public function adm_pembayaran($idtendik)
    {
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);
        $search = request('cari_siswa');
        if ($idtendik == 'all') {
            $kelas_aktif = 'Semua siswa';
            $kelas_aktif_id = 'all';
            if ($search) {
                $siswa = Siswa::where('nama', 'like', '%' . $search . '%')
                    ->orWhere('tingkat', 'like', '%' . $search . '%')
                    ->orderBy('nama', 'asc')
                    ->get();
            } else {
                $siswa = Siswa::orderBy('nama', 'asc')->get();
            }
        } else {
            $data_kelas = Kelas::where('tendik_id', $idtendik)->get();
            if (count($data_kelas) < 1) {
                return view('app.siswa.kelas_kosong', [
                    'user' => $dataTendik[0]
                ]);
            }
            $idkelas = $data_kelas[0]->id;
            $aktif = Kelas::where('id', $idkelas)->get();
            $kelas_aktif = $aktif[0]->kelas;
            $kelas_aktif_id = $aktif[0]->tendik->id;
            if ($search) {
                $siswa = Siswa::siswa_kelas_cari($idkelas, $search);
            } else {
                $siswa = Siswa::siswa_kelas($idkelas);
            }
        }
        $administrasi_terbayar = AdministrasiPembayaran::total_administrasi_terbayar();
        $kelas = Kelas::orderBy('tingkat', 'desc')->get();

        $administrasi_siswa = AdministrasiMasuk::administrasi_siswa();
        $perubahan = AdministrasiPerubahan::perubahan_administrasi();
        return view('app.keuangan.administrasi_pembayaran', [
            'user' => $dataTendik[0],
            'kelas' => $kelas,
            'kelas_aktif' => $kelas_aktif,
            'kelas_aktif_id' => $kelas_aktif_id,
            'siswa' => $siswa,
            'administrasi_siswa' => $administrasi_siswa,
            'perubahan' => $perubahan,
            'administrasi_terbayar' => $administrasi_terbayar
        ]);
    }

    public function adm_pembayaran_bayar(Request $request)
    {
        $biaya = preg_replace("/[^0-9]/", "", $request->rupiah1);
        $data = [
            'siswa_id' => $request->idsiswa,
            'nominal' => $biaya,
            'catatan' => $request->catatan
        ];
        AdministrasiPembayaran::create($data);
        if (auth()->user()->id_role == 3) {
            return redirect('/siswa/administrasi/' . $request->idkelasaktif)->with('success', 'Biaya administrasi berhasil ditambah!');
        } else {
            return redirect('/keuangan/pembayaran_adm/' . $request->idkelasaktif)->with('success', 'Biaya administrasi berhasil ditambah!');
        }
    }

    public function adm_pembayaran_siswa($idsiswa)
    {
        if (auth()->user()->id_user != $idsiswa and auth()->user()->id_role == 6) {
            abort('404');
        }
        $siswa = Siswa::where('id', $idsiswa)->get();
        $administrasi_siswa_detail = AdministrasiPembayaran::where('siswa_id', $idsiswa)->get();
        $administrasi_siswa = AdministrasiMasuk::administrasi_siswa();
        $administrasi_terbayar = AdministrasiPembayaran::total_administrasi_terbayar();
        $perubahan = AdministrasiPerubahan::perubahan_administrasi();
        $username = auth()->user()->username;
        if (auth()->user()->id_role == 6) {
            $dataTendik = Siswa::where('id', auth()->user()->id_user)->get();
        } else {
            $dataTendik = Tendik::datatendik($username);
        }
        return view('app.keuangan.administrasi_siswa', [
            'user' => $dataTendik[0],
            'siswa' => $siswa[0],
            'administrasi_siswa' => $administrasi_siswa,
            'administrasi_siswa_detail' => $administrasi_siswa_detail,
            'perubahan' => $perubahan,
            'administrasi_terbayar' => $administrasi_terbayar
        ]);
    }

    public function adm_pembayaran_siswa_hapus(Request $request)
    {
        AdministrasiPembayaran::destroy($request->idpembayaran);
        if (auth()->user()->id_role == 3) {
            return redirect('/siswa/administrasi/siswa/' . $request->idsiswa)->with('success', 'Biaya administrasi telah dihapus!');
        } else {
            return redirect('/keuangan/pembayaran_adm/siswa/' . $request->idsiswa)->with('success', 'Biaya administrasi telah dihapus!');
        }
    }

    public function spp($tingkat)
    {
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);
        $spp = Spp::where('tingkat', $tingkat)->get();
        $penambahan = SppPerubahan::whereNotNull('tambah')->get();
        $pengurangan = SppPerubahan::whereNotNull('kurang')->get();
        return view('app.keuangan.spp', [
            'user' => $dataTendik[0],
            'tingkat' => $tingkat,
            'spp' => $spp[0],
            'penambahan' => $penambahan,
            'pengurangan' => $pengurangan,
        ]);
    }

    // SPP
    public function ubah_spp(Request $request)
    {
        $biaya = preg_replace("/[^0-9]/", "", $request->rupiahubah);
        $data = [
            'biaya' => $biaya
        ];
        Spp::where('tingkat', $request->tingkat)->update($data);
        return redirect('/keuangan/spp/' . $request->tingkat)->with('success', 'SPP berhasil diubah!');
    }

    public function tambah_spp(Request $request)
    {
        $biaya = preg_replace("/[^0-9]/", "", $request->rupiah);
        $data = [
            'uraian' => $request->uraian,
            'tambah' => $biaya
        ];
        SppPerubahan::create($data);
        return redirect('/keuangan/spp/' . $request->tingkat)->with('success', 'Daftar penambahan SPP berhasil!');
    }

    public function kurang_spp(Request $request)
    {
        $biaya = preg_replace("/[^0-9]/", "", $request->rupiah1);
        $data = [
            'uraian' => $request->uraian,
            'kurang' => $biaya
        ];
        SppPerubahan::create($data);
        return redirect('/keuangan/spp/' . $request->tingkat)->with('success', 'Daftar pengurangan SPP berhasil!');
    }

    public function hapus_spp(Request $request)
    {
        SppPerubahan::destroy($request->idubah);
        return redirect('/keuangan/spp/' . $request->tingkat)->with('success', 'Daftar perubahan SPP telah dihapus!');
    }

    public function info_spp($idkelas)
    {
        $search = request('cari_siswa');
        if ($idkelas == 'all') {
            $kelas_aktif = 'Semua siswa';
            $kelas_aktif_id = 'all';
            if ($search) {
                $siswa = Siswa::where('nama', 'like', '%' . $search . '%')
                    ->orWhere('tingkat', 'like', '%' . $search . '%')
                    ->orderBy('nama', 'asc')
                    ->get();
            } else {
                $siswa = Siswa::orderBy('nama', 'asc')->get();
            }
        } else {
            $aktif = Kelas::where('id', $idkelas)->get();
            $kelas_aktif = $aktif[0]->kelas;
            $kelas_aktif_id = $aktif[0]->id;
            if ($search) {
                $siswa = Siswa::siswa_kelas_cari($idkelas, $search);
            } else {
                $siswa = Siswa::siswa_kelas($idkelas);
            }
        }
        $kelas = Kelas::orderBy('tingkat', 'desc')->get();
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);
        $penambahan = SppPerubahan::whereNotNull('tambah')->get();
        $pengurangan = SppPerubahan::whereNotNull('kurang')->get();
        $spp = Spp::orderBy('id', 'asc')->get();
        $perubahan = SppMasuk::spp_perubahan();
        return view('app.keuangan.spp_info', [
            'user' => $dataTendik[0],
            'kelas' => $kelas,
            'kelas_aktif' => $kelas_aktif,
            'kelas_aktif_id' => $kelas_aktif_id,
            'siswa' => $siswa,
            'penambahan' => $penambahan,
            'pengurangan' => $pengurangan,
            'spp' => $spp,
            'perubahan' => $perubahan
        ]);
    }

    public function info_spp_perubahan(Request $request)
    {
        $cek = SppMasuk::where('siswa_id', $request->idsiswa)
            ->where('spp_id', $request->idspp)->get();
        if (count($cek) > 0) {
            SppMasuk::destroy($cek);
        } else {
            $data = [
                'siswa_id' => $request->idsiswa,
                'spp_id' => $request->idspp
            ];
            SppMasuk::create($data);
        }
    }

    public function pembayaran_spp($idtendik)
    {
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);
        $search = request('cari_siswa');
        if ($idtendik == 'all') {
            $kelas_aktif = 'Semua siswa';
            $kelas_aktif_id = 'all';
            if ($search) {
                $siswa = Siswa::where('nama', 'like', '%' . $search . '%')
                    ->orWhere('tingkat', 'like', '%' . $search . '%')
                    ->orderBy('nama', 'asc')
                    ->get();
            } else {
                $siswa = Siswa::orderBy('nama', 'asc')->get();
            }
        } else {
            $data_kelas = Kelas::where('tendik_id', $idtendik)->get();
            if (count($data_kelas) < 1) {
                return view('app.siswa.kelas_kosong', [
                    'user' => $dataTendik[0]
                ]);
            }
            $idkelas = $data_kelas[0]->id;
            $aktif = Kelas::where('id', $idkelas)->get();
            $kelas_aktif = $aktif[0]->kelas;
            $kelas_aktif_id = $aktif[0]->tendik->id;
            if ($search) {
                $siswa = Siswa::siswa_kelas_cari($idkelas, $search);
            } else {
                $siswa = Siswa::siswa_kelas($idkelas);
            }
        }
        $spp_terbayar = SppSiswa::spp_terbayar();
        $spp_terbayar_akhir = SppSiswa::spp_terbayar_akhir();
        $kelas = Kelas::orderBy('tingkat', 'desc')->get();

        $spp_siswa = Spp::all();
        $perubahan = SppMasuk::spp_perubahan();
        $bulan = Bulan::orderBy('id', 'asc')->get();
        return view('app.keuangan.spp_pembayaran', [
            'user' => $dataTendik[0],
            'kelas' => $kelas,
            'kelas_aktif' => $kelas_aktif,
            'kelas_aktif_id' => $kelas_aktif_id,
            'siswa' => $siswa,
            'spp_siswa' => $spp_siswa,
            'perubahan' => $perubahan,
            'spp_terbayar' => $spp_terbayar,
            'spp_terbayar_akhir' => $spp_terbayar_akhir,
            'bulan' => $bulan
        ]);
    }

    public function pembayaran_spp_bayar(Request $request)
    {
        $biaya = preg_replace("/[^0-9]/", "", $request->nominal);
        $data = [
            'siswa_id' => $request->idsiswa,
            'bulan_id' => $request->bulan,
            'nominal' => $biaya,
            'uraian' => $request->catatan,
        ];
        SppSiswa::create($data);
        if (auth()->user()->id_role == 3) {
            return redirect('/siswa/spp/' . $request->idkelasaktif)->with('success', 'Pembayaran SPP siswa berhasil ditambah!');
        } else {
            return redirect('/keuangan/pembayaran_spp/' . $request->idkelasaktif)->with('success', 'Pembayaran SPP siswa berhasil ditambah!');
        }
    }

    public function pembayaran_spp_siswa($idsiswa)
    {
        if (auth()->user()->id_user != $idsiswa and auth()->user()->id_role == 6) {
            abort('404');
        }
        $siswa = Siswa::where('id', $idsiswa)->get();
        $spp_siswa = Spp::where('tingkat', $siswa[0]->tingkat)->get();
        $cek_akhir = SppSiswa::spp_terbayar_akhir_siswa($idsiswa);
        if (count($cek_akhir) > 0) {
            $spp_terbayar_akhir = $cek_akhir[0];
        } else {
            $spp_terbayar_akhir = (object)[
                'bulan' => null,
            ];
        }
        $spp_siswa_detail = SppSiswa::where('siswa_id', $idsiswa)->get();
        $perubahan = SppMasuk::spp_perubahan();
        $username = auth()->user()->username;
        if (auth()->user()->id_role == 6) {
            $dataTendik = Siswa::where('id', auth()->user()->id_user)->get();
        } else {
            $dataTendik = Tendik::datatendik($username);
        }
        return view('app.keuangan.spp_siswa', [
            'user' => $dataTendik[0],
            'siswa' => $siswa[0],
            'spp_siswa' => $spp_siswa[0],
            'spp_siswa_detail' => $spp_siswa_detail,
            'perubahan' => $perubahan,
            'spp_terbayar_akhir' => $spp_terbayar_akhir
        ]);
    }

    public function pembayaran_spp_siswa_hapus(Request $request)
    {
        SppSiswa::destroy($request->idpembayaran);
        if (auth()->user()->id_role == 3) {
            return redirect('/siswa/spp/siswa/' . $request->idsiswa)->with('success', 'Biaya spp telah dihapus!');
        } else {
            return redirect('/keuangan/pembayaran_spp/siswa/' . $request->idsiswa)->with('success', 'Biaya spp telah dihapus!');
        }
    }
    // End SPP

    // Laporan
    public function laporan($tingkat, $ket)
    {
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);
        $cek_spp = SppSiswa::total_spp($tingkat);
        $cek_administrasi = AdministrasiPembayaran::total_administrasi($tingkat);
        $spp = 0;
        $administrasi = 0;
        $total_masuk = 0;
        $total_keluar = 0;
        if ($cek_spp) {
            $spp = $cek_spp[0]->nominal;
        }
        if ($cek_administrasi) {
            $administrasi = $cek_administrasi[0]->nominal;
        }
        $search = request('cari_laporan');
        if ($search) {
            $laporan_masuk = Laporan::whereNotNull('masuk')
                ->where('tingkat', $tingkat)
                ->where('jenis', 'like', '%' . $search . '%')
                ->orWhere('created_at', 'like', '%' . $search . '%')
                ->get();
            $laporan_keluar = Laporan::whereNotNull('keluar')
                ->where('tingkat', $tingkat)
                ->where('jenis', 'like', '%' . $search . '%')
                ->orWhere('created_at', 'like', '%' . $search . '%')
                ->get();
        } else {
            $laporan_masuk = Laporan::whereNotNull('masuk')->where('tingkat', 'like', '%' . $tingkat . '%')->get();
            $laporan_keluar = Laporan::whereNotNull('keluar')->where('tingkat', 'like', '%' . $tingkat . '%')->get();
        }
        $cek_total_masuk = Laporan::total_masuk($tingkat);
        if ($cek_total_masuk) {
            $total_masuk = $cek_total_masuk[0]->masuk;
        }
        $cek_total_keluar = Laporan::total_keluar($tingkat);
        if ($cek_total_keluar) {
            $total_keluar = $cek_total_keluar[0]->keluar;
        }
        return view('app.keuangan.laporan', [
            'user' => $dataTendik[0],
            'spp' => $spp,
            'administrasi' => $administrasi,
            'laporan_masuk' => $laporan_masuk,
            'laporan_keluar' => $laporan_keluar,
            'total_masuk' => $total_masuk,
            'total_keluar' => $total_keluar,
            'tingkat' => $tingkat,
            'ket' => $ket,
        ]);
    }

    public function laporan_masuk(Request $request)
    {
        $biaya = preg_replace("/[^0-9]/", "", $request->rupiah);
        $data = [
            'tingkat' => $request->tingkat,
            'jenis' => $request->jenis,
            'masuk' => $biaya,
            'keterangan' => $request->keterangan
        ];
        Laporan::create($data);
        return redirect('/keuangan/laporan/' . $request->tingkat . '/in')->with('success', 'Pemasukan berhasil ditambah!');
    }

    public function laporan_keluar(Request $request)
    {
        $biaya = preg_replace("/[^0-9]/", "", $request->rupiah1);
        $data = [
            'tingkat' => $request->tingkat,
            'jenis' => $request->jenis,
            'keluar' => $biaya,
            'keterangan' => $request->keterangan
        ];
        Laporan::create($data);
        return redirect('/keuangan/laporan/' . $request->tingkat . '/out')->with('success', 'Pengeluaran berhasil ditambah!');
    }

    public function laporan_perubahan(Request $request)
    {
        $biaya = preg_replace("/[^0-9]/", "", $request->rupiahubah);
        if ($request->ket == 'in') {
            $data = [
                'jenis' => $request->jenis,
                'masuk' => $biaya,
                'keterangan' => $request->keterangan
            ];
        } else {
            $data = [
                'jenis' => $request->jenis,
                'keluar' => $biaya,
                'keterangan' => $request->keterangan
            ];
        }
        Laporan::where('id', $request->idlaporan)->update($data);
        return redirect('/keuangan/laporan/' . $request->tingkat . '/' . $request->ket)->with('success', 'Perubahan berhasil!');
    }

    public function laporan_hapus(Request $request)
    {
        Laporan::destroy($request->idlaporan);
        return redirect('/keuangan/laporan/' . $request->tingkat . '/' . $request->ket)->with('success', 'Data keuangan berhasil dihapus!');
    }
    // End Laporan

    // Tabungan
    public function tabungan($idtendik)
    {
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);
        $search = request('cari_siswa');
        if ($idtendik == 'all') {
            $kelas_aktif = 'Semua siswa';
            $idkelas = 'all';
            $kelas_aktif_id = 'all';
            if ($search) {
                $siswa = Siswa::where('nama', 'like', '%' . $search . '%')
                    ->orWhere('tingkat', 'like', '%' . $search . '%')
                    ->orderBy('nama', 'asc')
                    ->get();
            } else {
                $siswa = Siswa::orderBy('nama', 'asc')->get();
            }
        } else {
            $data_kelas = Kelas::where('tendik_id', $idtendik)->get();
            if (count($data_kelas) < 1) {
                return view('app.siswa.kelas_kosong', [
                    'user' => $dataTendik[0]
                ]);
            }
            $idkelas = $data_kelas[0]->id;
            $aktif = Kelas::where('id', $idkelas)->get();
            $kelas_aktif = $aktif[0]->kelas;
            $kelas_aktif_id = $aktif[0]->tendik->id;
            if ($search) {
                $siswa = Siswa::siswa_kelas_cari($idkelas, $search);
            } else {
                $siswa = Siswa::siswa_kelas($idkelas);
            }
        }
        $kelas = Kelas::orderBy('tingkat', 'desc')->get();

        $tabungan = Tabungan::total_tabungan();
        $jumlah_tabungan = Tabungan::jumlah_tabungan($idkelas);
        return view('app.keuangan.tabungan', [
            'user' => $dataTendik[0],
            'kelas' => $kelas,
            'kelas_aktif' => $kelas_aktif,
            'kelas_aktif_id' => $kelas_aktif_id,
            'siswa' => $siswa,
            'tabungan' => $tabungan,
            'jumlah_tabungan' => $jumlah_tabungan
        ]);
    }

    public function tabungan_masuk(Request $request)
    {
        $biaya = preg_replace("/[^0-9]/", "", $request->rupiah);
        $data = [
            'siswa_id' => $request->idsiswa,
            'menabung' => $biaya,
            'catatan' => $request->catatan
        ];
        Tabungan::create($data);
        if (auth()->user()->id_role == 3) {
            return redirect('/siswa/tabungan/' . $request->idkelas)->with('success', 'Tabungan siswa berhasil ditambah!');
        } else {
            return redirect('/keuangan/tabungan/' . $request->idkelas)->with('success', 'Tabungan siswa berhasil ditambah!');
        }
    }

    public function tabungan_penarikan(Request $request)
    {
        $biaya = preg_replace("/[^0-9]/", "", $request->rupiah);
        $data = [
            'siswa_id' => $request->idsiswapenarikan,
            'penarikan' => $biaya,
            'catatan' => $request->catatan
        ];
        Tabungan::create($data);
        if (auth()->user()->id_role == 3) {
            return redirect('/siswa/tabungan/' . $request->idkelas)->with('success', 'Penarikan tabungan siswa berhasil ditambah!');
        } else {
            return redirect('/keuangan/tabungan/' . $request->idkelas)->with('success', 'Penarikan tabungan siswa berhasil ditambah!');
        }
    }
    public function tabungan_perubahan(Request $request)
    {
        $cek = Tabungan::where('created_at', 'like', '%' . $request->update_at . '%')
            ->where('siswa_id', $request->idsiswaperubahan)
            ->get();
        if (count($cek) > 0) {

            $biaya = preg_replace("/[^0-9]/", "", $request->rupiah);
            $data = [
                'siswa_id' => $request->idsiswaperubahan,
                'menabung' => $biaya,
                'catatan' => $request->catatan
            ];
            Tabungan::where('id', $cek[0]->id)->update($data);
            if (auth()->user()->id_role == 3) {
                return redirect('/siswa/tabungan/' . $request->idkelas)->with('success', 'Perubahan tabungan siswa berhasil ditambah!');
            } else {
                return redirect('/keuangan/tabungan/' . $request->idkelas)->with('success', 'Perubahan tabungan siswa berhasil ditambah!');
            }
        }
        if (auth()->user()->id_role == 3) {
            return redirect('/siswa/tabungan/' . $request->idkelas)->with('success', 'Tidak ada tabungan ditanggal tersebut!');
        } else {
            return redirect('/keuangan/tabungan/' . $request->idkelas)->with('success', 'Tidak ada tabungan ditanggal tersebut!');
        }
    }

    public function tabungan_siswa($idsiswa)
    {
        if (auth()->user()->id_user != $idsiswa and auth()->user()->id_role == 6) {
            abort('404');
        }

        $search = request('cari_tabungan');
        if ($search) {
            $info_tabungan = Tabungan::where('siswa_id', $idsiswa)
                ->where('created_at', 'like', '%' . $search . '%')
                ->orWhere('updated_at', 'like', '%' . $search . '%')
                ->get();
        } else {
            $info_tabungan = Tabungan::where('siswa_id', $idsiswa)->get();
        }
        $username = auth()->user()->username;
        if (auth()->user()->id_role == 6) {
            $dataTendik = Siswa::where('id', auth()->user()->id_user)->get();
        } else {
            $dataTendik = Tendik::datatendik($username);
        }
        $siswa = Siswa::where('id', $idsiswa)->get();

        $cek = Tabungan::total_tabungan_siswa($idsiswa);
        if (count($cek) > 0) {
            $total_tabungan_siswa = $cek[0];
        } else {
            $total_tabungan_siswa = null;
        }
        return view('app.keuangan.tabungan_siswa', [
            'user' => $dataTendik[0],
            'siswa' => $siswa[0],
            'info_tabungan' => $info_tabungan,
            'total_tabungan_siswa' => $total_tabungan_siswa
        ]);
    }

    // End Tabungan



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
