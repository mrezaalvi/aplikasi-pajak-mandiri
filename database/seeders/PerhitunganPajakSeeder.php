<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;
use App\Models\PerhitunganPajak;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PerhitunganPajakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tahun = now()->format('Y');

        $listPegawai = Pegawai::all(['id']);

        foreach($listPegawai as $pegawai){
            $perhitungan = PerhitunganPajak::create([
                'tahun'                     => $tahun,
                'pegawai_id'                => $pegawai->id,
                                                
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
            ]);
        }      
    }
}
