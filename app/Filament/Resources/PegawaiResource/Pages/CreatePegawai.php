<?php

namespace App\Filament\Resources\PegawaiResource\Pages;

use Carbon\CarbonImmutable;
use Filament\Pages\Actions;
use App\Models\PerhitunganPajak;
use App\Models\PenghasilanPegawai;
use Filament\Pages\Actions\Action;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\PegawaiResource;

class CreatePegawai extends CreateRecord
{
    protected static string $resource = PegawaiResource::class;
    
    protected function getActions(): array
    {
        return [
            Action::make('Kembali')
                ->url($this->getRedirectUrl()),
        ];
    }

    protected function afterCreate(): void
    {
        // Runs after the form fields are saved to the database.

        $pegawaiId = $this->record->id;

        $tahun = CarbonImmutable::now()->format('Y');
        
        $penghasilanPegawai = [
            'tahun'                     => $tahun,
            'pegawai_id'                => $pegawaiId,
            'bulan_awal_terima_gaji'    => 'januari',
            'bulan_akhir_terima_gaji'   => 'desember',
            'gaji_pokok_setahun'        => 0.00,
            'tunjangan_pph'             => 0.00,
            'tunjangan_lain'            => 0.00,
            'honorium'                  => 0.00,
            'premi_asuransi'            => 0.00,
            'natura_obyek'              => 0.00,
            'penghasilan_tak_teratur'   => 0.00,
            'iuran_pensiun'             => 0.00,
        ];

        PenghasilanPegawai::create($penghasilanPegawai);

        $perhitunganPajak = [
            'tahun'                     => $tahun,
            'pegawai_id'                => $pegawaiId,
            
            'nama_penandatangan'        => null,
            'npwp_penandatangan'        => null,    
            
            'awal_terima_gaji'          => null,
            'akhir_terima_gaji'         => null,
            
            'tarif_ptkp'                => null,

            'persen_pkp_1'              => null,
            'batas_pkp_1'               => null,
            'persen_pkp_2'              => null,
            'batas_pkp_2'               => null,
            'persen_pkp_3'              => null,
            'batas_pkp_3'               => null,
            'persen_pkp_4'              => null,
            'batas_pkp_4'               => null,
            'persen_pkp_5'              => null,
            'batas_pkp_5'               => null,

            'gaji_pokok_setahun'        => null,
            'tunjangan_pph'             => null,
            'tunjangan_lain'            => null,
            'honorium'                  => null,
            'premi_asuransi'            => null,
            'natura_obyek'              => null,
            
            'penghasilan_tak_teratur'   => null,
            
            'iuran_pensiun'             => null,
            'biaya_jabatan_satu'        => null,
            'biaya_jabatan_dua'         => null,
           
            'penghasilan_netto_0'       => null,
            'pph_0'                     => null,
            'pph_1'                     => null,

            'is_saved'                  => false,
        ];

        PerhitunganPajak::create($perhitunganPajak);
    }

    protected function afterValidate(): void
    {
        // Runs after the form fields are validated when the form is submitted.
        
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
