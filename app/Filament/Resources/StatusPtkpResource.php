<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\StatusPtkp;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Tables\Columns\CurrencyColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StatusPtkpResource\Pages;
use App\Filament\Resources\StatusPtkpResource\RelationManagers;

class StatusPtkpResource extends Resource
{
    protected static ?string $model = StatusPtkp::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $modelLabel = "Daftar Status P T K P";
    
    protected static ?string $navigationLabel = "Status PTKP";

    protected static ?string $navigationGroup = 'Data Referensi';
    
    protected static ?int $navigationSort = 2;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode')
                    ->searchable(),
                TextColumn::make('status_kawin')
                    ->searchable(),
                IconColumn::make('gbg_penghasilan')
                    ->label("Penghasilan Digabung")
                    ->boolean(),
                TextColumn::make('jmlh_tanggungan')
                    ->searchable()
                    ->extraCellAttributes(['class' => 'w-px']),
                CurrencyColumn::make('tarifPtkp'),
            ])
            ->poll('10s')
            ->filters([
                // Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
                // Tables\Actions\ForceDeleteAction::make(),
                // Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
                // Tables\Actions\ForceDeleteBulkAction::make(),
                // Tables\Actions\RestoreBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageStatusPtkps::route('/'),
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
