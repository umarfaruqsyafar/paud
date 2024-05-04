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
        Schema::create('raport_awals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tendik_id');
            $table->string('usia')->nullable();
            $table->string('fase')->nullable();
            $table->string('semester')->nullable();
            $table->string('tahun')->nullable();
            $table->string('kurikulum')->nullable();
            $table->string('tanggal_raport')->nullable();
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
        Schema::dropIfExists('raport_awals');
    }
};
