<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->integer('status');
            $table->string('nama');
            $table->string('panggilan');
            $table->string('tingkat');
            $table->string('jk');
            $table->string('nik')->unique();
            $table->string('nis')->nullable();
            $table->string('nisn')->nullable();
            $table->string('anak_ke');
            $table->string('tempat');
            $table->date('lahir');
            $table->string('alamat');
            $table->string('desa');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('nama_ibu');
            $table->string('pdd_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('agama_ibu');
            $table->string('no_ibu');
            $table->string('nama_ayah')->nullable();
            $table->string('pdd_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('agama_ayah')->nullable();
            $table->string('no_ayah')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
};
