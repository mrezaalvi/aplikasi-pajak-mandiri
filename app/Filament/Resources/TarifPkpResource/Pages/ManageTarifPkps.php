<?php

namespace App\Filament\Resources\TarifPkpResource\Pages;

use App\Filament\Resources\TarifPkpResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTarifPkps extends ManageRecords
{
    protected static string $resource = TarifPkpResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
