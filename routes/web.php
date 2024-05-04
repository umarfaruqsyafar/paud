<?php

use App\Http\Controllers\AcaraController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminController;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SiswaController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LandingController::class, 'index']);
Route::get('/sekolah/yayasan/{idkegiatan}', [LandingController::class, 'yayasan']);
Route::get('/sekolah/komite/{idkegiatan}', [LandingController::class, 'komite']);
Route::get('/sekolah/visi', [LandingController::class, 'visi']);
Route::get('/sekolah/tendik', [LandingController::class, 'tendik']);

Route::get('/about_us/layanan/{tingkat}', [LandingController::class, 'layanan']);
Route::get('/about_us/prestasi/{jenis}', [LandingController::class, 'prestasi']);
Route::get('/about_us/kelas/{jenis}/{idkegiatan}', [LandingController::class, 'kelas']);
Route::get('/about_us/doc/{jenis}/{idkegiatan}', [LandingController::class, 'dokumentasi']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/about', function () {
    return view('about', [
        'tittle' => 'About',
        'active' => 'About',
        'name' => 'Umar Faruq Syafar',
        'email' => 'faruq@gmail.com',
        'image' => 'img/faruq.jpg',
    ]);
});


Route::get('/blog', [PostController::class, 'index']);
Route::get('/blog/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'tittle' => 'Categories',
        'active' => 'Categories',
        'categories' => Category::all()
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('category', [
        'tittle' => $category->name,
        'active' => 'Categories',
        'posts' => $category->posts,
        'category' => $category->name
    ]);
});

