<?php

namespace Database\Seeders;

use App\Models\TarifPtkp;
use App\Models\StatusPtkp;
use App\Models\TarifPtkpItem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TarifPtkpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusPtkp = [
            [
                'kode' => 'TK/0',
                'status_kawin' => 'tidak kawin',
                'penghasilan_digabung' => false,
                'jumlah_tanggungan' => 0,
            ],
            [
                'kode' => 'TK/1',
                'status_kawin' => 'tidak kawin',
                'penghasilan_digabung' => false,
                'jumlah_tanggungan' => 1,
            ],
            [
                'kode' => 'TK/2',
                'status_kawin' => 'tidak kawin',
                'penghasilan_digabung' => false,
                'jumlah_tanggungan' => 2,
            ],
            [
                'kode' => 'TK/3',
                'status_kawin' => 'tidak kawin',
                'penghasilan_digabung' => false,
                'jumlah_tanggungan' => 3,
            ],
            [
                'kode' => 'K/0',
                'status_kawin' => 'kawin',
                'penghasilan_digabung' => false,
                'jumlah_tanggungan' => 0,
            ],
            [
                'kode' => 'K/1',
                'status_kawin' => 'kawin',
                'penghasilan_digabung' => false,
                'jumlah_tanggungan' => 1,
            ],
            [
                'kode' => 'K/2',
                'status_kawin' => 'kawin',
                'penghasilan_digabung' => false,
                'jumlah_tanggungan' => 2,
            ],
            [
                'kode' => 'K/3',
                'status_kawin' => 'kawin',
                'penghasilan_digabung' => false,
                'jumlah_tanggungan' => 3,
            ],
            [
                'kode' => 'K/I/0',
                'status_kawin' => 'kawin',
                'penghasilan_digabung' => true,
                'jumlah_tanggungan' => 0,
            ],
            [
                'kode' => 'K/I/1',
                'status_kawin' => 'kawin',
                'penghasilan_digabung' => true,
                'jumlah_tanggungan' => 1,
            ],
            [
                'kode' => 'K/I/2',
                'status_kawin' => 'kawin',
                'penghasilan_digabung' => true,
                'jumlah_tanggungan' => 2,
            ],
            [
                'kode' => 'K/I/3',
                'status_kawin' => 'kawin',
                'penghasilan_digabung' => true,
                'jumlah_tanggungan' => 3,
            ],
        ];

        foreach($statusPtkp as $status){
            StatusPtkp::firstOrCreate([
                'kode' => $status['kode'],
                'status_kawin' => $status['status_kawin'],
                'gbg_penghasilan' => $status['penghasilan_digabung'],
                'jmlh_tanggungan' => $status['jumlah_tanggungan'],
            ]);
        }

        TarifPtkp::firstOrCreate([
            'tahun_berlaku' => 2016,
            'keterangan' => 'Sesuai dengan undang-Undang Harmonisasi Perpajakan No. 7 Tahun 2021 pada bab III pasal 7',
            'tarif_penghasilan' => 54000000,
            'tarif_tanggungan' => 4500000,
        ]);        
    }
}
