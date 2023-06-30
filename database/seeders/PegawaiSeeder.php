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
                'nip' => '000010',
                'npwp' => '877122317121000',
                'nik' => '1271021703880003',
                'nama' => 'Ruslan bima',
                'jenis_kelamin' => 'laki-laki',
                'status_pegawai' => 'tetap',
                'alamat' => '',
                'keterangan_evaluasi' => 'normal/aktif',
                'status_ptkp' => 'K/0',
                'kabupaten_kota' => 'Medan',
                'jabatan' => 'site manager',
                'negara' => 'Indonesia',
            ],
            [
                'nip' => '000018',
                'npwp' => '545306458121000',
                'nik' => '1271211010870005',
                'nama' => 'agus amir',
                'jenis_kelamin' => 'laki-laki',
                'status_pegawai' => 'tetap',
                'alamat' => '',
                'keterangan_evaluasi' => 'normal/aktif',
                'status_ptkp' => 'K/1',
                'kabupaten_kota' => 'Medan',
                'jabatan' => 'Supervisor',
                'negara' => 'Indonesia',
            ],
            [
                'nip' => '000040',
                'npwp' => '857128383121000',
                'nik' => '1271165805900001',
                'nama' => 'eka lestari',
                'jenis_kelamin' => 'perempuan',
                'status_pegawai' => 'tetap',
                'alamat' => '',
                'keterangan_evaluasi' => 'normal/aktif',
                'status_ptkp' => 'TK/0',
                'kabupaten_kota' => 'Medan',
                'jabatan' => 'Assis Supervisor',
                'negara' => 'Indonesia',
            ],
        ];

        foreach($dataPegawai as $pegawai){
            $statusPtkp = StatusPtkp::where('kode', $pegawai['status_ptkp'])->first();
            $kabupatenKota = KabupatenKota::where('nama','like', '%'.Str::upper($pegawai['kabupaten_kota']).'%')
                        ->first();
            $jabatan = Jabatan::where('nama_jabatan', Str::lower($pegawai['jabatan']))->first();
            $negara = Negara::where('nama', $pegawai['negara'])->first();
            
            Pegawai::firstOrCreate([
                'nip' => $pegawai['nip'],
                'nama' => $pegawai['nama'],
                'npwp' => $pegawai['npwp'],
                'nik' => $pegawai['npwp'],
                'jenis_kelamin' => $pegawai['jenis_kelamin'],
                'status_pegawai' => $pegawai['status_pegawai'],
                'alamat' => $pegawai['alamat'],
                'keterangan_evaluasi' => $pegawai['keterangan_evaluasi'],
                // 'status_ptkp' => $pegawai['status_ptkp'],
                // 'kabupaten_kota' => $pegawai['kabupaten_kota'],
                // 'jabatan' => $pegawai['jabatan'],
                // 'negara' => $pegawai['negara'],
                'status_ptkp_id' => ($statusPtkp)?$statusPtkp->id:null,
                'kabupaten_kota_id' => ($kabupatenKota)?$kabupatenKota->id:null,
                'jabatan_id' => ($jabatan)?$jabatan->id:null,
                'negara_id' => ($negara)?$negara->id:null,
            ]);
        }
    }
}
