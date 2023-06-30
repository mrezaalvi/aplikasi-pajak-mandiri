<?php

namespace App\Filament\Resources\PenghasilanPegawaiResource\Pages;

use Filament\Pages\Actions;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\PenghasilanPegawaiResource;

class EditPenghasilanPegawai extends EditRecord
{
    protected static string $resource = PenghasilanPegawaiResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\ViewAction::make(),
            // Actions\DeleteAction::make(),
            // Actions\ForceDeleteAction::make(),
            // Actions\RestoreAction::make(),
            Action::make('Kembali')
                ->url($this->getResource()::getUrl('index')),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
