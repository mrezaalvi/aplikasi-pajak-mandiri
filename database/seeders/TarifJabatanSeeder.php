<?php

namespace Database\Seeders;

use App\Models\TarifJabatan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TarifJabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TarifJabatan::firstOrCreate([
            'batas_maks' => 6000000,
            'persen_tarif' => 5,
        ]);
    }
}
