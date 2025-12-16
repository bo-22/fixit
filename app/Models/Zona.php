<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Zona extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'polygon', // json area / coords
        'rating_agg',    // aggregate average (float)
    ];

    protected $casts = [
        'polygon' => 'array', 
    ];

    // relasi: zona punya banyak aduan
    public function aduan(): HasMany
    {
        return $this->hasMany(Aduan::class);
    }

    /**
     * Recalculate aggregate rating dari semua rating terkait aduan di zona ini.
     * Simpan ke kolom rating_agg (average, 0 jika tidak ada rating).
     */
    public function recalcRatingAggregate(): void
    {
        // kumpulkan semua rating value pada aduan yang berhubungan dengan zona ini
        $query = Rating::query()
            ->whereIn('aduan_id', $this->aduan()->pluck('id')->toArray());

        $count = $query->count();
        $sum = $query->sum('value');

        $avg = $count > 0 ? round($sum / $count, 2) : 0;

        $this->rating_agg = $avg;
        $this->save();
    }
}
