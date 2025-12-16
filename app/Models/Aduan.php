<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Aduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'zona_id',
        'gambar',
        'keterangan',
        'status',
        'bukti_selesai',
    ];

    // user yang membuat aduan
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // zona lokasi
    public function zona(): BelongsTo
    {
        return $this->belongsTo(Zona::class);
    }

    // ratings untuk aduan ini
    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }
}
