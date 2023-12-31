<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
            UserSeeder::class,
            NegaraSeeder::class,
            ProvinsiSeeder::class,
            KabupatenKotaSeeder::class,
            TarifPtkpSeeder::class,
            TarifPkpSeeder::class,
            JabatanSeeder::class,
            KppPajakSeeder::class,
            ObjekPajakSeeder::class,
            PerusahaanSeeder::class,
            PegawaiSeeder::class,
            TarifJabatanSeeder::class,
            PenghasilanPegawaiSeeder::class,
            PerhitunganPajakSeeder::class,
        ]);
    }
}
