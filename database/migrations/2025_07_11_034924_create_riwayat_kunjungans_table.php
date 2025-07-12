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
        Schema::create('riwayat_kunjungans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->unsignedBigInteger('petugas_id');            
            $table->date('tanggal');
            $table->text('keluhan');
            $table->text('tindakan');            
            $table->timestamps();
            $table->foreign('siswa_id')->references('user_id')->on('siswas')->onDelete('cascade');
            $table->foreign('petugas_id')->references('id')->on('petugas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_kunjungans');
    }
};
