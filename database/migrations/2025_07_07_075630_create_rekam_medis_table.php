<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->date('tanggal');
            $table->text('keluhan');
            $table->string('tindakan');
            $table->foreignId('obat_id')->constrained('obats')->onDelete('cascade');
            $table->foreignId('petugas_id')->constrained('petugas')->onDelete('cascade');
            $table->enum('status', ['Berobat', 'Sembuh', 'Pulang']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rekam_medis');
    }
};
