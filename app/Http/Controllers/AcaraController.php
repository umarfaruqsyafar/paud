<?php

namespace App\Http\Controllers;

use App\Models\DokumenPrestasi;
use App\Models\DokumentasiKegiatan;
use App\Models\Kegiatan;
use App\Models\Landing;
use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\Prestasi;
use App\Models\Tendik;
use Illuminate\Support\Facades\Storage;

class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Pengumuman

    public function pengumuman()
    {
        $search = request('cari_pengumuman');
        if ($search) {
            $pengumuman = Pengumuman::where('judul', 'like', '%' . $search . '%')
                ->orWhere('isi', 'like', '%' . $search . '%')
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $pengumuman = Pengumuman::orderBy('id', 'desc')->get();
        }
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);
        return view('app.acara.pengumuman', [
            'pengumuman' => $pengumuman,
            'user' => $dataTendik[0]
        ]);
    }

    public function tambahpengumuman(Request $request)
    {
        if ($request->file('file')) {
            $data = [
                'judul' => $request->judul,
                'isi' => $request->isi,
                'file' => $request->file('file')->store('pengumuman'),
                'nama' => $request->nama
            ];
        } else {
            $data = [
                'judul' => $request->judul,
                'isi' => $request->isi,
                'nama' => $request->nama
            ];
        }
        Pengumuman::create($data);
        return redirect('/acara/pengumuman')->with('success', 'Pengumuman berhasil ditambah!');
    }

    public function hapuspengumuman(Request $request)
    {
        if ($request->fileHapus) {
            Storage::delete($request->fileHapus);
        }
        Pengumuman::destroy($request->idpengumuman);
        return redirect('/acara/pengumuman')->with('success', 'Pengumuman telah dihapus!');
    }

    // End Pengumuman

    // Landing
    public function landing()
    {
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);
        $landing = Landing::all();
        return view('app.acara.landing', [
            'user' => $dataTendik[0],
            'gambar' => $landing
        ]);
    }

    public function ubahlanding(Request $request)
    {
        if ($request->gambar) {
            Storage::delete($request->lama);
            $data = [
                'gambar' => $request->file('gambar')->store('landing')
            ];
            Landing::where('id', $request->id)->update($data);
        }
        return redirect('/acara/landing')->with('success', 'Gambar berhasil diubah!');
    }
    // End Landing

    // Prestasi
    public function prestasi()
    {
        $search = request('cari_prestasi');
        if ($search) {
            $prestasi = Prestasi::where('jenis', 'like', '%' . $search . '%')
                ->orWhere('judul', 'like', '%' . $search . '%')
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $prestasi = Prestasi::orderBy('id', 'desc')->get();
        }
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);

        return view('app.acara.prestasi', [
            'user' => $dataTendik[0],
            'prestasi' => $prestasi
        ]);
    }

    public function tambahprestasi(Request $request)
    {
        $data = [
            'jenis' => $request->jenis,
            'judul' => $request->judul,
            'isi' => $request->isi
        ];
        Prestasi::create($data);
        return redirect('/acara/prestasi')->with('success', 'Prestasi berhasil ditambah!');
    }

    public function tambah_dokprestasi(Request $request)
    {
        $data = [
            'prestasi_id' => $request->idprestasi,
            'gambar' => $request->file('file')->store('prestasi')
        ];
        DokumenPrestasi::create($data);
        return redirect('/acara/prestasi')->with('success', 'Dokumentasi prestasi berhasil ditambah!');
    }

    public function hapusprestasi(Request $request)
    {
        $data_dok = DokumenPrestasi::where('prestasi_id', $request->idprestasi)->get();
        if ($data_dok) {
            foreach ($data_dok as $d) {
                Storage::delete($d['gambar']);
                DokumenPrestasi::destroy($d['id']);
            }
        }
        Prestasi::destroy($request->idprestasi);
        return redirect('/acara/prestasi')->with('success', 'Prestasi telah dihapus!');
    }
    // End Prestasi


    // Dokumentasi
    public function dokumentasi($jenis)
    {

        $kegiatan = Kegiatan::where('jenis', $jenis)
            ->orderBy('id', 'desc')->get();
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);

        return view('app.acara.dokumentasi', [
            'user' => $dataTendik[0],
            'kegiatan' => $kegiatan,
            'jenis' => $jenis
        ]);
    }

    public function tambahdokumentasi(Request $request)
    {
        $data = [
            'jenis' => $request->jenis,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ];
        Kegiatan::create($data);
        return redirect('/acara/dokumentasi/' . $request->jenis)->with('success', 'Dokumentasi berhasil ditambah!');
    }

    public function ubahdokumentasi(Request $request)
    {
        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ];
        Kegiatan::where('id', $request->id)->update($data);
        return redirect('/acara/dokumentasi/' . $request->jenis)->with('success', 'Dokumentasi berhasil diubah!');
    }

    public function hapusdokumentasi(Request $request)
    {
        $data_dok = DokumentasiKegiatan::where('kegiatan_id', $request->id)->get();
        if ($data_dok) {
            foreach ($data_dok as $d) {
                Storage::delete($d['gambar']);
                DokumentasiKegiatan::destroy($d['id']);
            }
        }
        Kegiatan::destroy($request->id);
        return redirect('/acara/dokumentasi/' . $request->jenis)->with('success', 'Dokumentasi telah dihapus!');
    }

    public function detiledokumentasi($jenis, $idkegiatan)
    {
        $kegiatan = Kegiatan::where('id', $idkegiatan)->get();
        $dokumentasi = DokumentasiKegiatan::where('kegiatan_id', $idkegiatan)
            ->orderBy('id', 'desc')
            ->get();
        $img = DokumentasiKegiatan::where('kegiatan_id', $idkegiatan)
            ->where('gambar', 'like', '%jpg')
            ->orWhere('gambar', 'like', '%jpeg')
            ->orWhere('gambar', 'like', '%png')
            ->orderBy('id', 'desc')
            ->get();
        $username = auth()->user()->username;
        $dataTendik = Tendik::datatendik($username);

        return view('app.acara.dokumentasidetile', [
            'user' => $dataTendik[0],
            'kegiatan' => $kegiatan[0],
            'jenis' => $jenis,
            'dokumentasi' => $dokumentasi,
            'img' => $img
        ]);
    }

    public function tambahdok(Request $request)
    {
        $data = [
            'kegiatan_id' => $request->idkegiatan,
            'judul' => $request->judul,
            'gambar' => $request->file('image')->store('dokumentasi')
        ];
        DokumentasiKegiatan::create($data);
        return redirect('/acara/dokumentasi/' . $request->jenis . '/' . $request->idkegiatan)->with('success', 'Dokumentasi kegiatan berhasil ditambah!');
    }

    public function ubahdok(Request $request)
    {
        $data = [
            'judul' => $request->judul
        ];
        DokumentasiKegiatan::where('id', $request->iddok)->update($data);
        return redirect('/acara/dokumentasi/' . $request->jenis . '/' . $request->idkegiatan)->with('success', 'Dokumentasi kegiatan berhasil diubah!');
    }

    public function hapusdok($jenis, $idkegiatan, $iddok)
    {
        $data = DokumentasiKegiatan::where('id', $iddok)->first()->get();
        Storage::delete($data[0]->gambar);
        DokumentasiKegiatan::destroy($iddok);
        return redirect('/acara/dokumentasi/' . $jenis . '/' . $idkegiatan)->with('success', 'Dokumentasi kegiatan telah dihapus!');
    }
    // End Dokumentasi
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
