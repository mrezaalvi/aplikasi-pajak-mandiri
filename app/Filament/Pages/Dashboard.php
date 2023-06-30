<?php

namespace App\Filament\Pages;

use App\Models\Perusahaan;
use Illuminate\Support\Str;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
 
    protected function getHeading(): string
    {
        // $company = config('app.name');
        $company = Perusahaan::all('nama_perusahaan')->first()->nama_perusahaan;
        return Str::upper("Pajak Mandiri - {$company}");
    }
}
