<?php

namespace App\Filament\Resources\PegawaiResource\Pages;

use Filament\Pages\Actions;
use Filament\Pages\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\PegawaiResource;

class ViewPegawai extends ViewRecord
{
    protected static string $resource = PegawaiResource::class;
    
    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
            Action::make('Kembali')
                ->url($this->getRedirectUrl()),
            ];
        }
        
        protected function getRedirectUrl(): string
        {
            return $this->getResource()::getUrl('index');
        }
    }
