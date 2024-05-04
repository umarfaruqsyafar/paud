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
        Schema::create('raport_tambahan_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id');
            $table->string('sakit')->nullable();
            $table->string('izin')->nullable();
            $table->string('alpa')->nullable();
            $table->string('gigi')->nullable();
            $table->string('kerapihan')->nullable();
            $table->string('kebersihan')->nullable();
            $table->string('pesan')->nullable();
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
        Schema::dropIfExists('raport_tambahan_siswas');
    }
};
