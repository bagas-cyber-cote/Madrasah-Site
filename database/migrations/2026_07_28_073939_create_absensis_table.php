<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('absensis', function (Blueprint $table) {

            $table->id();


            // Guru yang membuat absensi
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();


            // Kelas yang dipilih guru
            $table->foreignId('kelas_id')
                ->constrained('kelas')
                ->cascadeOnDelete();


            // Mata pelajaran
            $table->string('mata_pelajaran');


            // Jam pelajaran
            $table->string('jam_pelajaran');


            // Materi yang diajarkan
            $table->text('materi');


            // Tanggal absensi
            $table->date('tanggal');


            $table->timestamps();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }

};
