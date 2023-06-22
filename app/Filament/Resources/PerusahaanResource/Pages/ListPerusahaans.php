<?php

namespace App\Filament\Resources\PerusahaanResource\Pages;

use App\Filament\Resources\PerusahaanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPerusahaans extends ListRecords
{
    protected static string $resource = PerusahaanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'Tidak ditemukan data Perusahaan';
    }
}
