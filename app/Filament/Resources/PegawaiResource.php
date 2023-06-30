<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Negara;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Filament\Pages\Page;
use App\Models\StatusPtkp;
use Filament\Resources\Form;
use App\Models\KabupatenKota;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\CreateRecord;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\RestoreBulkAction;
use App\Filament\Resources\PegawaiResource\Pages;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PegawaiResource\RelationManagers;

class PegawaiResource extends Resource
{
    protected static ?string $model = Pegawai::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $modelLabel = "Daftar Pegawai";
    
    protected static ?string $navigationLabel = "Data Pegawai";

    protected static ?string $navigationGroup = 'Manajemen Perusahaan';
    
    protected static ?int $navigationSort = 1;

    protected static ?string $slug = 'pegawai';

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('nip')
                        ->label('NIP')
                        // ->extraInputAttributes(['readonly' => false])
                        ->disabledOn('edit'),
                    TextInput::make('nama')
                        ->label('Nama')
                        ->autofocus()
                        ->required(),
                    TextInput::make('npwp')
                        ->label('NPWP')
                        ->mask(
                            fn (TextInput\Mask $mask) => $mask->pattern('00.000.000.0-000.000')
                            ->lazyPlaceholder()
                            )
                        ->required()
                        ->maxLength(30),
                    TextInput::make('nik')
                        ->label('NIK')
                        ->maxLength(16)
                        ->required(),
                    Select::make('status_pegawai')
                        ->label('Status Pegawai')
                        ->options([
                            'tetap' => 'Tetap',
                            'tidak tetap' => 'Tidak Tetap',
                        ])->required(),
                    Select::make('jabatan_id')
                        ->label('Jabatan')
                        // ->relationship('jabatan', 'nama_jabatan')
                        ->options(Jabatan::all()->pluck( 'nama_jabatan','id'))
                        ->preload()
                        ->searchable(),
                    Select::make('status_ptkp_id')
                        ->label('Status PTKP')
                        // ->relationship('statusPtkp', 'kode')
                        ->preload()
                        ->searchable()
                        ->options(StatusPtkp::all()->pluck( 'kode','id'))
                        ->required(),
                    
                    Select::make('jenis_kelamin')
                        ->label('Jenis Kelamin')
                        ->options([
                            'laki-laki' => 'Laki-laki',
                            'perempuan' => 'Perempuan',
                        ])->required(),
                    TextInput::make('alamat')
                        ->label('Alamat'),
                    Select::make('kabupaten_kota_id')
                        ->label('Kota')
                        // ->relationship('kabupatenKota', 'nama')
                        ->options(KabupatenKota::all()->pluck( 'nama','id'))
                        ->preload()
                        ->searchable()
                        ->required(),
                    Select::make('keterangan_evaluasi')
                        ->label('Keterangan Evaluasi')
                        // ->extraInputAttributes(['readonly'=>false])
                        ->disabledOn('create')
                        ->options([
                            'normal/aktif' => "Normal/Aktif",
                            'meninggal_dunia' => 'Meninggal Dunia',
                            'keluar' => 'Keluar'
                        ])
                        ->default('normal/aktif'),
                    Select::make('negara_id')
                        ->label('Negara')
                        // ->relationship('negara', 'nama')
                        ->options(Negara::all()->pluck('nama', 'id'))
                        ->preload()
                        ->searchable()
                        ->required(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nip')
                    ->label('NIP')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('nama')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('status_pegawai')
                    ->label('Status Pegawai')
                    ->enum([
                        'tetap' => 'Tetap',
                        'tidak tetap' => 'Tidak Tetap',
                        'published' => 'Published',
                    ])
                    ->sortable()
                    ->searchable(),
                TextColumn::make('statusPtkp.kode')
                    ->label('Status PTKP')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('npwp')
                    ->label('NPWP')
                    ->sortable()
                    ->searchable(),
            ])
            ->defaultSort('nip')
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                    ForceDeleteAction::make(),
                    RestoreAction::make(),    
                ]),
                
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
                ForceDeleteBulkAction::make(),
                RestoreBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPegawais::route('/'),
            'create' => Pages\CreatePegawai::route('/create'),
            'view' => Pages\ViewPegawai::route('/{record}'),
            'edit' => Pages\EditPegawai::route('/{record}/edit'),
        ];
    }    

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
