<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('detail_absensis', function (Blueprint $table) {

            $table->id();


            // Terhubung ke tabel absensis
            $table->foreignId('absensi_id')
                ->constrained('absensis')
                ->cascadeOnDelete();


            // Terhubung ke tabel siswas
            $table->foreignId('siswa_id')
                ->constrained('siswas')
                ->cascadeOnDelete();


            // Status kehadiran siswa
            $table->enum('status', [
                'Hadir',
                'Sakit',
                'Izin',
                'Tidak Hadir'
            ]);


            $table->timestamps();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('detail_absensis');
    }

};