<?php

namespace App\Filament\Resources\PerusahaanResource\Pages;

use App\Filament\Resources\PerusahaanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPerusahaan extends EditRecord
{
    protected static string $resource = PerusahaanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
