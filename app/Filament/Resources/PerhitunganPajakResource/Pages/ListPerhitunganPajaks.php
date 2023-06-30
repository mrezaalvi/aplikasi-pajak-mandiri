<?php

namespace App\Filament\Resources\PerhitunganPajakResource\Pages;

use Filament\Pages\Actions;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\PerhitunganPajakResource;

class ListPerhitunganPajaks extends ListRecords
{
    protected static string $resource = PerhitunganPajakResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
            // Action::make('hitungPajak')
            //     ->label('Hitung Pajak')
            //     ->icon('heroicon-o-calculator'),
        ];
    }
}
