<?php

namespace App\Filament\Resources\PenghasilanPegawaiResource\Pages;

use App\Filament\Resources\PenghasilanPegawaiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPenghasilanPegawai extends ViewRecord
{
    protected static string $resource = PenghasilanPegawaiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
