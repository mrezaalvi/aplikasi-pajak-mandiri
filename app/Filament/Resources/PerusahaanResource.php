<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Perusahaan;
use Filament\Resources\Form;
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
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PerusahaanResource\Pages;
use App\Filament\Resources\PerusahaanResource\RelationManagers;

class PerusahaanResource extends Resource
{
    protected static ?string $model = Perusahaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $modelLabel = "Daftar Perusahaan";
    
    protected static ?string $navigationLabel = "Data Perusahaan";

    protected static ?string $navigationGroup = 'Manajemen Perusahaan';
    
    protected static ?int $navigationSort = -1;

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
                    TextInput::make('nama_perusahaan')
                        ->id('name-field')
                        ->label('Nama Perusahaan/Pemotong')
                        ->required()
                        ->maxLength(150)
                        ->autofocus(),
                    TextInput::make('npwp_perusahaan')
                        ->label("NPWP Perusahaan")
                        ->required()
                        ->mask(
                            fn (TextInput\Mask $mask) => $mask->pattern('00.000.000.0-000.000')
                                ->lazyPlaceholder(false)
                        )
                        ->maxLength(30),
                    TextInput::make('alamat_perusahaan')
                        ->maxLength(255)
                        ->columnSpanFull(),
                    Select::make('kabupaten_kota_id')
                        ->relationship('kabupatenKota', 'nama')
                        ->preload()
                        ->searchable()
                        ->required(),
                    Select::make('kpp_pajak_id')
                        ->label('Lokasi KPP')
                        ->relationship('kppPajak', 'nama')
                        ->preload()
                        ->searchable()
                        ->required(),
                    TextInput::make('no_telp')
                        ->tel()
                        ->mask(fn (TextInput\Mask $mask) => $mask->pattern('0000-0000-0000-00'))
                        ->required()
                        ->maxLength(30),
                    TextInput::make('nama_penandatangan')
                        ->label('Nama Penandatangan')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('npwp_penandatangan')
                        ->label('NPWP Penandatangan')
                        ->required()
                        ->maxLength(255),
                ]),                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_perusahaan')
                    ->label('Nama Perusahaan/Pemotong')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('kabupatenKota.nama')
                    ->label('Kota WP')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('kppPajak.nama')
                    ->label('KPP WP')
                    ->sortable()
                    ->searchable(),
            ])->defaultSort('nama_perusahaan')
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
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPerusahaans::route('/'),
            'create' => Pages\CreatePerusahaan::route('/create'),
            'edit' => Pages\EditPerusahaan::route('/{record}/edit'),
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
