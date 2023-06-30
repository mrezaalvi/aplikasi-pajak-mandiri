<?php

namespace App\Filament\Resources\PenghasilanPegawaiResource\Pages;

use Filament\Pages\Actions;
use Filament\Pages\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\PenghasilanPegawaiResource;

class ListPenghasilanPegawais extends ListRecords
{
    protected static string $resource = PenghasilanPegawaiResource::class;

    protected function getActions(): array
    {
        return [
            
            Action::make('CreateAll')
                ->label('Generate Data Gaji')
                ->action(function (array $data): void {
                    // Pegawai::whereNotIn('id')
                    // $pegawaiId = $this->record->id;

                    // $tahun = now()->format('Y');
            
                    // $penghasilanPegawai = [
                    //     'tahun'                     => $tahun,
                    //     'pegawai_id'                => $pegawaiId,
                    //     'bulan_awal_terima_gaji'    => 'januari',
                    //     'bulan_akhir_terima_gaji'   => 'desember',
                    //     'gaji_pokok_setahun'        => 0.00,
                    //     'tunjangan_pph'             => 0.00,
                    //     'tunjangan_lain'            => 0.00,
                    //     'honorium'                  => 0.00,
                    //     'premi_asuransi'            => 0.00,
                    //     'natura_obyek'              => 0.00,
                    //     'penghasilan_tak_teratur'   => 0.00,
                    //     'iuran_pensiun'             => 0.00,
                    // ];
            
                    // PenghasilanPegawai::create($penghasilanPegawai);
            
                    // PerhitunganPajak::create([
                    //     'tahun'                     => $tahun,
                    //     'pegawai_id'                => $pegawai->id,
                        
                    //     'nama_penandatangan'        => null,
                    //     'npwp_penandatangan'        => null,    
                        
                    //     'awal_terima_gaji'          => null,
                    //     'akhir_terima_gaji'         => null,
                        
                    //     'tarif_ptkp'                => null,
            
                    //     'persen_pkp_1'              => null,
                    //     'batas_pkp_1'               => null,
                    //     'persen_pkp_2'              => null,
                    //     'batas_pkp_2'               => null,
                    //     'persen_pkp_3'              => null,
                    //     'batas_pkp_3'               => null,
                    //     'persen_pkp_4'              => null,
                    //     'batas_pkp_4'               => null,
                    //     'persen_pkp_5'              => null,
                    //     'batas_pkp_5'               => null,
            
                    //     'gaji_pokok_setahun'        => null,
                    //     'tunjangan_pph'             => null,
                    //     'tunjangan_lain'            => null,
                    //     'honorium'                  => null,
                    //     'premi_asuransi'            => null,
                    //     'natura_obyek'              => null,
                        
                    //     'penghasilan_tak_teratur'   => null,
                        
                    //     'iuran_pensiun'             => null,
                    //     'biaya_jabatan_satu'        => null,
                    //     'biaya_jabatan_dua'         => null,
                       
                    //     'penghasilan_netto_0'       => null,
                    //     'pph_0'                     => null,
                    //     'pph_1'                     => null,
            
                    //     'is_saved'                  => false,
                    // ]);
                })
            //     ->modalButton('Buat'),
            // Actions\CreateAction::make()
            //     ->label('Buat'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
