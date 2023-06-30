<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Pegawai;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\PerhitunganPajak;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use App\Tables\Columns\CurrencyColumn;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PerhitunganPajakResource\Pages;
use App\Filament\Resources\PerhitunganPajakResource\RelationManagers;

class PerhitunganPajakResource extends Resource
{
    protected static ?string $model = PerhitunganPajak::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    
    protected static ?string $modelLabel = "Daftar Hitung Pajak";
    
    protected static ?string $navigationLabel = "Hitung Pajak";
    
    protected static ?string $navigationGroup = 'Manajemen Perusahaan';
    
    protected static ?int $navigationSort = 4;

    protected static ?string $slug = 'hitung-pajak';
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Pegawai')
                    ->schema([
                        TextInput::make('tahun')
                            ->label("Tahun Penghasilan")
                            ->extraInputAttributes(['readonly'=>'true']),
                        TextInput::make('pegawai_nama')
                            ->label('Nama Pegawai')
                            ->extraInputAttributes(['readonly'=>'true'])
                            ->columnSpanFull(),
                        TextInput::make('status_ptkp')
                            ->label('Status PTKP')
                            ->extraInputAttributes(['readonly'=>'true']),
                        TextInput::make('awal_terima_gaji')
                            ->label('Nama Pegawai')
                            ->extraInputAttributes(['readonly'=>'true']),
                        TextInput::make('akhir_terima_gaji')
                            ->label('Nama Pegawai')
                            ->extraInputAttributes(['readonly'=>'true']),
                    ])->columns(2),
                
                Section::make('Penghasilan Pegawai')
                    ->schema([
                        TextInput::make('gaji_pokok_setahun')
                            ->label("Gaji Pokok Setahun/Disetahunkan")
                            ->extraInputAttributes(['readonly'=>'true', 'class'=>'text-right']),
                        TextInput::make('tunjangan_pph')
                            ->label('Tunjangan PPh')
                            ->extraInputAttributes(['readonly'=>'true', 'class'=>'text-right']),
                        TextInput::make('tunjangan_lain')
                            ->label('Tunjangan Lainnya')
                            ->extraInputAttributes(['readonly'=>'true', 'class'=>'text-right']),
                        TextInput::make('honorium')
                            ->label('Honorium/Sejenisnya')
                            ->extraInputAttributes(['readonly'=>'true', 'class'=>'text-right']),
                        TextInput::make('premi_asuransi')
                            ->label('Tunjangan Lainnya')
                            ->extraInputAttributes(['readonly'=>'true', 'class'=>'text-right']),
                        TextInput::make('natura_obyek')
                            ->label('Natura Obyek')
                            ->extraInputAttributes(['readonly'=>'true', 'class'=>'text-right']),
                        TextInput::make('penghasilan_tak_teratur')
                            ->label('Bonus/THR/Penghasilan Tak Teratur')
                            ->extraInputAttributes(['readonly'=>'true', 'class'=>'text-right']),
                        TextInput::make('penghasilan_brutto')
                            ->label('Penghasilan Brutto')
                            ->extraInputAttributes(['readonly'=>'true', 'class'=>'text-right'])
                            ->columnSpanFull()
                            ->disabled(),

                        TextInput::make('iuran_pensium')
                            ->label('Iuran Pensiun')
                            ->extraInputAttributes(['class'=>'text-right']),
                        TextInput::make('biaya_jabatan_satu')
                            ->label('Biaya Jabatan 1')
                            ->extraInputAttributes(['readonly'=>'true', 'class'=>'text-right']),
                        TextInput::make('biaya_jabatan_dua')
                            ->label('Biaya Jabatan 2')
                            ->extraInputAttributes(['readonly'=>'true', 'class'=>'text-right']),

                        TextInput::make('total_pengurangan')
                            ->label('Total Pengurangan')
                            ->extraInputAttributes(['class'=>'text-right'])
                            ->disabled(),

                        
                        TextInput::make('penghasilan_netto')
                            ->label('Penghasilan Brutto')
                            ->extraInputAttributes(['readonly'=>'true', 'class'=>'text-right'])
                            ->columnSpanFull()
                            ->disabled(),
                        
                        TextInput::make('tarif_ptkp')
                            ->label('Tarif PTKP')
                            ->extraInputAttributes(['readonly'=>'true', 'class'=>'text-right'])
                            ->columnSpanFull()
                            ->disabled(),
                       
                        TextInput::make('penghasilan_kena_pajak')
                            ->label('Penghasilan Kena Pajak')
                            ->extraInputAttributes(['readonly'=>'true', 'class'=>'text-right'])
                            ->columnSpanFull()
                            ->disabled(),
                        
                        TextInput::make('pph_terutang')
                            ->label('PPh Terutang')
                            ->extraInputAttributes(['readonly'=>'true', 'class'=>'text-right'])
                            ->columnSpanFull()
                            ->disabled(),
                    ])->columns(3),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tahun')
                    ->date('Y'),
                TextColumn::make('pegawai.nama'),
                CurrencyColumn::make('penghasilan_brutto'),
                CurrencyColumn::make('penghasilan_netto'),
                CurrencyColumn::make('penghasilan_kena_pajak'),
                CurrencyColumn::make('pph_terutang'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPerhitunganPajaks::route('/'),
            'create' => Pages\CreatePerhitunganPajak::route('/create'),
            'view' => Pages\ViewPerhitunganPajak::route('/{record}'),
            'edit' => Pages\EditPerhitunganPajak::route('/{record}/edit'),
        ];
    }    
}
