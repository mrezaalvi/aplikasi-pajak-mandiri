<?php

namespace Database\Seeders;

use App\Models\TarifPkp;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TarifPkpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tarifPkp = [
            [
                'index' => 1,
                'batas_min' => 0,
                'persen_tarif' => 5,
            ],
            [
                'index' => 2,
                'batas_min' => 60000000,
                'persen_tarif' => 15,
            ],
            [
                'index' => 3,
                'batas_min' => 250000000,
                'persen_tarif' => 25,
            ],
            [
                'index' => 4,
                'batas_min' => 500000000,
                'persen_tarif' => 30,
            ],
            [
                'index' => 5,
                'batas_min' => 5000000000,
                'persen_tarif' => 35,
            ],
        ];
        foreach($tarifPkp as $pkp){
            TarifPkp::firstOrCreate([
                'index' => $pkp['index'],
                'batas_min' => $pkp['batas_min'],
                'persen_tarif' => $pkp['persen_tarif'],
            ]);
        }
        
    }
}
