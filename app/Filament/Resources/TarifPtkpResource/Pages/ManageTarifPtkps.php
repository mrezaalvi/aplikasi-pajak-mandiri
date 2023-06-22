<?php

namespace App\Filament\Resources\TarifPtkpResource\Pages;

use App\Filament\Resources\TarifPtkpResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTarifPtkps extends ManageRecords
{
    protected static string $resource = TarifPtkpResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
