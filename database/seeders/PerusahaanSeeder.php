<?php

namespace Database\Seeders;

use App\Models\KppPajak;
use App\Models\Perusahaan;
use Illuminate\Support\Str;
use App\Models\KabupatenKota;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $perusahaan = [
            [
                'nama_perusahaan' => 'PT. BAKRI KARYA SERVISUTAMA',
                'npwp_perusahaan' => '739681898215000',
                'alamat_perusahaan' => 'RUKO GLOBAL 22, JL. DIPONOGORO 10-11, BATU AJI, BULIANG',
                'no_telp' => '085264561077',
                'npwp_penandatangan' => 'ZULBAKRI ISMAEL',
                'nama_penandatangan' => '149706541215000',
                'kabupaten_kota' => 'KOTA BATAM',
            ],
        ];

        foreach($perusahaan as $pemotong){
            $kota = KabupatenKota::where('nama', $pemotong['kabupaten_kota'])->first();
            $kodeKpp = Str::substr($pemotong['npwp_perusahaan'], 9,3);
            $kppPajak = KppPajak::where('kode', $kodeKpp)->first();
            Perusahaan::firstOrCreate([
                'nama_perusahaan' => $pemotong['nama_perusahaan'],
                'npwp_perusahaan' => $pemotong['npwp_perusahaan'],
                'alamat_perusahaan' => $pemotong['alamat_perusahaan'],
                'no_telp' => $pemotong['no_telp'],
                'npwp_penandatangan' => $pemotong['npwp_penandatangan'],
                'nama_penandatangan' => $pemotong['nama_penandatangan'],
                'kabupaten_kota_id' => $kota->id,
                'kpp_pajak_id' => $kppPajak->id,
            ]);
        }
    }
}
