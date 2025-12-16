<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Zona;

class ZonaSeeder extends Seeder
{
    public function run(): void
    {
        Zona::create([
            'nama' => 'Lobby Utama',
            'polygon' => '369,81,363,177,463,179,460,82',
            'rating_agg' => 0,
        ]);
    }
}
