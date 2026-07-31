<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    protected $fillable = [
        'kelas',
        'guru',
        'mata_pelajaran',
        'hari',
        'jam_mulai',
        'jam_selesai',
    ];
}
