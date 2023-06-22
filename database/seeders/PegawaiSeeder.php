<?php

namespace Database\Seeders;

use App\Models\Negara;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\StatusPtkp;
use Illuminate\Support\Str;
use App\Models\KabupatenKota;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataPegawai = [
            [
                'npwp' => '832882807215000',
                'nama' => 'Sitti Silaen',
                'jenis_kelamin' => 'perempuan',
                'status_pegawai' => 'tetap',
                'alamat' => '',
                'keterangan_evaluasi' => 'normal/aktif',
                'status_ptkp' => 'TK/0',
                'kabupaten_kota' => 'BATAM',
                'jabatan' => 'Site Manager',
                'negara' => 'Indonesia',
            ]
        ];

        foreach($dataPegawai as $pegawai){
            $nipTerakhir = Pegawai::orderBy('nip','desc')->first();
            $nip = ($nipTerakhir)?$nipTerakhir:1;
            $statusPtkp = StatusPtkp::where('kode', $pegawai['status_ptkp'])->first();
            $kabupatenKota = KabupatenKota::where('nama','like', '%'.Str::upper($pegawai['kabupaten_kota']).'%')
                        ->first();
            $jabatan = Jabatan::where('nama_jabatan', Str::lower($pegawai['jabatan']))->first();
            $negara = Negara::where('nama', $pegawai['negara'])->first();
            
            Pegawai::firstOrCreate([
                'nip' => $nip,
                'npwp' => $pegawai['npwp'],
                'nama' => $pegawai['nama'],
                'jenis_kelamin' => $pegawai['jenis_kelamin'],
                'status_pegawai' => $pegawai['status_pegawai'],
                'alamat' => $pegawai['alamat'],
                'keterangan_evaluasi' => $pegawai['keterangan_evaluasi'],
                'status_ptkp_id' => $statusPtkp->id,
                'kabupaten_kota_id' => $kabupatenKota->id,
                'jabatan_id' => $jabatan->id,
                'negara_id' => $negara->id,
            ]);
        }
    }
}
