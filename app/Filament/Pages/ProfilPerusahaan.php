<?php

namespace App\Filament\Pages;

use App\Models\KppPajak;
use Filament\Pages\Page;
use App\Models\Perusahaan;
use App\Models\KabupatenKota;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;

class ProfilPerusahaan extends Page
{
    
    protected static ?string $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $title = 'Profil Perusahaan/Pemotong';
 
    protected static ?string $navigationLabel = 'Profil Perusahaan';
    
    protected static ?string $slug = 'profil-perusahaan';

    protected static ?string $navigationGroup = "Manajemen Perusahaan";
    
    protected static ?int $navigationSort = -1;

    public Perusahaan $perusahaan;
    
    public $nama_perusahaan;

    public $npwp_perusahaan;

    public $alamat_perusahaan;

    public $kabupatenKota;

    public $no_telp;

    public $kppPajak;

    public $nama_penandatangan;
    
    public $npwp_penandatangan;



    public function __construct(){
        parent::__construct();
        $this->perusahaan = Perusahaan::with('kabupatenKota', 'kppPajak')->find(1);
    }

    protected function getFormModel(): Perusahaan 
    {
        // return $this->perusahaan;
        return $this->perusahaan = Perusahaan::with('kabupatenKota', 'kppPajak')->find(1);
    }

    public function mount()
    {
        $this->form->fill([
            'nama_perusahaan' => $this->perusahaan->nama_perusahaan,
            'npwp_perusahaan' => $this->perusahaan->npwp_perusahaan,
            'alamat_perusahaan' => $this->perusahaan->alamat_perusahaan,
            'kabupatenKota' => $this->perusahaan->kabupatenKota->id,
            'no_telp' => $this->perusahaan->no_telp,
            'kppPajak' => $this->perusahaan->kppPajak->id,
            'nama_penandatangan' => $this->perusahaan->nama_penandatangan,
            'npwp_penandatangan' => $this->perusahaan->npwp_penandatangan,
        ]);
    }

    public function save()
    {
        // $this->form->getState();

        // $state = array_filter([
        //     'nama_perusahaan' => $this->nama_perusahaan,
        //     'npwp_perusahaan' => $this->npwp_perusahaan,
        //     'alamat_perusahaan' => $this->alamat_perusahaan,
        //     'kabupaten_kota_id' => $this->kabupatenKota,
        //     'no_telp' => $this->no_telp,
        //     'kpp_pajak_id' => $this->kppPajak,
        //     'nama_penandatangan' => $this->nama_penandatangan,
        //     'npwp_penandatangan' => $this->npwp_penandatangan,
        // ]);

        // $perusahaan = $this->perusahaan;

        // $perusahaan->update($state);
        $this->perusahaan->update(
            $this->form->getState(),
        );
        $this->notify('success', 'Profil Perusahaan berhasil diperbarui');
        
    }

    public function getCancelButtonUrlProperty()
    {
        return static::getUrl();
    }

    protected function getBreadcrumbs(): array
    {
        return [
            url()->current() => 'Profil Perusahaan',
        ];
    }

    protected function getFormSchema(): array
    {
        return [
            Section::make('Informasi Perusahaan')
                ->columns(2)
                ->schema([
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
                    Select::make('kabupatenKota')
                        ->relationship('kabupatenKota', 'nama')
                        // ->options(KabupatenKota::all(['id','nama'])->pluck('nama', 'id'))
                        ->preload()
                        ->searchable()
                        ->required(),
                    TextInput::make('no_telp')
                        ->tel()
                        ->mask(fn (TextInput\Mask $mask) => $mask->pattern('0000-0000-0000-0000'))
                        ->placeholder('0811-0000-000')
                        ->required()
                        ->maxLength(30),
                    Select::make('kppPajak')
                        ->label('Lokasi KPP')
                        ->relationship('kppPajak', 'nama')
                        // ->options(KppPajak::all()->pluck('nama', 'id'))
                        ->preload()
                        ->searchable()
                        ->required(),
                ]),
            
            Section::make('Penandatangan')
                ->columns(2)
                ->schema([
                    TextInput::make('nama_penandatangan')
                        ->label('Nama Penandatangan')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('npwp_penandatangan')
                        ->label('NPWP Penandatangan')
                        ->mask(
                            fn (TextInput\Mask $mask) => $mask->pattern('00.000.000.0-000.000')
                                ->lazyPlaceholder(false)
                        )
                        ->maxLength(30)
                        ->required()
                        ->maxLength(255),
                ]),
        ];
    }

    protected static string $view = 'filament.pages.profil-perusahaan';
}
