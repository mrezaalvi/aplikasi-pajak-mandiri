<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\KppPajak;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\RestoreBulkAction;
use App\Filament\Resources\KppPajakResource\Pages;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KppPajakResource\RelationManagers;

class KppPajakResource extends Resource
{
    protected static ?string $model = KppPajak::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $modelLabel = "Daftar Kantor Pelayanan Pajak";
    
    protected static ?string $navigationLabel = "Data KPP";

    protected static ?string $navigationGroup = 'Data Referensi';
    
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
                    TextInput::make('kode')
                        ->id('kode-field')
                        ->label('Kode')
                        ->required()
                        ->maxLength(10)
                        ->autofocus(),
                    TextInput::make('nama')
                        ->required()
                        ->maxLength(150),
                    TextInput::make('alamat')
                        ->maxLength(255),
                ]),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode')
                    ->label('Kode')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('nama')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(),
            ])->defaultSort('kode')
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
                ForceDeleteAction::make(),
                RestoreAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
                ForceDeleteBulkAction::make(),
                RestoreBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageKppPajaks::route('/'),
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
