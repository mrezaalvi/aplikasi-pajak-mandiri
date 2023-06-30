<?php

namespace App\Providers;

use Filament\Facades\Filament;
use App\Filament\Pages\UserProfile;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            // Using Vite
            Filament::registerViteTheme('resources/css/filament.css');

            
    
            Filament::registerUserMenuItems([
                UserMenuItem::make()
                    ->label('Profile Pengguna')
                    ->url(UserProfile::getUrl())
                    ->icon('heroicon-s-cog'),
                // ...
            ]);
        });

        Filament::registerNavigationGroups([
            'Manajemen Perusahaan',
            'Gaji Dan Pajak',
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
