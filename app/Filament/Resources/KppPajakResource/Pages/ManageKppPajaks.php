<?php

namespace App\Filament\Resources\KppPajakResource\Pages;

use App\Filament\Resources\KppPajakResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageKppPajaks extends ManageRecords
{
    protected static string $resource = KppPajakResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
