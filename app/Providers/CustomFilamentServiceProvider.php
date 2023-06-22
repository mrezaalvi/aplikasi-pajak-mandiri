<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\FilamentServiceProvider;
use Illuminate\Support\ServiceProvider;

class CustomFilamentServiceProvider extends FilamentServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            // Using Vite
            Filament::registerViteTheme('resources/css/filament.css');
            Filament::registerNavigationGroups(['Manajemen Perusahaan', 'Manajemen Pengguna', 'Data Referensi',]);
        });

        Filament::registerNavigationGroups([
            'Manajemen Perusahaan',
            'Data Referensi',
            'Manajemen Pengguna',
        ]);

        Filament::registerScripts([
            asset('js/my-script.js'),
        ]);
         
        Filament::registerStyles([
            'https://unpkg.com/tippy.js@6/dist/tippy.css',
            asset('css/my-styles.css'),
        ]);
    }
}
