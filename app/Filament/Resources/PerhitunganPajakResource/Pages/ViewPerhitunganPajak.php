<?php

namespace App\Filament\Resources\PerhitunganPajakResource\Pages;

use App\Filament\Resources\PerhitunganPajakResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPerhitunganPajak extends ViewRecord
{
    protected static string $resource = PerhitunganPajakResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
