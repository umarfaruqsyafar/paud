<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Kelas;
use App\Models\Kode;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\Tendik;
use App\Models\Bank;
use App\Models\Bulan;
use App\Models\DokumenPrestasi;
use App\Models\Landing;
use App\Models\Pengumuman;
use App\Models\Prestasi;
use App\Models\RaportCapaian;
use App\Models\Role;
use App\Models\Spp;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'id_user' => 1,
            'username' => 'admin',
            'password' => bcrypt('12345'),
            'id_role' => 1
        ]);
        User::create([
            'id_user' => 2,
            'username' => 'kepsek',
            'password' => bcrypt('12345'),
            'id_role' => 2
        ]);
        User::create([
            'id_user' => 3,
            'username' => 'walas',
            'password' => bcrypt('12345'),
            'id_role' => 3
        ]);
        User::create([
            'id_user' => 4,
            'username' => 'walas2',
            'password' => bcrypt('12345'),
            'id_role' => 3
        ]);
        User::create([
            'id_user' => 5,
            'username' => 'bendahara',
            'password' => bcrypt('12345'),
            'id_role' => 4
        ]);
        User::create([
            'id_user' => 6,
            'username' => 'guru',
            'password' => bcrypt('12345'),
            'id_role' => 5
        ]);
        User::create([
            'id_user' => 1,
            'username' => 'hafidz17082018',
            'password' => bcrypt('12345'),
            'id_role' => 6
        ]);

        User::create([
            'id_user' => 2,
            'username' => 'angga17082018',
            'password' => bcrypt('12345'),
            'id_role' => 6
        ]);

        User::create([
            'id_user' => 3,
            'username' => 'anita17082018',
            'password' => bcrypt('12345'),
            'id_role' => 6
        ]);
        User::create([
            'id_user' => 4,
            'username' => 'leli17082018',
            'password' => bcrypt('12345'),
            'id_role' => 6
        ]);
        User::create([
            'id_user' => 5,
            'username' => 'tegar17082018',
            'password' => bcrypt('12345'),
            'id_role' => 6
        ]);

        Sekolah::create([
            'nama' => 'PAUD ANNA HUSADA',
            'logo' => 'post-images/oyJIrUUgBCdMnwjnwa4jwo4LdZddER7IpVi228VH.png',
            'alamat' => 'Jl Mayjend Sungkono',
            'desa' => 'Mlajah',
            'kecamatan' => 'Bangkalan',
            'kabupaten' => 'Bangkalan',
            'provinsi' => 'Jawa Timur',
            'rtrw' => '01/03',
            'dusun' => 'Malajah',
            'kode_pos' => '69111',
            'telepon' => '082-330-964-009',
            'fax' => '031-82624',
            'email' => 'bangkalan@gmail.com'
        ]);

        Siswa::create([
            'status' => '0',
            'nama' => 'Abdul Hafidz',
            'panggilan' => 'Hafidz',
            'tingkat' => 'tk',
            'jk' => 'Laki-laki',
            'nik' => '0123456789123456',
            'anak_ke' => '1',
            'tempat' => 'Bangkalan',
            'lahir' => '2018-08-17',
            'alamat' => 'Jl. Mayjend Sungkono',
            'desa' => 'Pongkoran',
            'provinsi' => 'Jawa Timur',
            'kabupaten' => 'Bangkalan',
            'kecamatan' => 'Bangkalan',
            'nama_ibu' => 'Siti Aminah',
            'pdd_ibu' => 'SMA',
            'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            'agama_ibu' => 'Islam',
            'no_ibu' => '085123222345'

        ]);

        Siswa::create([
            'status' => '0',
            'nama' => 'Angga Ladzi',
            'panggilan' => 'Angga',
            'tingkat' => 'kb',
            'jk' => 'Laki-laki',
            'nik' => '0123456789123450',
            'anak_ke' => '1',
            'tempat' => 'Bangkalan',
            'lahir' => '2018-08-17',
            'alamat' => 'Jl. Mayjend Sungkono',
            'desa' => 'Pongkoran',
            'provinsi' => 'Jawa Timur',
            'kabupaten' => 'Bangkalan',
            'kecamatan' => 'Bangkalan',
            'nama_ibu' => 'Siti Aminah',
            'pdd_ibu' => 'SMA',
            'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            'agama_ibu' => 'Islam',
            'no_ibu' => '085123222345'

        ]);

        Siswa::create([
            'status' => '0',
            'nama' => 'Anita Febrianti',
            'panggilan' => 'Anita',
            'tingkat' => 'kb',
            'jk' => 'Perempuan',
            'nik' => '0123456789123451',
            'anak_ke' => '2',
            'tempat' => 'Bangkalan',
            'lahir' => '2018-08-17',
            'alamat' => 'Jl. Mayjend Sungkono',
            'desa' => 'Pongkoran',
            'provinsi' => 'Jawa Timur',
            'kabupaten' => 'Bangkalan',
            'kecamatan' => 'Bangkalan',
            'nama_ibu' => 'Siti Aminah',
            'pdd_ibu' => 'SMA',
            'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            'agama_ibu' => 'Islam',
            'no_ibu' => '085123222345'

        ]);

        Siswa::create([
            'status' => '0',
            'nama' => 'Melyana Febrianti',
            'panggilan' => 'Leli',
            'tingkat' => 'tk',
            'jk' => 'Perempuan',
            'nik' => '0123456789123452',
            'anak_ke' => '2',
            'tempat' => 'Bangkalan',
            'lahir' => '2018-08-17',
            'alamat' => 'Jl. Mayjend Sungkono',
            'desa' => 'Pongkoran',
            'provinsi' => 'Jawa Timur',
            'kabupaten' => 'Bangkalan',
            'kecamatan' => 'Bangkalan',
            'nama_ibu' => 'Siti Aminah',
            'pdd_ibu' => 'SMA',
            'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            'agama_ibu' => 'Islam',
            'no_ibu' => '085123222345'

        ]);

        Siswa::create([
            'status' => '0',
            'nama' => 'Tegar Gumilang',
            'panggilan' => 'Tegar',
            'tingkat' => 'tk',
            'jk' => 'Laki-laki',
            'nik' => '0123456789123453',
            'anak_ke' => '2',
            'tempat' => 'Bangkalan',
            'lahir' => '2018-08-17',
            'alamat' => 'Jl. Mayjend Sungkono',
            'desa' => 'Pongkoran',
            'provinsi' => 'Jawa Timur',
            'kabupaten' => 'Bangkalan',
            'kecamatan' => 'Bangkalan',
            'nama_ibu' => 'Siti Aminah',
            'pdd_ibu' => 'SMA',
            'pekerjaan_ibu' => 'Ibu Rumah Tangga',
            'agama_ibu' => 'Islam',
            'no_ibu' => '085123222345'

        ]);

        Kelas::create([
            'kelas' => 'Abu Bakar',
            'tingkat' => 'TK B',
            'ruang' => 'Abu Bakar',
            'tendik_id' => 3
        ]);
        Kelas::create([
            'kelas' => 'Umar Bin Khattab',
            'tingkat' => 'TK A',
            'ruang' => 'Umar',
            'tendik_id' => 4
        ]);
        Kelas::create([
            'kelas' => 'Utsman Bin Affan',
            'tingkat' => 'KB',
            'ruang' => 'Kelompok Bermain',
            'tendik_id' => 5
        ]);
        Kelas::create([
            'kelas' => 'Ali Bin Abu Thalib',
            'tingkat' => 'KB',
            'ruang' => 'Kelompok Bermain',
            'tendik_id' => 6
        ]);

        Tendik::create([
            'nama' => 'Umar Faruq Syafar',
            'role' => 'admin',
            'tempat' => 'Bangkalan',
            'lahir' => '2020-05-08',
            'pdd' => 'S1',
            'no_hp' => '085230964093',
            'alamat' => 'Jl. Mayjend Sungkono',
        ]);

        Tendik::create([
            'nama' => 'Siti Rosidah',
            'role' => 'kepala sekolah',
            'tempat' => 'Bangkalan',
            'lahir' => '2020-05-08',
            'pdd' => 'S1',
            'no_hp' => '085230964093',
            'alamat' => 'Jl. Mayjend Sungkono',
        ]);

        Tendik::create([
            'nama' => 'Nur Kumalah',
            'role' => 'wali kelas',
            'tempat' => 'Bangkalan',
            'lahir' => '2020-05-08',
            'pdd' => 'S1',
            'no_hp' => '085230964093',
            'alamat' => 'Jl. Mayjend Sungkono',
        ]);

        Tendik::create([
            'nama' => 'Agustina',
            'role' => 'wali kelas',
            'tempat' => 'Bangkalan',
            'lahir' => '2020-05-08',
            'pdd' => 'S1',
            'no_hp' => '085230964093',
            'alamat' => 'Jl. Mayjend Sungkono',
        ]);

        Tendik::create([
            'nama' => 'Pandini Kartika Dewi',
            'role' => 'bendahara',
            'tempat' => 'Bangkalan',
            'lahir' => '2020-05-08',
            'pdd' => 'S1',
            'no_hp' => '085230964093',
            'alamat' => 'Jl. Mayjend Sungkono',
        ]);

        Tendik::create([
            'nama' => 'Lastri Dewi Norani',
            'role' => 'guru',
            'tempat' => 'Bangkalan',
            'lahir' => '2020-05-08',
            'pdd' => 'S1',
            'no_hp' => '085230964093',
            'alamat' => 'Jl. Mayjend Sungkono',
        ]);

        Kode::create([
            'kode' => '123456'
        ]);

        Bank::create([
            'nama' => 'Umar Faruq Syafar',
            'layanan' => 'Bank BCA',
            'no_reg' => '1851510953'
        ]);

        Bank::create([
            'nama' => 'Umar Faruq Syafar',
            'layanan' => 'OVO',
            'no_reg' => '1851510953'
        ]);

        Role::create([
            'role' => 'admin'
        ]);
        Role::create([
            'role' => 'kepala sekolah'
        ]);
        Role::create([
            'role' => 'wali kelas'
        ]);
        Role::create([
            'role' => 'bendahara'
        ]);
        Role::create([
            'role' => 'guru'
        ]);

        Pengumuman::create([
            'judul' => 'Pengumuman Pertama',
            'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores illo asperiores, atque a cupiditate, dignissimos similique possimus labore provident aut, voluptatem error hic ipsum inventore magni quibusdam odio voluptates rerum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores illo asperiores, atque a cupiditate, dignissimos similique possimus labore provident aut, voluptatem error hic ipsum inventore magni quibusdam odio voluptates rerum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores illo asperiores, atque a cupiditate, dignissimos similique possimus labore provident aut, voluptatem error hic ipsum inventore magni quibusdam odio voluptates rerum!',
            'nama' => 'Umar Faruq Syafar'
        ]);

        Landing::create([
            'gambar' => 'landing/halaman.png'
        ]);
        Landing::create([
            'gambar' => 'landing/halaman1.png'
        ]);
        Landing::create([
            'gambar' => 'landing/halaman2.png'
        ]);
        Landing::create([
            'gambar' => 'landing/halaman3.png'
        ]);
        Landing::create([
            'gambar' => 'landing/halaman4.png'
        ]);
        Landing::create([
            'gambar' => 'landing/halaman5.png'
        ]);

        Prestasi::create([
            'jenis' => 'sekolah',
            'judul' => 'Prestasi Sekolah',
            'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.'
        ]);

        Prestasi::create([
            'jenis' => 'siswa',
            'judul' => 'Prestasi Siswa',
            'isi' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione perspiciatis enim quae itaque error voluptatibus eum, vel laudantium eos asperiores totam amet doloribus animi eaque corrupti saepe sequi. Expedita quo mollitia laboriosam architecto at voluptatum tenetur molestiae, harum perferendis quam corporis sint, soluta ea inventore, perspiciatis dolorem libero magnam velit eius animi totam maiores ut ad quas? Necessitatibus magnam, excepturi modi, recusandae fugit vitae eligendi libero molestiae optio reiciendis dolorum. At fugit optio hic atque vel rerum, quaerat velit fuga quia deleniti dolor accusantium corporis expedita qui placeat quidem itaque odio soluta ullam! Similique sed nihil necessitatibus qui eius blanditiis!'
        ]);

        Prestasi::create([
            'jenis' => 'Guru',
            'judul' => 'Prestasi Guru',
            'isi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.'
        ]);

        DokumenPrestasi::create([
            'prestasi_id' => 1,
            'gambar' => 'prestasi/halaman.png'
        ]);

        DokumenPrestasi::create([
            'prestasi_id' => 1,
            'gambar' => 'prestasi/halaman1.png'
        ]);

        Spp::create([
            'tingkat' => 'tk',
            'biaya' => 100000
        ]);

        Spp::create([
            'tingkat' => 'kb',
            'biaya' => 90000
        ]);

        Spp::create([
            'tingkat' => 'dc',
            'biaya' => 50000
        ]);

        Bulan::create([
            'bulan' => 'Juli'
        ]);
        Bulan::create([
            'bulan' => 'Agustus'
        ]);
        Bulan::create([
            'bulan' => 'September'
        ]);
        Bulan::create([
            'bulan' => 'Oktober'
        ]);
        Bulan::create([
            'bulan' => 'November'
        ]);
        Bulan::create([
            'bulan' => 'Desember'
        ]);
        Bulan::create([
            'bulan' => 'Januari'
        ]);
        Bulan::create([
            'bulan' => 'Februari'
        ]);
        Bulan::create([
            'bulan' => 'Maret'
        ]);
        Bulan::create([
            'bulan' => 'April'
        ]);
        Bulan::create([
            'bulan' => 'Mei'
        ]);
        Bulan::create([
            'bulan' => 'Juni'
        ]);

        RaportCapaian::create([
            'capaian' => 'Nilai Agama dan Budi Pekerti',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit eaque consequatur voluptas quidem, ducimus fugiat quaerat! Sapiente laboriosam possimus qui eos aliquid accusamus veritatis voluptatem excepturi expedita, praesentium reiciendis eveniet libero animi adipisci similique minus natus voluptas illo dolorem a cupiditate maxime? Agamavc'
        ]);
        
        RaportCapaian::create([
            'capaian' => 'Jati Diri',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit eaque consequatur voluptas quidem, ducimus fugiat quaerat! Sapiente laboriosam possimus qui eos aliquid accusamus veritatis voluptatem excepturi expedita, praesentium reiciendis eveniet libero animi adipisci similique minus natus voluptas illo dolorem a cupiditate maxime? Agamavc'
        ]);
        
        RaportCapaian::create([
            'capaian' => 'Dasar-dasar Literasi, Matematika, Sains, Teknologi, Rekayasa dan Seni',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit eaque consequatur voluptas quidem, ducimus fugiat quaerat! Sapiente laboriosam possimus qui eos aliquid accusamus veritatis voluptatem excepturi expedita, praesentium reiciendis eveniet libero animi adipisci similique minus natus voluptas illo dolorem a cupiditate maxime? Agamavc'
        ]);







        // User::create([
        //     'name' => 'Lauhul Machfud',
        //     'email' => 'luhulq@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);
        // User::factory(5)->create();
        // Category::create([
        //     'name' => 'Programming',
        //     'slug' => 'programming'
        // ]);
        // Category::create([
        //     'name' => 'Web Design',
        //     'slug' => 'webdesign'
        // ]);
        // Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);
        // Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'pertama',
        //     'exerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto, eos ipsam accusamus atque cum doloremque ea. Architecto debitis delectus soluta error. Quae eius provident reprehenderit sunt, pariatur nisi corrupti incidunt unde!',
        //     'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto, eos ipsam accusamus atque cum doloremque ea. Architecto debitis delectus soluta error. Quae eius provident reprehenderit sunt, pariatur nisi corrupti incidunt unde! Nisi earum obcaecati, libero quis corporis temporibus laborum ipsum qui nobis sequi voluptate natus eaque iste repudiandae quos necessitatibus exercitationem perspiciatis asperiores quidem maiores possimus inventore? Cum veritatis voluptate aperiam nam perferendis magni itaque rerum totam quo corrupti? Exercitationem in est laborum nihil culpa.</p><p>Veritatis ullam fugiat, porro perspiciatis corrupti distinctio maxime molestias nesciunt. Quod, provident. Veniam minima, obcaecati laboriosam nemo laborum officiis nesciunt nihil fugit quod. Recusandae eos magni natus possimus iusto fugiat, sunt debitis impedit praesentium totam dolore doloremque nemo soluta illum quae nulla. Saepe deleniti labore eligendi cupiditate! A distinctio esse velit natus quia qui tempore, accusamus sit! Odio, veniam debitis porro voluptatem soluta inventore quas sunt, beatae quisquam aut dolor, deserunt maiores sit obcaecati excepturi.</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'kedua',
        //     'exerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto, eos ipsam accusamus atque cum doloremque ea. Architecto debitis delectus soluta error. Quae eius provident reprehenderit sunt, pariatur nisi corrupti incidunt unde!',
        //     'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto, eos ipsam accusamus atque cum doloremque ea. Architecto debitis delectus soluta error. Quae eius provident reprehenderit sunt, pariatur nisi corrupti incidunt unde! Nisi earum obcaecati, libero quis corporis temporibus laborum ipsum qui nobis sequi voluptate natus eaque iste repudiandae quos necessitatibus exercitationem perspiciatis asperiores quidem maiores possimus inventore? Cum veritatis voluptate aperiam nam perferendis magni itaque rerum totam quo corrupti? Exercitationem in est laborum nihil culpa.</p><p>Veritatis ullam fugiat, porro perspiciatis corrupti distinctio maxime molestias nesciunt. Quod, provident. Veniam minima, obcaecati laboriosam nemo laborum officiis nesciunt nihil fugit quod. Recusandae eos magni natus possimus iusto fugiat, sunt debitis impedit praesentium totam dolore doloremque nemo soluta illum quae nulla. Saepe deleniti labore eligendi cupiditate! A distinctio esse velit natus quia qui tempore, accusamus sit! Odio, veniam debitis porro voluptatem soluta inventore quas sunt, beatae quisquam aut dolor, deserunt maiores sit obcaecati excepturi.</p>',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'ketiga',
        //     'exerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto, eos ipsam accusamus atque cum doloremque ea. Architecto debitis delectus soluta error. Quae eius provident reprehenderit sunt, pariatur nisi corrupti incidunt unde!',
        //     'body' => '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto, eos ipsam accusamus atque cum doloremque ea. Architecto debitis delectus soluta error. Quae eius provident reprehenderit sunt, pariatur nisi corrupti incidunt unde! Nisi earum obcaecati, libero quis corporis temporibus laborum ipsum qui nobis sequi voluptate natus eaque iste repudiandae quos necessitatibus exercitationem perspiciatis asperiores quidem maiores possimus inventore? Cum veritatis voluptate aperiam nam perferendis magni itaque rerum totam quo corrupti? Exercitationem in est laborum nihil culpa.</p><p>Veritatis ullam fugiat, porro perspiciatis corrupti distinctio maxime molestias nesciunt. Quod, provident. Veniam minima, obcaecati laboriosam nemo laborum officiis nesciunt nihil fugit quod. Recusandae eos magni natus possimus iusto fugiat, sunt debitis impedit praesentium totam dolore doloremque nemo soluta illum quae nulla. Saepe deleniti labore eligendi cupiditate! A distinctio esse velit natus quia qui tempore, accusamus sit! Odio, veniam debitis porro voluptatem soluta inventore quas sunt, beatae quisquam aut dolor, deserunt maiores sit obcaecati excepturi.</p>',
        //     'category_id' => 1,
        //     'user_id' => 2
        // ]);
    }
}
