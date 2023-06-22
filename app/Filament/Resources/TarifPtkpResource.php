<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\TarifPtkp;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use App\Tables\Columns\CurrencyColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\RestoreAction;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use App\Filament\Resources\TarifPtkpResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TarifPtkpResource\RelationManagers;

class TarifPtkpResource extends Resource
{
    protected static ?string $model = TarifPtkp::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $modelLabel = "Daftar Tarif P T K P";
    
    protected static ?string $navigationLabel = "Tarif PTKP";

    protected static ?string $navigationGroup = 'Data Referensi';
    
    protected static ?int $navigationSort = 1;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Select::make('tahun_berlaku')
                        ->options(
                            array_combine(
                                range(date("Y")-10, date("Y")+5),
                                range(date("Y")-10, date("Y")+5)
                            )
                        )
                        ->searchable()
                        ->required(),
                    TextInput::make('tarif_penghasilan')
                        ->required()
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
                        ),

                    TextInput::make('tarif_tanggungan')
                        ->required()
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
                        ),
                    TextInput::make('keterangan')
                        ->maxLength(255),
                ]),
                
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tahun_berlaku')
                    ->sortable(query: function (Builder $query, string $direction='asc'):       Builder {
                        return $query->orderBy('tahun_berlaku', $direction);
                    })
                    ->searchable(),
                CurrencyColumn::make('tarif_penghasilan'),
                CurrencyColumn::make('tarif_tanggungan'),
            ])
            ->defaultSort('tahun_berlaku', 'desc')
            ->filters([
                Tables\Filters\TrashedFilter::make(),
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
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTarifPtkps::route('/'),
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
