<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bio_data extends Model
{
    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'asal_sekolah',
    ];
}
