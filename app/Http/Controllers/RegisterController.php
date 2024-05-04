<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Administrasi;
use App\Models\AdministrasiMasuk;
use App\Models\Tendik;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.pendaftaran', [
            'tittle' => 'Register',
            'active' => 'Login'
        ]);
    }

    public function user()
    {
        $tendik = Tendik::where('role', 'wali kelas')->get();
        $i = 1;
        foreach ($tendik as $s) {
            $data = [
                'id_user' => $s->id,
                'username' => 'walas'.$i,
                'password' => Hash::make(12345),
                'id_role' => 3
            ];
            User::create($data);
            $i ++;
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'panggilan' => 'required',
            'tingkat' => 'required',
            'jk' => 'required',
            'jk' => 'required',
            'nik' => ['required', 'min:16', 'max:16', 'unique:siswas'],
            'anak_ke' => 'required',
            'tempat' => 'required',
            'lahir' => 'required',
            'alamat' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'nama_ibu' => 'required',
            'pdd_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'agama_ibu' => 'required',
            'no_ibu' => 'required',
            'nama_ayah' => '',
            'pdd_ayah' => '',
            'pekerjaan_ayah' => '',
            'agama_ayah' => '',
            'no_ayah' => '',
        ]);
        if ($request->tingkat == 'TK A') {
            $validatedData['tingkat'] = 'tk_a';
        } elseif ($request->tingkat == 'TK B') {
            $validatedData['tingkat'] = 'tk_b';
        } elseif ($request->tingkat == 'KB A') {
            $validatedData['tingkat'] = 'kb_a';
        } elseif ($request->tingkat == 'KB B') {
            $validatedData['tingkat'] = 'kb_b';
        } elseif ($request->tingkat == 'Day Care') {
            $validatedData['tingkat'] = 'dc';
        }

        $validatedData['status'] = 0;
        Siswa::create($validatedData);
        $siswa = Siswa::orderBy('id', 'desc')->get();
        $data = [
            'id_user' => $siswa[0]->id,
            'username' => $siswa[0]->panggilan . $siswa[0]->lahir,
            'password' => Hash::make($siswa[0]->panggilan . $siswa[0]->lahir),
            'id_role' => 6
        ];
        User::create($data);
        $adm = Administrasi::where('tingkat', $validatedData['tingkat'])->get();
        if (count($adm) > 0) {
            foreach ($adm as $a) {
                $data2 = [
                    'siswa_id' => $siswa[0]->id,
                    'administrasi_id' => $a->id
                ];
                AdministrasiMasuk::create($data2);
            }
        }
        // $request->session()->flash('success', 'Registration successfull! Please login');
        return redirect('/login')->with('success', 'Pendaftaran siswa berhasil, akun akan diberikan oleh operator!');
    }
}
