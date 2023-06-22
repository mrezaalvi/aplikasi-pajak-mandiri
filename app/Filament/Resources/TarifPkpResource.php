<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\TarifPkp;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Toggle;
use App\Tables\Columns\CurrencyColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\TextInput\Mask;
use App\Filament\Resources\TarifPkpResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TarifPkpResource\RelationManagers;

class TarifPkpResource extends Resource
{
    protected static ?string $model = TarifPkp::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    
    protected static ?string $navigationLabel = "Tarif PKP";

    protected static ?string $navigationGroup = 'Data Referensi';
    
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('index')
                    ->dehydrated(),
                    TextInput::make('batas_min')
                        ->required()
                        ->mask(fn (Mask $mask) => $mask
                            ->patternBlocks([
                                'money' => fn (Mask $mask) => $mask
                                    ->numeric()
                                    ->thousandsSeparator('.')
                                    ->decimalSeparator(',')
                                    ->mapToDecimalSeparator(['.'])
                                    ->padFractionalZeros()
                                    ->normalizeZeros(false)
                                    ->signed(false),
                            ])->pattern('money'),
                        )
                        ,
                    TextInput::make('batasMaks')
                        ->disabled()
                        ->mask(fn (Mask $mask) => $mask
                            ->patternBlocks([
                                'money' => fn (Mask $mask) => $mask
                                    ->numeric()
                                    ->thousandsSeparator('.')
                                    ->decimalSeparator(',')
                                    ->padFractionalZeros()
                                    ->normalizeZeros(false)
                                    ->signed(false),
                            ])->pattern('money'),
                        )->disabled(),
                    TextInput::make('persen_tarif')
                        ->required(),
                    Toggle::make('gunakan')
                        ->required(),
                ]),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index'),
                CurrencyColumn::make('batas_min'),
                CurrencyColumn::make('batas_maks')
                    // ->formatStateUsing(
                    //     fn (string $state): string => ($state)?(number_format($state,2,",",".")):""
                    // )
                    ,
                // TextColumn::make('batas_maks'),
                TextColumn::make('persen_tarif'),
                IconColumn::make('gunakan')
                    ->label('Digunakan')
                    ->boolean(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbaharui tanggal')
                    ->dateTime('d/m/Y'),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                // 
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTarifPkps::route('/'),
        ];
    }    
}
