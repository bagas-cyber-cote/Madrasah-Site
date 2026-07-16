<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pelaporan_pengajars', function (Blueprint $table) {
            $table->id();

            $table->string('nama_pengajar');
            $table->string('mata_pelajaran');
            $table->text('materi');
            $table->date('tanggal');
            $table->string('foto_bukti')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelaporan_pengajars');
    }
};
