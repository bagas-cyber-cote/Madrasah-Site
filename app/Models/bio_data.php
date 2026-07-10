<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class bio_data extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'asal_sekolah',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
