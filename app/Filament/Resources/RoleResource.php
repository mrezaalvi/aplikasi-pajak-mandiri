<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Spatie\Permission\Models\Role;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\RoleResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RoleResource\RelationManagers;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $modelLabel = "Daftar Batasan Akses";
    
    protected static ?string $navigationLabel = "Batasan Pengguna";

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Manajemen Pengguna';

    protected static ?int $navigationSort = 2;

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\TextInput::make('name')
                        ->name('Nama')
                        ->required()
                        ->maxLength(255),
                    Select::make('permissions')
                        ->label('Nama Batasan Akses')
                        ->multiple()
                        ->relationship('permissions', 'name')
                        ->preload()
                        ->searchable(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama'),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->label('Dibuat tanggal')
                //     ->dateTime('d M Y'),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),            
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageRoles::route('/'),
        ];
    }    
}