Route::get('/authors/{user:username}', function (User $user) {
    return view('posts', [
        'tittle' => 'User Posts',
        'active' => 'Blog',
        'posts' => $user->posts->load(['category', 'user'])
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::get('/register/user', [RegisterController::class, 'user']);
Route::post('/register', [RegisterController::class, 'store']);

// Admin
// Sekolah
Route::get('/dashboard/lembaga/{lembaga}', [AdminController::class, 'index'])->middleware('auth');
Route::post('/dashboard/lembaga/update', [AdminController::class, 'update_lembaga']);

// Peserta Didik
Route::get('/dashboard/pd', [AdminController::class, 'pd'])->middleware('auth');
Route::get('/dashboard/pd/detail/{id}', [AdminController::class, 'detail'])->middleware('auth');
Route::get('/dashboard/pd/ubah/{id}', [AdminController::class, 'ubah'])->middleware('auth');
Route::post('/dashboard/pd/update_siswa', [AdminController::class, 'update_siswa'])->middleware('auth');
Route::get('/dashboard/pd/unduh/{idtendik}', [AdminController::class, 'unduh'])->middleware('auth');
Route::get('/dashboard/pd/baru', [AdminController::class, 'pd_baru'])->middleware('auth');
Route::get('/dashboard/pd/hapus', [AdminController::class, 'hapus'])->middleware('auth');
Route::get('/dashboard/pd/lulus', [AdminController::class, 'lulus'])->middleware('auth');
Route::get('/dashboard/pd/print/{idsiswa}', [AdminController::class, 'print'])->middleware('auth');
Route::get('/dashboard/daftar_lulus/{tahun}', [AdminController::class, 'daftar_lulus'])->middleware('auth');
Route::get('/dashboard/hapus_siswa/{tahun}', [AdminController::class, 'hapus_siswa'])->middleware('auth');
Route::get('/dashboard/daftar_lulus/siswa/{idsiswa}', [AdminController::class, 'daftar_lulus_siswa'])->middleware('auth');
Route::get('/dashboard/batal_lulus/{idsiswa}/{tahun}', [AdminController::class, 'batal_lulus'])->middleware('auth');
Route::get('/dashboard/pd/terima_siswa/{id}', [AdminController::class, 'terima_siswa'])->middleware('auth');
Route::post('/dashboard/pd/tolak_siswa', [AdminController::class, 'tolak_siswa'])->middleware('auth');
Route::get('/dashboard/pd/tambah_idsiswa', [AdminController::class, 'tambah_idsiswa'])->middleware('auth');

// Kelas
Route::get('/dashboard/kelas', [AdminController::class, 'kelas'])->middleware('auth');
Route::post('/dashboard/kelas/naikkelas', [AdminController::class, 'naikkelas'])->middleware('auth');
Route::get('/dashboard/kelas/kelas_siswa/{id}', [AdminController::class, 'kelas_siswa'])->middleware('auth');
Route::post('/dashboard/kelas/keluar_kelas', [AdminController::class, 'keluar_kelas'])->middleware('auth');
Route::post('/dashboard/kelas/tambah_kelas', [AdminController::class, 'tambah_kelas'])->middleware('auth');
Route::post('/dashboard/kelas/ubah_kelas', [AdminController::class, 'ubah_kelas'])->middleware('auth');
Route::post('/dashboard/kelas/hapus_kelas', [AdminController::class, 'hapus_kelas'])->middleware('auth');
Route::get('/dashboard/kelas/masuk', [AdminController::class, 'masuk'])->middleware('auth');
Route::get('/dashboard/kelas/cari_siswa_kelas', [AdminController::class, 'cari_siswa_kelas'])->middleware('auth');

// Tendik
Route::get('/dashboard/td', [AdminController::class, 'td'])->middleware('auth');
Route::post('/dashboard/td/ubah', [AdminController::class, 'ubahtd'])->middleware('auth');
Route::post('/dashboard/td/hapus', [AdminController::class, 'hapustd'])->middleware('auth');
Route::post('/dashboard/td/tambah', [AdminController::class, 'tambahtd'])->middleware('auth');

// Akun Peserta Didik
Route::get('/dashboard/akunpd', [AdminController::class, 'akunpd'])->middleware('auth');
Route::get('/dashboard/akunpd/kelas/{id}', [AdminController::class, 'kelasakunpd'])->middleware('auth');
Route::post('/dashboard/akunpd/ubah', [AdminController::class, 'ubahakunpd'])->middleware('auth');
Route::get('/dashboard/akunpd/unduh/{id}', [AdminController::class, 'unduhakunpd'])->middleware('auth');

// Bank
Route::get('/dashboard/bank', [AdminController::class, 'bank'])->middleware('auth');
Route::post('/dashboard/bank/tambah', [AdminController::class, 'tambahbank'])->middleware('auth');
Route::post('/dashboard/bank/ubah', [AdminController::class, 'ubahbank'])->middleware('auth');
Route::post('/dashboard/bank/hapus', [AdminController::class, 'hapusbank'])->middleware('auth');

// End Admin

// Acara

// Pengumuman
Route::get('acara/pengumuman', [AcaraController::class, 'pengumuman'])->middleware('auth');
Route::post('acara/pengumuman/tambah', [AcaraController::class, 'tambahpengumuman'])->middleware('auth');
Route::post('acara/pengumuman/hapus', [AcaraController::class, 'hapuspengumuman'])->middleware('auth');

// Landing
Route::get('acara/landing', [AcaraController::class, 'landing'])->middleware('auth');
Route::post('acara/landing/ubah', [AcaraController::class, 'ubahlanding'])->middleware('auth');

// Prestasi
Route::get('acara/prestasi', [AcaraController::class, 'prestasi'])->middleware('auth');
Route::post('acara/prestasi/tambah', [AcaraController::class, 'tambahprestasi'])->middleware('auth');
Route::post('acara/prestasi/tambah_dok', [AcaraController::class, 'tambah_dokprestasi'])->middleware('auth');
Route::post('acara/prestasi/hapus', [AcaraController::class, 'hapusprestasi'])->middleware('auth');

// Dokumentasi
Route::get('acara/dokumentasi/{jenis}', [AcaraController::class, 'dokumentasi'])->middleware('auth');
Route::get('acara/dokumentasi/{jenis}/{idkegiatan}', [AcaraController::class, 'detiledokumentasi'])->middleware('auth');
Route::post('acara/dokumentasi/tambah', [AcaraController::class, 'tambahdokumentasi'])->middleware('auth');
Route::post('acara/dokumentasi/tambahdok', [AcaraController::class, 'tambahdok'])->middleware('auth');
Route::post('acara/dokumentasi/ubahdok', [AcaraController::class, 'ubahdok'])->middleware('auth');
Route::get('acara/dokumentasi/hapusdok/{jenis}/{idkegiatan}/{iddok}', [AcaraController::class, 'hapusdok'])->middleware('auth');
Route::post('acara/dokumentasi/ubah', [AcaraController::class, 'ubahdokumentasi'])->middleware('auth');
Route::post('acara/dokumentasi/hapus', [AcaraController::class, 'hapusdokumentasi'])->middleware('auth');

// End Acara

// Administrasi
Route::get('keuangan/administrasi/{tingkat}', [KeuanganController::class, 'administrasi'])->middleware('auth');
Route::post('keuangan/administrasi/tambah', [KeuanganController::class, 'tambah_administrasi'])->middleware('auth');
Route::post('keuangan/administrasi/ubah', [KeuanganController::class, 'ubah_administrasi'])->middleware('auth');
Route::post('keuangan/administrasi/hapus', [KeuanganController::class, 'hapus_administrasi'])->middleware('auth');
Route::get('keuangan/info_adm/{idkelas}', [KeuanganController::class, 'adm_info'])->middleware('auth');
Route::post('keuangan/info_adm/tambah', [KeuanganController::class, 'adm_info_tambah'])->middleware('auth');
Route::post('keuangan/info_adm/kurang', [KeuanganController::class, 'adm_info_kurang'])->middleware('auth');
Route::get('keuangan/info_adm/{idkelas}/hapus', [KeuanganController::class, 'adm_info_hapus'])->middleware('auth');
Route::get('keuangan/pembayaran_adm/{idkelas}', [KeuanganController::class, 'adm_pembayaran'])->middleware('auth');
Route::post('keuangan/pembayaran_adm/bayar', [KeuanganController::class, 'adm_pembayaran_bayar'])->middleware('auth');
Route::get('keuangan/pembayaran_adm/siswa/{idsiswa}', [KeuanganController::class, 'adm_pembayaran_siswa'])->middleware('auth');
Route::post('keuangan/pembayaran_adm/siswa/hapus', [KeuanganController::class, 'adm_pembayaran_siswa_hapus'])->middleware('auth');
// End Administrasi

// SPP
Route::get('keuangan/spp/{tingkat}', [KeuanganController::class, 'spp'])->middleware('auth');
Route::post('keuangan/spp/ubah', [KeuanganController::class, 'ubah_spp'])->middleware('auth');
Route::post('keuangan/spp/tambah', [KeuanganController::class, 'tambah_spp'])->middleware('auth');
Route::post('keuangan/spp/kurang', [KeuanganController::class, 'kurang_spp'])->middleware('auth');
Route::post('keuangan/spp/hapus', [KeuanganController::class, 'hapus_spp'])->middleware('auth');
Route::get('keuangan/info_spp/{idkelas}', [KeuanganController::class, 'info_spp'])->middleware('auth');
Route::get('keuangan/info_spp/{idkelas}/perubahan', [KeuanganController::class, 'info_spp_perubahan'])->middleware('auth');
Route::get('keuangan/pembayaran_spp/{idkelas}', [KeuanganController::class, 'pembayaran_spp'])->middleware('auth');
Route::post('keuangan/pembayaran_spp/bayar', [KeuanganController::class, 'pembayaran_spp_bayar'])->middleware('auth');
Route::get('keuangan/pembayaran_spp/siswa/{idsiswa}', [KeuanganController::class, 'pembayaran_spp_siswa'])->middleware('auth');
Route::post('keuangan/pembayaran_spp/siswa/hapus', [KeuanganController::class, 'pembayaran_spp_siswa_hapus'])->middleware('auth');

// END SPP

// laporan
Route::get('keuangan/laporan/{tingkat}/{ket}', [KeuanganController::class, 'laporan'])->middleware('auth');
Route::post('keuangan/laporan/masuk', [KeuanganController::class, 'laporan_masuk'])->middleware('auth');
Route::post('keuangan/laporan/keluar', [KeuanganController::class, 'laporan_keluar'])->middleware('auth');
Route::post('keuangan/laporan/perubahan', [KeuanganController::class, 'laporan_perubahan'])->middleware('auth');
Route::post('keuangan/laporan/hapus', [KeuanganController::class, 'laporan_hapus'])->middleware('auth');
// End laporan

// Tabungan
Route::get('keuangan/tabungan/{idkelas}', [KeuanganController::class, 'tabungan'])->middleware('auth');
Route::get('keuangan/tabungan/siswa/{idsiswa}', [KeuanganController::class, 'tabungan_siswa'])->middleware('auth');
Route::post('keuangan/tabungan/masuk', [KeuanganController::class, 'tabungan_masuk'])->middleware('auth');
Route::post('keuangan/tabungan/penarikan', [KeuanganController::class, 'tabungan_penarikan'])->middleware('auth');
Route::post('keuangan/tabungan/perubahan', [KeuanganController::class, 'tabungan_perubahan'])->middleware('auth');
// End Tabungan

// Siswa

// Kelas
Route::get('siswa/kelas/{id}', [AdminController::class, 'kelas_siswa'])->middleware('auth');
Route::get('siswa/tabungan/{idtendik}', [KeuanganController::class, 'tabungan'])->middleware('auth');
Route::get('siswa/tabungan/siswa/{idsiswa}', [KeuanganController::class, 'tabungan_siswa'])->middleware('auth');
Route::get('siswa/spp/{idtendik}', [KeuanganController::class, 'pembayaran_spp'])->middleware('auth');
Route::get('siswa/spp/siswa/{idsiswa}', [KeuanganController::class, 'pembayaran_spp_siswa'])->middleware('auth');
Route::get('siswa/administrasi/{idtendik}', [KeuanganController::class, 'adm_pembayaran'])->middleware('auth');
Route::get('siswa/administrasi/siswa/{idsiswa}', [KeuanganController::class, 'adm_pembayaran_siswa'])->middleware('auth');

// Perkembangan fisik
Route::get('siswa/fisik/{idbulan}', [SiswaController::class, 'fisik'])->middleware('auth');
Route::post('siswa/fisik/tambah', [SiswaController::class, 'fisik_tambah'])->middleware('auth');
// End Perkembangan fisik

// Format Raport
Route::get('siswa/format_raport', [SiswaController::class, 'format_raport'])->middleware('auth');
Route::get('siswa/format_raport/{idcapaian}', [SiswaController::class, 'format_raport_capaian'])->middleware('auth');
Route::get('siswa/format_raport/{idcapaian}/{idtujuan}', [SiswaController::class, 'format_raport_tujuan'])->middleware('auth');
Route::post('siswa/format_raport/tambah_tujuan', [SiswaController::class, 'tambah_tujuan'])->middleware('auth');
Route::post('siswa/format_raport/ubah_tujuan', [SiswaController::class, 'ubah_tujuan'])->middleware('auth');
Route::post('siswa/format_raport/hapus_tujuan', [SiswaController::class, 'hapus_tujuan'])->middleware('auth');
Route::post('siswa/format_raport/deskripsi', [SiswaController::class, 'deskripsi'])->middleware('auth');
Route::post('siswa/format_raport/tambah_indikator', [SiswaController::class, 'tambah_indikator'])->middleware('auth');
Route::post('siswa/format_raport/ubah_indikator', [SiswaController::class, 'ubah_indikator'])->middleware('auth');
Route::post('siswa/format_raport/hapus_indikator', [SiswaController::class, 'hapus_indikator'])->middleware('auth');
Route::post('siswa/format_raport/awal', [SiswaController::class, 'format_raport_awal'])->middleware('auth');

Route::get('siswa/format_raport2', [SiswaController::class, 'format_raport2'])->middleware('auth');
Route::post('siswa/format_raport2/tambah_doa', [SiswaController::class, 'tambah_doa'])->middleware('auth');
Route::post('siswa/format_raport2/ubah_doa', [SiswaController::class, 'ubah_doa'])->middleware('auth');
Route::post('siswa/format_raport2/hapus_doa', [SiswaController::class, 'hapus_doa'])->middleware('auth');
Route::post('siswa/format_raport2/tambah_surah', [SiswaController::class, 'tambah_surah'])->middleware('auth');
Route::post('siswa/format_raport2/ubah_surah', [SiswaController::class, 'ubah_surah'])->middleware('auth');
Route::post('siswa/format_raport2/hapus_surah', [SiswaController::class, 'hapus_surah'])->middleware('auth');

Route::get('siswa/format_raport3', [SiswaController::class, 'format_raport3'])->middleware('auth');
Route::post('siswa/format_raport3/tambah_pilar', [SiswaController::class, 'tambah_pilar'])->middleware('auth');
Route::post('siswa/format_raport3/ubah_pilar', [SiswaController::class, 'ubah_pilar'])->middleware('auth');
Route::post('siswa/format_raport3/hapus_pilar', [SiswaController::class, 'hapus_pilar'])->middleware('auth');

Route::get('siswa/format_raport4', [SiswaController::class, 'format_raport4'])->middleware('auth');
Route::post('siswa/format_raport4/tambah_ekstra', [SiswaController::class, 'tambah_ekstra'])->middleware('auth');
Route::post('siswa/format_raport4/ubah_ekstra', [SiswaController::class, 'ubah_ekstra'])->middleware('auth');
Route::post('siswa/format_raport4/hapus_ekstra', [SiswaController::class, 'hapus_ekstra'])->middleware('auth');
// End Format Raport

// Penilaian Raport
Route::get('siswa/raport', [SiswaController::class, 'raport'])->middleware('auth');
Route::get('siswa/raport/lihat/{idsiswa}/{indikator}', [SiswaController::class, 'raport_lihat'])->middleware('auth');
Route::get('siswa/raport/{idsiswa}/{idcapaian}', [SiswaController::class, 'raport_siswa'])->middleware('auth');
Route::post('siswa/raport/nilai1', [SiswaController::class, 'raport_nilai1'])->middleware('auth');
Route::post('siswa/raport/nilai1_fix', [SiswaController::class, 'raport_nilai1_fix'])->middleware('auth');
Route::post('siswa/raport/hapus_nilai', [SiswaController::class, 'raport_hapus_nilai'])->middleware('auth');
Route::post('siswa/raport/dokumentasi', [SiswaController::class, 'raport_dokumentasi'])->middleware('auth');
Route::get('siswa/raport/{idsiswa}/{idcapaian}/dokumentasi/hapus', [SiswaController::class, 'raport_dokumentasi_hapus'])->middleware('auth');
Route::get('siswa/raport/nilai_indikator', [SiswaController::class, 'nilai_indikator'])->middleware('auth');
Route::get('siswa/raport/nilai_kemunculan', [SiswaController::class, 'nilai_kemunculan'])->middleware('auth');

Route::get('siswa/raport2/{idsiswa}/{ket}', [SiswaController::class, 'raport2'])->middleware('auth');
Route::get('siswa/raport2/nilai', [SiswaController::class, 'raport2_nilai'])->middleware('auth');
Route::post('siswa/raport2/keterangan', [SiswaController::class, 'raport2_keterangan'])->middleware('auth');

Route::get('siswa/raport3/{idsiswa}', [SiswaController::class, 'raport3'])->middleware('auth');
Route::get('siswa/raport3/{idsiswa}/nilai', [SiswaController::class, 'raport3_nilai'])->middleware('auth');

Route::get('siswa/raport4/{idsiswa}', [SiswaController::class, 'raport4'])->middleware('auth');
Route::post('siswa/raport4/nilai', [SiswaController::class, 'raport4_nilai'])->middleware('auth');
Route::post('siswa/raport4/nilai_ekstra', [SiswaController::class, 'raport4_nilai_ekstra'])->middleware('auth');
// End Penilaian Raport

Route::get('/siswa/datadiri/{id}', [AdminController::class, 'ubah'])->middleware('auth');

Route::get('/profile', [AdminController::class, 'profile'])->middleware('auth');
Route::get('/ubah_pass', [AdminController::class, 'ubah_pass'])->middleware('auth');
Route::post('/ubah_password', [AdminController::class, 'ubah_password'])->middleware('auth');
Route::post('/ubah_foto_profile', [AdminController::class, 'ubah_foto_profile'])->middleware('auth');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
