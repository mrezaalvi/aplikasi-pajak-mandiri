<?php

namespace App\Filament\Resources\PenghasilanPegawaiResource\Pages;

use App\Filament\Resources\PenghasilanPegawaiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePenghasilanPegawai extends CreateRecord
{
    protected static string $resource = PenghasilanPegawaiResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
