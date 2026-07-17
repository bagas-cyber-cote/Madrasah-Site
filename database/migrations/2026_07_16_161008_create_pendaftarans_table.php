<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();

            // Data Pribadi
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('nisn')->nullable();
            $table->string('nik')->nullable();
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->text('alamat');
            $table->string('asal_sekolah');

            // Data Orang Tua
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('no_hp');

            // Berkas
            $table->string('foto_kk')->nullable();
            $table->string('sertifikat')->nullable();

            // Status Pendaftaran
            $table->enum('status', ['Menunggu', 'Diterima', 'Ditolak'])
                  ->default('Menunggu');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
