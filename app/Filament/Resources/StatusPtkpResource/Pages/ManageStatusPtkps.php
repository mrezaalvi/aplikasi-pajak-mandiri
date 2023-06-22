<?php

namespace App\Filament\Resources\StatusPtkpResource\Pages;

use App\Filament\Resources\StatusPtkpResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageStatusPtkps extends ManageRecords
{
    protected static string $resource = StatusPtkpResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
