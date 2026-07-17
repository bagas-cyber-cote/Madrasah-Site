<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class bio_data extends Model
{
    protected $fillable = [
        'user_id',
        'foto',
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
        'tahun_ajaran',
        'foto_kk',
        'sertifikat',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
