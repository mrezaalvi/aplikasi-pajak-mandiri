<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penghasilan_pegawais', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            
            $table->enum('bulan_awal_terima_gaji',['januari','februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'])->default('januari');
            
            $table->enum('bulan_akhir_terima_gaji',['januari','februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'])
            ->default('desember');
            
            $table->decimal('gaji_pokok_setahun', 14, 4)->default(0);
            $table->decimal('tunjangan_pph', 14, 4)->default(0);
            $table->decimal('tunjangan_lain', 14, 4)->default(0);
            $table->decimal('honorium', 14, 4)->default(0);
            $table->decimal('premi_asuransi', 14, 4)->default(0);
            $table->decimal('natura_obyek', 14, 4)->default(0);
            $table->decimal('penghasilan_tak_teratur', 14, 4)->default(0);
            
            $table->decimal('iuran_pensiun', 14, 4)->default(0);
            $table->decimal('biaya_jabatan_satu', 11, 4)->default(0);
            $table->decimal('biaya_jabatan_dua', 11, 4)->default(0);
            
            $table->timestamps();
            
            // status ptkp ref ke tabel status_ptkp
            $table->foreignId('pegawai_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->unique(['id','tahun', 'pegawai_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penghasilan_pegawais');
    }
};
