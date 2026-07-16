<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pelaporan_pengajar extends Model
{
    protected $fillable = [
        'nama_pengajar',
        'mata_pelajaran',
        'materi',
        'tanggal',
        'foto_bukti',
    ];
}