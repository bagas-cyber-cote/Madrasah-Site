<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil_Sekolah extends Model
{
    protected $table = 'profil__sekolahs';

    protected $fillable = [
        'nama_sekolah',
        'history',
        'alamat',
        'email',
        'no_telp',
        'kepala_sekolah',
    ];
}
