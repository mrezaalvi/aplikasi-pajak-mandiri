<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $refJabatan = [
            'site manager',
            'admin hrd',
            'admin bandara',
            'assistant supervisor',
            'supervisor',
        ];

        foreach($refJabatan as $jabatan){
            Jabatan::firstOrCreate([
                'nama_jabatan' => $jabatan,
            ]);
        }
    }
}
