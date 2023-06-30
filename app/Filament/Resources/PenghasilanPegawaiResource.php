<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Pegawai;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Models\PenghasilanPegawai;
use Filament\Forms\Components\Select;
use App\Tables\Columns\CurrencyColumn;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\TextInput\Mask;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PenghasilanPegawaiResource\Pages;
use App\Filament\Resources\PenghasilanPegawaiResource\RelationManagers;

class PenghasilanPegawaiResource extends Resource
{
    protected static ?string $model = PenghasilanPegawai::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    
    protected static ?string $modelLabel = "Daftar Penghasilan Pegawai";
    
    protected static ?string $navigationLabel = "Penghasilan Pegawai";
    
    protected static ?string $navigationGroup = 'Manajemen Perusahaan';
    
    protected static ?int $navigationSort = 3;

    protected static ?string $slug = 'penghasilan-pegawai';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Section::make('Informasi Pegawai')
            ->schema([
                TextInput::make('tahun')
                    ->label("Tahun Penghasilan")
                    ->extraInputAttributes(['readonly'=>'true'])
                    // ->default(now()->format('Y'))
                    ->required(),
                TextInput::make('pegawai_nama')
                    ->label('Nama Pegawai')
                    ->extraInputAttributes(['readonly'=>'true'])
                    ->columnSpanFull()
                    ->required(),
                Select::make('bulan_awal_terima_gaji')
                    ->options([
                        'januari' => 'Januari',
                        'februari' => 'Februari',
                        'maret' => 'Maret',
                        'april' => 'April',
                        'mei' => 'Mei',
                        'juni' => 'Juni',
                        'juli' => 'Juli',
                        'agustus' => 'Agustus',
                        'september' => 'September',
                        'oktober' => 'Oktober',
                        'november' => 'November',
                        'desember' => 'Desember',
                        ])->default('januari'),
                Select::make('bulan_akhir_terima_gaji')
                    ->options([
                        'januari' => 'Januari',
                        'februari' => 'Februari',
                        'maret' => 'Maret',
                        'april' => 'April',
                        'mei' => 'Mei',
                        'juni' => 'Juni',
                        'juli' => 'Juli',
                        'agustus' => 'Agustus',
                        'september' => 'September',
                        'oktober' => 'Oktober',
                        'november' => 'November',
                        'desember' => 'Desember',
                        ])->default('desember'),
                ])->columns(2),
                            
