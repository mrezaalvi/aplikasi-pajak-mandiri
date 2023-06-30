<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;
use App\Models\PenghasilanPegawai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenghasilanPegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tahun = now()->format('Y');

        $penghasilanPegawai = [
            [
                'pegawai_id'                => 1,
                'bulan_awal_terima_gaji'    => 'januari',
                'bulan_akhir_terima_gaji'   => 'desember',
                'gaji_pokok_setahun'        => 120000000.00,
                'tunjangan_pph'             => 0.00,
                'tunjangan_lain'            => 0.00,
                'honorium'                  => 0.00,
                'premi_asuransi'            => 0.00,
                'natura_obyek'              => 0.00,
                'penghasilan_tak_teratur'   => 6000000.00,
                'iuran_pensiun'             => 0.00,
            ],
            [
                'pegawai_id'                => 2,
                'bulan_awal_terima_gaji'    => 'januari',
                'bulan_akhir_terima_gaji'   => 'desember',
                'gaji_pokok_setahun'        => 84000000.00,
                'tunjangan_pph'             => 0.00,
                'tunjangan_lain'            => 0.00,
                'honorium'                  => 0.00,
                'premi_asuransi'            => 0.00,
                'natura_obyek'              => 0.00,
                'penghasilan_tak_teratur'   => 4200000.00,
                'iuran_pensiun'             => 0.00,
            ],
            [
                'pegawai_id'                => 3,
                'bulan_awal_terima_gaji'    => 'januari',
                'bulan_akhir_terima_gaji'   => 'desember',
                'gaji_pokok_setahun'        => 66000000.00,
                'tunjangan_pph'             => 0.00,
                'tunjangan_lain'            => 0.00,
                'honorium'                  => 0.00,
                'premi_asuransi'            => 0.00,
                'natura_obyek'              => 0.00,
                'penghasilan_tak_teratur'   => 3300000.00,
                'iuran_pensiun'             => 0.00,
            ],
        ];

        foreach($penghasilanPegawai as $pegawai){
            $penghasilanCreated = PenghasilanPegawai::create([
                'tahun'                     => $tahun,
                'pegawai_id'                => $pegawai['pegawai_id'],
                'bulan_awal_terima_gaji'    => $pegawai['bulan_awal_terima_gaji'],
                'bulan_akhir_terima_gaji'   => $pegawai['bulan_akhir_terima_gaji'],
                'gaji_pokok_setahun'        => $pegawai['gaji_pokok_setahun'],
                'tunjangan_pph'             => $pegawai['tunjangan_pph'],
                'tunjangan_lain'            => $pegawai['tunjangan_lain'],
                'honorium'                  => $pegawai['honorium'],
                'premi_asuransi'            => $pegawai['premi_asuransi'],
                'natura_obyek'              => $pegawai['natura_obyek'],
                'penghasilan_tak_teratur'   => $pegawai['penghasilan_tak_teratur'],
                'iuran_pensiun'             => $pegawai['iuran_pensiun'],
                'biaya_jabatan_satu'        => 0.00,
                'biaya_jabatan_dua'         => 0.00,
            ]);
            // $penghasilanCreated->biaya_jabatan_satu = 0.00;
            // $penghasilanCreated->biaya_jabatan_dua = 0.00;
            // $penghasilanCreated->save();
        }

        $penghasilanPegawai = PenghasilanPegawai::all(['id', 'tahun', 'pegawai_id']);

        
    }
}
