<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pendaftaran extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'nisn',
        'nik',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'asal_sekolah',
        'nama_ayah',
        'nama_ibu',
        'no_hp',
        'foto_kk',
        'sertifikat',
        'status',
    ];
}
