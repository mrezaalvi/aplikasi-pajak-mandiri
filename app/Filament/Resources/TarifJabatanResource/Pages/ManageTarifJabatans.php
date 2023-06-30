<?php

namespace App\Filament\Resources\TarifJabatanResource\Pages;

use App\Filament\Resources\TarifJabatanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTarifJabatans extends ManageRecords
{
    protected static string $resource = TarifJabatanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
