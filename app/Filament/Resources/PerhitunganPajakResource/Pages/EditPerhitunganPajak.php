<?php

namespace App\Filament\Resources\PerhitunganPajakResource\Pages;

use App\Filament\Resources\PerhitunganPajakResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPerhitunganPajak extends EditRecord
{
    protected static string $resource = PerhitunganPajakResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            // Actions\DeleteAction::make(),
        ];
    }
}
