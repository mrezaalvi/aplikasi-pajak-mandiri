<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ProfilPerusahaan extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.profil-perusahaan';
    
    protected static ?string $navigationLabel = "Data Perusahaan";

    protected static ?string $navigationGroup = 'Manajemen Perusahaan';
    
    protected static ?int $navigationSort = -1;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

}