            Section::make('Gaji dan Tunjangan')
                ->schema([
                    TextInput::make('gaji_pokok_setahun')
                        ->label('GAJI / PENSIUN ATAU THT / JHT (setahun/disetahunkan)')
                        ->extraInputAttributes(['class'=>'text-right'])
                        ->mask(fn (Mask $mask) => $mask
                        ->patternBlocks([
                            'money' => fn (Mask $mask) => $mask
                            ->numeric()
                            ->thousandsSeparator('.')
                            ->decimalSeparator(',')
                            ->mapToDecimalSeparator([','])
                            ->padFractionalZeros()
                            ->normalizeZeros(false)
                            ->signed(false),
                            ])->pattern('money'),
                        ),
                    TextInput::make('tunjangan_pph')
                        ->label('TUNJANGAN PPH PPh')
                        ->extraInputAttributes(['class'=>'text-right'])
                        ->mask(fn (Mask $mask) => $mask
                        ->patternBlocks([
                            'money' => fn (Mask $mask) => $mask
                            ->numeric()
                            ->thousandsSeparator('.')
                            ->decimalSeparator(',')
                            ->mapToDecimalSeparator([','])
                            ->padFractionalZeros()
                            ->normalizeZeros(false)
                            ->signed(false),
                            ])->pattern('money'),
                        ),
                    TextInput::make('tunjangan_lain')
                        ->label('TUNJANGAN LAINNYA')
                        ->extraInputAttributes(['class'=>'text-right'])
                        ->mask(fn (Mask $mask) => $mask
                        ->patternBlocks([
                            'money' => fn (Mask $mask) => $mask
                            ->numeric()
                            ->thousandsSeparator('.')
                            ->decimalSeparator(',')
                            ->mapToDecimalSeparator([','])
                            ->padFractionalZeros()
                            ->normalizeZeros(false)
                            ->signed(false),
                            ])->pattern('money'),
                        ),
                    TextInput::make('honorium')
                        ->label('HONARIUM / SEJENISNYA')
                        ->extraInputAttributes(['class'=>'text-right'])
                        ->mask(fn (Mask $mask) => $mask
                        ->patternBlocks([
                            'money' => fn (Mask $mask) => $mask
                            ->numeric()
                            ->thousandsSeparator('.')
                            ->decimalSeparator(',')
                            ->mapToDecimalSeparator([','])
                            ->padFractionalZeros()
                            ->normalizeZeros(false)
                            ->signed(false),
                            ])->pattern('money'),
                        ),
                    TextInput::make('premi_asuransi')
                        ->label('PREMI ASURANSI')
                        ->extraInputAttributes(['class'=>'text-right'])
                        ->mask(fn (Mask $mask) => $mask
                        ->patternBlocks([
                            'money' => fn (Mask $mask) => $mask
                            ->numeric()
                            ->thousandsSeparator('.')
                            ->decimalSeparator(',')
                            ->mapToDecimalSeparator([','])
                            ->padFractionalZeros()
                            ->normalizeZeros(false)
                            ->signed(false),
                            ])->pattern('money'),
                        ),
                    TextInput::make('natura_obyek')
                        ->label('NATURA OBYEK PPH 21')
                        ->extraInputAttributes(['class'=>'text-right'])
                        ->mask(fn (Mask $mask) => $mask
                        ->patternBlocks([
                            'money' => fn (Mask $mask) => $mask
                            ->numeric()
                            ->thousandsSeparator('.')
                            ->decimalSeparator(',')
                            ->mapToDecimalSeparator([','])
                            ->padFractionalZeros()
                            ->normalizeZeros(false)
                            ->signed(false),
                            ])->pattern('money'),
                        ),
                    TextInput::make('penghasilan_tak_teratur')
                        ->label('BONUS / THR / PENGH. TIDAK TERATUR')
                        ->extraInputAttributes(['class'=>'text-right'])
                        ->mask(fn (Mask $mask) => $mask
                        ->patternBlocks([
                            'money' => fn (Mask $mask) => $mask
                                ->numeric()
                                ->thousandsSeparator('.')
                                ->decimalSeparator(',')
                                ->mapToDecimalSeparator([','])
                                ->padFractionalZeros()
                                ->normalizeZeros(false)
                                ->signed(false),
                                ])->pattern('money'),
                        ),
                ])->columns(2),
            Section::make('Iuran dan Biaya')
                ->schema([
                    TextInput::make('iuran_pensiun')
                        ->label('IURAN PENSIUN/ THT/JHT')
                        ->extraInputAttributes(['class'=>'text-right'])
                        ->mask(fn (Mask $mask) => $mask
                        ->patternBlocks([
                            'money' => fn (Mask $mask) => $mask
                            ->numeric()
                            ->thousandsSeparator('.')
                            ->decimalSeparator(',')
                            ->mapToDecimalSeparator([','])
                            // ->padFractionalZeros()
                            ->normalizeZeros(false)
                            ->signed(false),
                            ])->pattern('money'),
                        ),
                    TextInput::make('biaya_jabatan_satu')
                        ->label('BIAYA JABATAN 1')
                        ->extraInputAttributes(['class'=>'text-right', 'readonly' => true])
                        // ->extraInputAttributes(['class'=>'text-right'])
                        ->mask(fn (Mask $mask) => $mask
                        ->patternBlocks([
                            'money' => fn (Mask $mask) => $mask
                            ->numeric()
                            ->thousandsSeparator('.')
                            ->decimalSeparator(',')
                            ->mapToDecimalSeparator([','])
                            ->padFractionalZeros()
                            ->normalizeZeros(false)
                            ->signed(false),
                            ])->pattern('money'),
                        ),
                    TextInput::make('biaya_jabatan_dua')
                        ->extraInputAttributes(['class'=>'text-right', 'readonly' => true])
                        // ->extraInputAttributes(['class'=>'text-right'])
                        ->mask(fn (Mask $mask) => $mask
                        ->patternBlocks([
                            'money' => fn (Mask $mask) => $mask
                            ->numeric()
                            ->thousandsSeparator('.')
                            ->decimalSeparator(',')
                            ->mapToDecimalSeparator([','])
                            ->padFractionalZeros()
                            ->normalizeZeros(false)
                            ->signed(false),
                            ])->pattern('money'),
                        ),
                ])->columns(2),
                                        
                                        
            ]);
    }
                                
    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('tahun')
            ->date('Y'),
            Tables\Columns\TextColumn::make('pegawai.nama'),
            // Tables\Columns\TextColumn::make('gaji_pokok_setahun'),
            CurrencyColumn::make('penghasilan_teratur')
                ->label('Penghasilan Teratur'),
            CurrencyColumn::make('penghasilan_tak_teratur')
                ->label('Penghasilan Tak Teratur'),
            // Tables\Columns\TextColumn::make('gaji_brutto')->sum('penghasilan_pegawai',),
            // Tables\Columns\TextColumn::make('tunjangan_pph'),
            // Tables\Columns\TextColumn::make('tunjangan_lain'),
            // Tables\Columns\TextColumn::make('honorium'),
            // Tables\Columns\TextColumn::make('premi_asuransi'),
            // Tables\Columns\TextColumn::make('natura_obyek'),
            // Tables\Columns\TextColumn::make('penghasilan_tak_teratur'),
            // Tables\Columns\TextColumn::make('iuran_pensiun'),
            // Tables\Columns\TextColumn::make('biaya_jabatan_satu'),
            // Tables\Columns\TextColumn::make('biaya_jabatan_dua'),
        ])
        ->filters([
            // Tables\Filters\TrashedFilter::make(),
        ])
        ->actions([
            // Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
            // Tables\Actions\ForceDeleteBulkAction::make(),
            // Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListPenghasilanPegawais::route('/'),
            'create' => Pages\CreatePenghasilanPegawai::route('/create'),
            'view' => Pages\ViewPenghasilanPegawai::route('/{record}'),
            'edit' => Pages\EditPenghasilanPegawai::route('/{record}/edit'),
        ];
    }    
                                            
    // public static function getEloquentQuery(): Builder
    // {
    //     return parent::getEloquentQuery()
    //     ->withoutGlobalScopes([
    //         SoftDeletingScope::class,
    //     ]);
    // }
}
