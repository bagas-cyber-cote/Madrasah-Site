<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absensi extends Model
{

    protected $fillable = [
        'user_id',
        'kelas_id',
        'mata_pelajaran',
        'jam_pelajaran',
        'materi',
        'tanggal',
    ];


    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class);
    }


    public function guru(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}