<?php

namespace App\Http\Controllers;

use App\Models\Administrasi;
use App\Models\AdministrasiMasuk;
use App\Models\AdministrasiPembayaran;
use App\Models\AdministrasiPerubahan;
use App\Models\Bank;
use App\Models\Fisik;
use App\Models\IdSiswa;
use App\Models\Sekolah;
use App\Models\Yayasan;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Role;
use App\Models\MasukKelas;
use App\Models\RaportCapaianSiswa;
use App\Models\RaportCapaianSiswa1;
use App\Models\RaportDoaSiswa;
use App\Models\RaportEkstraSiswa;
use App\Models\RaportSurahSiswa;
use App\Models\RaportTambahanSiswa;
use App\Models\SppSiswa;
use App\Models\Tabungan;
use App\Models\Tendik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function profile()
    {
        if (auth()->user()->id_role == 6) {
            $dataUser = Siswa::where('id', auth()->user()->id_user)->get();
        } else {
            $dataUser = Tendik::where('id', auth()->user()->id_user)->get();
        }
        return view('app.profile', [
            'user' => $dataUser[0]
        ]);
    }

    public function ubah_pass()
    {
        if (auth()->user()->id_role == 6) {
            $dataUser = Siswa::where('id', auth()->user()->id_user)->get();
        } else {
            $dataUser = Tendik::where('id', auth()->user()->id_user)->get();
        }
        $akunUser = User::where('id_user', auth()->user()->id_user)
            ->where('id_role', auth()->user()->id_role)
            ->get();

        return view('app.ubah_pass', [
            'user' => $dataUser[0],
            'akun' => $akunUser[0],
        ]);
    }

    public function ubah_password(Request $request)
    {
        if ($request->password) {

            // Validasi data yang masuk
            $this->validate($request, [
                'username' => 'required',
                'password' => 'required',
            ]);

            // Update data pengguna
            $data = [
                'username' => $request->username,
                'password' => bcrypt($request->password),
            ];

            User::where('id', $request->iduser)->update($data);

            // Cek autentikasi
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                $request->session()->regenerate();
                return redirect('/ubah_pass')->with('success', 'Username dan password berhasil diperbarui!');
            }
        } else {
            $data = [
                'username' => $request->username
            ];
            User::where('id', $request->iduser)->update($data);

            return redirect('/ubah_pass')->with('success', 'Username berhasil diperbarui!');
        }
    }

    public function ubah_foto_profile(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'tempat' => $request->tempat,
            'lahir' => $request->lahir,
            'alamat' => $request->alamat
        ];
        if (auth()->user()->id_role != 6) {
            $data['deskripsi'] = $request->deskripsi;
        }
        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('user-images');
        }
        if ($request->file('ttd')) {
            $data['ttd'] = $request->file('ttd')->store('user-ttds');
        }
        if (auth()->user()->id_role == 6) {
            Siswa::where('id', $request->iduser)->update($data);
        } else {
            Tendik::where('id', $request->iduser)->update($data);
        }
        return redirect('/profile')->with('success', 'Data diri berhasil diubah!');
    }

    //  Sekolah
    public function index($lembaga)
    {
        if ($lembaga == 'sekolah') {
            $sekolah = Sekolah::first();
        } else {
            $sekolah = Yayasan::first();
        }
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);
        return view('app.admin.sekolah', [
            'sekolah' => $sekolah,
            'user' => $dataTendik[0],
            'lembaga' => $lembaga
        ]);
    }

    public function hapus_siswa($tahun)
    {
        if ($tahun == 'all') {
            $siswa = Siswa::where('status', 2)
                ->orderBy('tingkat', 'desc')
                ->orderBy('nama', 'asc')
                ->get();
        } else {
            $siswa = Siswa::whereYear('updated_at', '=', $tahun)
                ->where('status', 2)
                ->orderBy('tingkat', 'desc')
                ->orderBy('nama', 'asc')
                ->get();
        }

        foreach ($siswa as $s) {
            $foto_raport = RaportCapaianSiswa::where('siswa_id', $s->id)->get();
            if (count($foto_raport) > 0) {
                if ($foto_raport[0]->image1 != null) {
                    Storage::delete($foto_raport[0]->image1);
                }
                if ($foto_raport[0]->image2 != null) {
                    Storage::delete($foto_raport[0]->image2);
                }
            }
            AdministrasiMasuk::where('siswa_id', $s->id)->delete();
            AdministrasiPembayaran::where('siswa_id', $s->id)->delete();
            AdministrasiPerubahan::where('siswa_id', $s->id)->delete();
            Fisik::where('siswa_id', $s->id)->delete();
            MasukKelas::where('siswa_id', $s->id)->delete();
            RaportCapaianSiswa::where('siswa_id', $s->id)->delete();
            RaportCapaianSiswa1::where('siswa_id', $s->id)->delete();
            RaportDoaSiswa::where('siswa_id', $s->id)->delete();
            RaportSurahSiswa::where('siswa_id', $s->id)->delete();
            RaportEkstraSiswa::where('siswa_id', $s->id)->delete();
            RaportTambahanSiswa::where('siswa_id', $s->id)->delete();
            SppSiswa::where('siswa_id', $s->id)->delete();
            Tabungan::where('siswa_id', $s->id)->delete();
            User::where('id_user', $s->id)->where('id_role', 6)->delete();
            Siswa::where('id', $s->id)->delete();
        }
        return redirect('/dashboard/daftar_lulus/' . $tahun)->with('success', 'Siswa berhasil dihapus!');
    }

    public function update_lembaga(Request $request)
    {
        if ($request->file('image')) {
            Storage::delete($request->old_image);
            $data = [
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'logo' => $request->file('image')->store('post-images'),
                'desa' => $request->desa,
                'kecamatan' => $request->kecamatan,
                'kabupaten' => $request->kabupaten,
                'provinsi' => $request->provinsi,
                'rtrw' => $request->rtrw,
                'dusun' => $request->dusun,
                'kode_pos' => $request->kode_pos,
                'telepon' => $request->telepon,
                'fax' => $request->fax,
                'email' => $request->email
            ];
        } else {
            $data = [
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'desa' => $request->desa,
                'kecamatan' => $request->kecamatan,
                'kabupaten' => $request->kabupaten,
                'provinsi' => $request->provinsi,
                'rtrw' => $request->rtrw,
                'dusun' => $request->dusun,
                'kode_pos' => $request->kode_pos,
                'telepon' => $request->telepon,
                'fax' => $request->fax,
                'email' => $request->email
            ];
        }

        if ($request->lembaga == 'sekolah') {
            Sekolah::where('id', $request->id)->update($data);
        } elseif ($request->lembaga == 'yayasan') {
            Yayasan::where('id', $request->id)->update($data);
        }
        return redirect('/dashboard/lembaga/' . $request->lembaga)->with('success', 'Post has been updated');
    }
    // End Sekolah

    // Peserta Didik
    public function pd()
    {
        $search = request('cari_siswa');
        if ($search) {
            $siswa = Siswa::where('status', 1)
                ->where('nama', 'like', '%' . $search . '%')
                ->orWhere('tingkat', 'like', '%' . $search . '%')
                ->orWhere('jk', 'like', '%' . $search . '%')
                ->orWhere('lahir', 'like', '%' . $search . '%')
                ->orWhere('tempat', 'like', '%' . $search . '%')
                ->orderBy('nama', 'asc')
                ->get();
        } else {
            $siswa = Siswa::where('status', 1)->orderBy('nama', 'asc')->get();
        }
        $id_siswa = IdSiswa::all();
        $siswa_baru_limit = Siswa::siswa_baru_limit();
        $siswa_baru = Siswa::where('status', 0)->orderBy('created_at', 'desc')->get();
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);
        return view('app.admin.pd', [
            'siswa' => $siswa,
            'siswa_baru' => $siswa_baru,
            'siswa_baru_limit' => $siswa_baru_limit,
            'id_siswa' => $id_siswa,
            'user' => $dataTendik[0]
        ]);
    }

    public function detail($id)
    {
        $siswa = Siswa::where('id', $id)->get();
        $siswa_baru_limit = Siswa::siswa_baru_limit();
        $siswa_baru = Siswa::where('status', 0)->orderBy('created_at', 'desc')->get();
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);
        return view('app.admin.pddetail', [
            'siswa' => $siswa[0],
            'siswa_baru' => $siswa_baru,
            'siswa_baru_limit' => $siswa_baru_limit,
            'user' => $dataTendik[0]
        ]);
    }

    public function ubah($id)
    {
        $siswa = Siswa::where('id', $id)->get();
        $siswa_baru_limit = Siswa::siswa_baru_limit();
        $siswa_baru = Siswa::where('status', 0)->orderBy('created_at', 'desc')->get();
        $username = auth()->user()->username;
        if (auth()->user()->id_role == 6) {
            $dataTendik = Siswa::where('id', $id)->get();
        } else {
            $dataTendik = Tendik::datatendik($username);
        }
        return view('app.admin.pdubah', [
            'siswa' => $siswa[0],
            'siswa_baru' => $siswa_baru,
            'siswa_baru_limit' => $siswa_baru_limit,
            'user' => $dataTendik[0]
        ]);
    }

    public function update_siswa(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'panggilan' => $request->panggilan,
            'jk' => $request->jk,
            'nik' => $request->nik,
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'anak_ke' => $request->anak_ke,
            'tempat' => $request->tempat,
            'lahir' => $request->lahir,
            'alamat' => $request->alamat,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
            'nama_ibu' => $request->nama_ibu,
            'pdd_ibu' => $request->pdd_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'agama_ibu' => $request->agama_ibu,
            'no_ibu' => $request->no_ibu,
            'nama_ayah' => $request->nama_ayah,
            'pdd_ayah' => $request->pdd_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'agama_ayah' => $request->agama_ayah,
            'no_ayah' => $request->no_ayah,
        ];

        $data['tingkat'] = $request->tingkat;
        $adm_sekarang = AdministrasiMasuk::where('siswa_id', $request->id_siswa)->get();
        foreach ($adm_sekarang as $as) {
            Administrasi::destroy($as->id);
        }
        $adm_baru = Administrasi::where('tingkat', $request->tingkat)->get();
        foreach ($adm_baru as $ab) {
            $data_adm = [
                'siswa_id' => $request->id_siswa,
                'administrasi_id' => $ab->id
            ];
            AdministrasiMasuk::create($data_adm);
        }

        Siswa::where('id', $request->id_siswa)->update($data);
        if (auth()->user()->id_role == 6) {
            return redirect('/siswa/datadiri/' . $request->id_siswa)->with('success', 'Data berhasil diubah');
        } else {
            return redirect('/dashboard/pd/ubah/' . $request->id_siswa)->with('success', 'Data berhasil diubah');
        }
    }

    public function unduh($idtendik)
    {
        if ($idtendik == 'all') {
            $siswa = Siswa::where('status', 1)->orderBy('nama', 'asc')->get();
            $kelas = 'admin';
        } else {
            $datakelas = Kelas::where('tendik_id', $idtendik)->get();
            $siswa = Siswa::siswa_kelas($datakelas[0]->id);
            $kelas = $datakelas[0]->kelas;
        }
        return view('unduhan.siswa', [
            'siswa' => $siswa,
            'kelas' => $kelas
        ]);
    }

    public function print($idsiswa)
    {
        $sekolah = Sekolah::first();
        $siswa = Siswa::where('id', $idsiswa)->get();
        return view('unduhan.siswa_induk', [
            'siswa' => $siswa[0],
            'sekolah' => $sekolah
        ]);
    }

    public function pd_baru()
    {
        $siswa_baru_limit = Siswa::siswa_baru_limit();
        $siswa_baru = Siswa::where('status', 0)->orderBy('created_at', 'desc')->get();
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);
        return view('app.admin.pd_baru', [
            'siswa_baru' => $siswa_baru,
            'siswa_baru_limit' => $siswa_baru_limit,
            'user' => $dataTendik[0]
        ]);
    }

    public function terima_siswa($siswa)
    {
        if ($siswa == 'all') {
            Siswa::where('status', 0)->update(['status' => '1']);
        } else {
            Siswa::where('status', 0)->where('id', $siswa)->update(['status' => '1']);
            echo 'sukses siswa';
        }
        return redirect('/dashboard/pd/baru')->with('success', 'Siswa berhasil diterima');
    }

    public function tolak_siswa(Request $request)
    {
        Siswa::destroy($request->idsiswa);
        return redirect('/dashboard/pd/baru')->with('success', 'Siswa telah ditolak dan dikeluarkan!');
    }

    public function tambah_idsiswa(Request $request)
    {
        $cekSiswa = IdSiswa::where('siswa_id', $request->idsiswa)->get();
        if (count($cekSiswa) > 0) {
            IdSiswa::destroy($cekSiswa);
        } else {
            $data = [
                'siswa_id' => $request->idsiswa,
                'created_at' => time(),
                'updated_at' => time()
            ];
            IdSiswa::create($data);
        }
    }

    public function hapus()
    {
        $id_siswa = IdSiswa::all();
        if (count($id_siswa) < 1) {
            return redirect('/dashboard/pd')->with('success', 'Pastikan pilih siswa yang ingin dihapus!');
        } else {
            foreach ($id_siswa as $s) {
                $foto_raport = RaportCapaianSiswa::where('siswa_id', $s->id)->get();
                if (count($foto_raport) > 0) {
                    if ($foto_raport[0]->image1 != null) {
                        Storage::delete($foto_raport[0]->image1);
                    }
                    if ($foto_raport[0]->image2 != null) {
                        Storage::delete($foto_raport[0]->image2);
                    }
                }
                AdministrasiMasuk::where('siswa_id', $s->id)->delete();
                AdministrasiPembayaran::where('siswa_id', $s->id)->delete();
                AdministrasiPerubahan::where('siswa_id', $s->id)->delete();
                Fisik::where('siswa_id', $s->id)->delete();
                MasukKelas::where('siswa_id', $s->id)->delete();
                RaportCapaianSiswa::where('siswa_id', $s->id)->delete();
                RaportCapaianSiswa1::where('siswa_id', $s->id)->delete();
                RaportDoaSiswa::where('siswa_id', $s->id)->delete();
                RaportSurahSiswa::where('siswa_id', $s->id)->delete();
                RaportEkstraSiswa::where('siswa_id', $s->id)->delete();
                RaportTambahanSiswa::where('siswa_id', $s->id)->delete();
                SppSiswa::where('siswa_id', $s->id)->delete();
                Tabungan::where('siswa_id', $s->id)->delete();
                User::where('id_user', $s->id)->where('id_role', 6)->delete();
                Siswa::where('id', $s->id)->delete();
                IdSiswa::destroy($s['id']);
            }

            return redirect('/dashboard/pd')->with('success', 'Siswa telah dikeluarkan!');
        }
    }

    public function lulus()
    {
        $id_siswa = IdSiswa::all();
        if (count($id_siswa) < 1) {
            return redirect('/dashboard/pd')->with('success', 'Pastikan pilih siswa yang ingin diluluskan!');
        } else {
            foreach ($id_siswa as $is) {
                $data = [
                    'status' => 2
                ];

                Siswa::where('id', $is['siswa_id'])->update($data);
                IdSiswa::destroy($is['id']);
            }
            return redirect('/dashboard/pd')->with('success', 'Siswa berhasil diluluskan!');
        }
    }

    public function daftar_lulus($tahun)
    {
        if ($tahun == 'all') {
            $search = request('cari_siswa');
            if ($search) {
                $siswa = Siswa::where('status', 2)
                    ->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('lahir', 'like', '%' . $search . '%')
                    ->orWhere('tingkat', 'like', '%' . $search . '%')
                    ->orWhere('tempat', 'like', '%' . $search . '%')
                    ->orderBy('tingkat', 'desc')
                    ->orderBy('nama', 'asc')
                    ->get();
            } else {
                $siswa = Siswa::where('status', 2)
                    ->orderBy('tingkat', 'desc')
                    ->orderBy('nama', 'asc')
                    ->get();
            }
        } else {
            $search = request('cari_siswa');
            if ($search) {
                $siswa = Siswa::whereYear('updated_at', '=', $tahun)
                    ->where('status', 2)
                    ->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('lahir', 'like', '%' . $search . '%')
                    ->orWhere('tingkat', 'like', '%' . $search . '%')
                    ->orWhere('tempat', 'like', '%' . $search . '%')
                    ->orderBy('tingkat', 'desc')
                    ->orderBy('nama', 'asc')
                    ->get();
            } else {
                $siswa = Siswa::whereYear('updated_at', '=', $tahun)
                    ->where('status', 2)
                    ->orderBy('tingkat', 'desc')
                    ->orderBy('nama', 'asc')
                    ->get();
            }
        }

        $tahun_lulus = DB::table('siswas')
            ->select(DB::raw('YEAR(updated_at) as tahun'))
            ->where('status', 2)
            ->groupBy('tahun')
            ->get();

        $id_siswa = IdSiswa::all();
        $siswa_baru_limit = Siswa::siswa_baru_limit();
        $siswa_baru = Siswa::where('status', 0)->orderBy('created_at', 'desc')->get();
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);
        return view('app.admin.daftar_lulus', [
            'siswa' => $siswa,
            'siswa_baru' => $siswa_baru,
            'siswa_baru_limit' => $siswa_baru_limit,
            'id_siswa' => $id_siswa,
            'user' => $dataTendik[0],
            'tahun_lulus' => $tahun_lulus,
            'tahun_aktif' => $tahun
        ]);
    }

    public function daftar_lulus_siswa($id_siswa)
    {
        $siswa = Siswa::where('id', $id_siswa)->get();
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);
        return view('app.admin.daftar_lulus_siswa', [
            'siswa' => $siswa[0],
            'user' => $dataTendik[0]
        ]);
    }

    public function batal_lulus($idsiswa, $tahun)
    {
        Siswa::where('id', $idsiswa)->update(['status' => 1]);
        return redirect('/dashboard/daftar_lulus/' . $tahun)->with('success', 'Siswa batal diluluskan!');
    }
    // End Peserta Didik

    // Kelas
    public function kelas()
    {
        IdSiswa::truncate();
        $search = request('cari_kelas');
        if ($search) {
            $kelas = Kelas::where('kelas', 'like', '%' . $search . '%')
                ->orWhere('ruang', 'like', '%' . $search . '%')
                ->orWhere('tingkat', 'like', '%' . $search . '%')
                ->orderBy('tingkat', 'desc')
                ->get();

            if ($kelas->isEmpty()) {
                return redirect('/dashboard/kelas')->with('success', 'Tidak ada kelas tersebut!');
            }
        } else {
            $kelas = Kelas::orderBy('tingkat', 'desc')->get();
        }
        $siswa = Siswa::whereDoesntHave('masukKelas')->where('status', 1)->get();
        $walas = Tendik::where('role', 'wali kelas')->get();
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);
        return view('app.admin.kelas', [
            'kelas' => $kelas,
            'siswa' => $siswa,
            'walas' => $walas,
            'user' => $dataTendik[0]
        ]);
    }

    public function naikkelas(Request $request)
    {
        $datakelas = MasukKelas::where('kela_id', $request->idkelas)->get();
        if (count($datakelas) > 0) {
            $datatingkat = Siswa::where('id', $datakelas[0]->siswa_id)->get();
            $tingkat = $datatingkat[0]->tingkat;
            if ($tingkat == 'kb_a' || $tingkat == 'kb_b') {
                $tingkat_baru = 'tk_a';
            } elseif ($tingkat == 'tk_a' || $tingkat == 'tk_b') {
                $tingkat_baru = 'tk_b';
            } else {
                $tingkat_baru = 'dc';
            }
            foreach ($datakelas as $d) {
                Siswa::where('id', $d->siswa_id)->update(['tingkat' => $tingkat_baru]);
                AdministrasiMasuk::where('siswa_id', $d->siswa_id)->delete();
                AdministrasiPembayaran::where('siswa_id', $d->siswa_id)->delete();
                SppSiswa::where('siswa_id', $d->siswa_id)->delete();
                $adm_baru = Administrasi::where('tingkat', $tingkat_baru)->get();
                foreach ($adm_baru as $ab) {
                    $data_adm = [
                        'siswa_id' => $d->siswa_id,
                        'administrasi_id' => $ab->id
                    ];
                    AdministrasiMasuk::create($data_adm);
                }
            }
        }

        MasukKelas::where('kela_id', $request->idkelas)->delete();
        $kelas = Kelas::where('id', $request->idkelas)->get();
        if (auth()->user()->id_role == '1' || auth()->user()->id_role == '2') {
            return redirect('/dashboard/kelas/kelas_siswa/' . $kelas[0]->tendik->id)->with('success', 'Siswa telah naik kelas!');
        } else {
            return redirect('/siswa/kelas/' . $kelas[0]->tendik->id)->with('success', 'Siswa telah naik kelas!');
        }
    }

    public function kelas_siswa($idtendik)
    {
        $data_kelas = Kelas::where('tendik_id', $idtendik)->get();
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);
        if (count($data_kelas) < 1) {
            return view('app.siswa.kelas_kosong', [
                'user' => $dataTendik[0]
            ]);
        }
        $idkelas = $data_kelas[0]->id;
        $search = request('cari_siswa');
        if ($search) {
            $siswa = Siswa::siswa_kelas_cari($idkelas, $search);
        } else {
            $siswa = Siswa::siswa_kelas($idkelas);
        }
        $siswa_baru = Siswa::whereDoesntHave('masukKelas')->where('status', 1)->get();
        $kelas = Kelas::first()->where('id', $idkelas)->get();
        return view('app.admin.kelas_siswa', [
            'kelas' => $kelas[0],
            'siswa' => $siswa,
            'siswa_baru' => $siswa_baru,
            'user' => $dataTendik[0]
        ]);
    }

    public function keluar_kelas(Request $request)
    {
        $masukKelas = MasukKelas::where('siswa_id', $request->id_siswa)->get();
        if (count($masukKelas) < 1) {
            $id_masuk_kelas = '';
        } else {
            $id_masuk_kelas = $masukKelas[0]['id'];
        }
        MasukKelas::destroy($id_masuk_kelas);
        $kelas = Kelas::where('id', $request->id_kelas)->get();
        if (auth()->user()->id_role == '1' || auth()->user()->id_role == '2') {
            return redirect('/dashboard/kelas/kelas_siswa/' . $kelas[0]->tendik->id)->with('success', 'Siswa telah dikeluarkan!');
        } else {
            return redirect('/siswa/kelas/' . $kelas[0]->tendik->id)->with('success', 'Siswa telah dikeluarkan!');
        }
    }

    public function tambah_kelas(Request $request)
    {
        $validatedData = $request->validate([
            'kelas' => 'required',
            'tingkat' => 'required',
            'ruang' => 'required',
            'tendik_id' => 'required'
        ]);
        Kelas::create($validatedData);
        return redirect('/dashboard/kelas')->with('success', 'Kelas baru berhasil ditambah!');
    }

    public function ubah_kelas(Request $request)
    {
        $validatedData = [
            'kelas' => $request->kelasUbah,
            'tingkat' => $request->tingkatUbah,
            'ruang' => $request->ruangUbah,
        ];
        Kelas::where('id', $request->idkelasUbah)->update($validatedData);
        return redirect('/dashboard/kelas')->with('success', 'Kelas berhasil diubah!');
    }
    public function hapus_kelas(Request $request)
    {
        Kelas::destroy($request->idkelasHapus);
        $masukKelas = MasukKelas::all();
        foreach ($masukKelas as $mk) {
            if ($mk->kela_id == $request->idkelasHapus) {
                MasukKelas::destroy($mk->id);
            }
        }
        return redirect('/dashboard/kelas')->with('success', 'Kelas telah dihapus!');
    }
    public function cari_siswa_kelas()
    {
        $siswa = request('key');
        $data = Siswa::cari_siswa_kelas($siswa);
        return view('app.admin.kelas_cari_siswa', [
            'siswa' => $data
        ]);
    }

    public function masuk()
    {
        $idkelas = request('idmasukkelas');
        $idsiswa = IdSiswa::all();
        foreach ($idsiswa as $is) {
            $data = [
                'kela_id' => $idkelas,
                'siswa_id' => $is->siswa_id
            ];
            MasukKelas::create($data);
            IdSiswa::destroy($is->id);
        }
        $kelas = Kelas::where('id', $idkelas)->get();
        if (auth()->user()->id_user !== 1) {
            return redirect('/siswa/kelas/' . $kelas[0]->tendik->id)->with('success', 'Siswa berhasil masuk kelas!');
        } else {
            return redirect('/dashboard/kelas')->with('success', 'Siswa berhasil masuk kelas!');
        }
    }
    // End Kelas

    // Tendik
    public function td()
    {
        $tendik = Tendik::tendik();
        $role = Role::orderBy('id', 'asc')->get();
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);
        return view('app.admin.td', [
            'tendik' => $tendik,
            'role' => $role,
            'user' => $dataTendik[0]
        ]);
    }

    public function tambahtd(Request $request)
    {
        $id_role = $request->id_role;
        if ($id_role == 1) {
            $role = 'admin';
        } elseif ($id_role == 2) {
            $role = 'kepala sekolah';
        } elseif ($id_role == 3) {
            $role = 'wali kelas';
        } elseif ($id_role == 4) {
            $role = 'bendahara';
        } elseif ($id_role == 5) {
            $role = 'guru';
        }
        $data_td = [
            'nama' => $request->nama_td,
            'role' => $role
        ];

        Tendik::create($data_td);
        $id_td = Tendik::orderBy('id', 'desc')->limit(1)->get();
        $data_user = [
            'id_user' => $id_td[0]['id'],
            'username' => $request->username,
            'password' => bcrypt($request->pass),
            'id_role' => $id_role
        ];
        User::create($data_user);
        return redirect('/dashboard/td')->with('success', 'Tenaga pendidik baru berhasil ditambah!');
    }

    public function ubahtd(Request $request)
    {
        $pass = $request->passUbah;
        if ($pass) {
            $validatedData = [
                'username' => $request->usernameUbah,
                'password' => bcrypt($request->passUbah)
            ];
        } else {
            $validatedData = [
                'username' => $request->usernameUbah
            ];
        }
        $tendik = Tendik::where('id', $request->idtendikUbah)->get();
        User::where('id_user', $tendik[0]['id'])->where('id_role', '!=', 6)->update($validatedData);
        return redirect('/dashboard/td')->with('success', 'Data berhasil diubah!');
    }

    public function hapustd(Request $request)
    {
        $user = User::where('id_user', $request->idtendikHapus)->get();
        User::destroy($user[0]->id);
        Tendik::destroy($request->idtendikHapus);
        return redirect('/dashboard/td')->with('success', 'Data telah dihapus!');
    }
    // End Tendik


    // Akun Peserta Didik
    public function akunpd()
    {
        $search = request('cari_siswa');
        if ($search) {
            $siswa = Siswa::cariakunpd($search);
        } else {
            $siswa = Siswa::akunpd();
        }
        $kelas = Kelas::orderBy('tingkat', 'desc')->get();
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);
        return view('app.admin.akunpd', [
            'siswa' => $siswa,
            'kelas' => $kelas,
            'user' => $dataTendik[0]
        ]);
    }

    public function kelasakunpd($idkelas)
    {
        $kelas_ini = Kelas::first()->where('tendik_id', $idkelas)->get();
        $siswa = Siswa::siswa_kelas($kelas_ini[0]->id);
        $kelas = Kelas::orderBy('tingkat', 'desc')->get();
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);
        return view('app.admin.akunpdkelas', [
            'siswa' => $siswa,
            'kelas' => $kelas,
            'kelas_ini' => $kelas_ini[0],
            'user' => $dataTendik[0]
        ]);
    }

    public function ubahakunpd(Request $request)
    {
        if ($request->passwordUbah) {
            $data = [
                'nis' => $request->nisUbah,
                'nisn' => $request->nisnUbah
            ];
            $datauser = [
                'username' => $request->usernameUbah,
                'password' => bcrypt($request->passwordUbah)
            ];
            Siswa::where('id', $request->idSiswaUbah)->update($data);
            User::where('id_user', $request->idSiswaUbah)->where('id_role', 6)->update($datauser);
        } else {
            $data = [
                'nis' => $request->nisUbah,
                'nisn' => $request->nisnUbah
            ];
            $datauser = [
                'username' => $request->usernameUbah,
                'password' => bcrypt($request->passwordUbah)
            ];
            Siswa::where('id', $request->idSiswaUbah)->update($data);
            User::where('id_user', $request->idSiswaUbah)->where('id_role', 6)->update($datauser);
        }
        if ($request->idkelas) {
            return redirect('/dashboard/akunpd/kelas/' . $request->idkelas)->with('success', 'Data berhasil diubah!');
        } else {
            return redirect('/dashboard/akunpd')->with('success', 'Data berhasil diubah!');
        }
    }

    public function unduhakunpd($idkelas)
    {
        if ($idkelas == 'all') {
            $kelas = '';
            $siswa = Siswa::akunpd();
        } else {
            $datakelas = Kelas::first()->where('id', $idkelas)->get();
            $kelas = $datakelas[0]->kelas;
            $siswa = Siswa::siswa_kelas($idkelas);
        }
        $sekolah = Sekolah::first();
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);
        return view('unduhan.akun', [
            'siswa' => $siswa,
            'kelas' => $kelas,
            'sekolah' => $sekolah,
            'user' => $dataTendik[0]
        ]);
    }
    // End Akun Peserta Didik


    // Bank
    public function bank()
    {
        $bank = Bank::orderBy('id', 'asc')->get();
        $username = auth()->user()->username;
        if (auth()->user()->id_role == 6) {
            $dataTendik = Siswa::where('id', auth()->user()->id_user)->get();
        } else {
            $dataTendik = Tendik::datatendik($username);
        }
        return view('app.admin.bank', [
            'bank' => $bank,
            'user' => $dataTendik[0]
        ]);
    }

    public function tambahbank(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'layanan' => $request->layanan,
            'no_reg' => $request->no_reg
        ];
        Bank::create($data);
        return redirect('/dashboard/bank')->with('success', 'Layanan baru berhasil ditambah!');
    }

    public function ubahbank(Request $request)
    {
        $data = [
            'nama' => $request->namaUbah,
            'layanan' => $request->layananUbah,
            'no_reg' => $request->no_regUbah
        ];
        Bank::where('id', $request->idbankUbah)->update($data);
        return redirect('/dashboard/bank')->with('success', 'Layanan berhasil diubah!');
    }

    public function hapusbank(Request $request)
    {
        Bank::destroy($request->idbankHapus);
        return redirect('/dashboard/bank')->with('success', 'Layanan telah dihapus!');
    }

    // End Bank

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
    public function edit_sekolah($id)
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


    public function destroy($id)
    {
        //
    }
}
