<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pelaporan_pengajar extends Model
{
   protected $fillable = [
    'user_id',
    'nama_pengajar',
    'mata_pelajaran',
    'kelas',
    'materi',
    'tanggal',
    'foto_bukti',
];
}