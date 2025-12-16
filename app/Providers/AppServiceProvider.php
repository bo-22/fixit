<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Zona;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Zona::count() == 0) {
            Zona::create([
                'nama' => 'Lobby Utama',
                'polygon' => '369,81,363,177,463,179,460,82', // dari kamu
                'rating_agg' => 0
            ]);
    }}
}
