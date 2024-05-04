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
        Schema::create('raport_kemunculans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tujuan_id');
            $table->foreignId('siswa_id');
            $table->string('ya');
            $table->string('tidak');
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
        Schema::dropIfExists('raport_kemunculans');
    }
};
