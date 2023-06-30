<?php

namespace App\Filament\Resources\PegawaiResource\Pages;

use App\Models\Negara;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\StatusPtkp;
use Filament\Pages\Actions;
use Illuminate\Support\Str;
use App\Models\KabupatenKota;
use App\Imports\PegawaiImport;
use Filament\Pages\Actions\Action;
use Livewire\TemporaryUploadedFile;
use Maatwebsite\Excel\Facades\Excel;
use Filament\Forms\ComponentContainer;
use Konnco\FilamentImport\ImportField;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Actions\CreateAction;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\PegawaiResource;

class ListPegawais extends ListRecords
{
    protected static string $resource = PegawaiResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
            // Action::make('Import Data Pegawai')
            // ->action(function (array $data): void {
            //     $fileImport = $data["fileImport"];
            //     Excel::import(new PegawaiImport, $fileImport);

            //     $storage = Storage::disk('public');

            //     foreach($storage->files($path, $recursive) as $file) {
            //         $storage->delete($file);
            //     }
                
            //     Notification::make() 
            //         ->title('Proses Import Berhasil')
            //         ->success()
            //         ->body('Data Pegawai Berhasil DiImport.') 
            //         ->send();
            // })
            // ->form([
            //     FileUpload::make('fileImport')
            //     ->label('File Import')
            //     ->disk('local')
            //     ->directory('import-file')
            //     ->preserveFilenames()
            //     ->getUploadedFileNameForStorageUsing(
            //         function (TemporaryUploadedFile $file): string {
            //             return (string) str($file->getClientOriginalName())->prepend(now()->format('dmY-his')."-");
            //     })
            //     ->acceptedFileTypes(['application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'text/csv'])
            //     ->required(),
            // ])
            // ->modalButton('Import'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
