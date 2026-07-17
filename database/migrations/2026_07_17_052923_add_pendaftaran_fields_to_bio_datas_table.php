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
        Schema::table('bio_datas', function (Blueprint $table) {

            $table->string('email')->unique()->after('nama');
            $table->string('nisn')->nullable()->after('email');
            $table->string('nik')->nullable()->after('nisn');

            $table->string('nama_ayah')->after('asal_sekolah');
            $table->string('nama_ibu')->after('nama_ayah');
            $table->string('no_hp')->after('nama_ibu');

            
            $table->string('tahun_ajaran')->after('no_hp');

            $table->string('foto_kk')->nullable()->after('tahun_ajaran');
            $table->string('sertifikat')->nullable()->after('foto_kk');

            $table->enum('status', [
                'Menunggu',
                'Diterima',
                'Ditolak'
            ])->default('Menunggu')->after('sertifikat');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bio_datas', function (Blueprint $table) {

            $table->dropColumn([
                'email',
                'nisn',
                'nik',
                'nama_ayah',
                'nama_ibu',
                'no_hp',
                'tahun_ajaran',
                'foto_kk',
                'sertifikat',
                'status',
            ]);

        });
    }
};