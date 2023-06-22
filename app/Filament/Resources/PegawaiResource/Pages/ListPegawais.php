<?php

namespace App\Filament\Resources\PegawaiResource\Pages;

use Filament\Pages\Actions;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\PegawaiResource;

class ListPegawais extends ListRecords
{
    protected static string $resource = PegawaiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('import')
                ->label('Import')
                ->icon('heroicon-o-cloud-arrow-up')
                ->action('importData')
                ->modalHeading('Import Data Pegawai')
                ->form([
                    FileUpload::make('file-import')
                        ->preserveFilenames()
                        ->directory('file-import'),
                ])
                ->modalButton('Import'),
           
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    public function importData(){
        
    }
}
