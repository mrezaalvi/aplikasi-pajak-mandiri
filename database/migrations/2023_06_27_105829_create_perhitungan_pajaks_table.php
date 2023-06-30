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
        Schema::create('perhitungan_pajaks', function (Blueprint $table) {
            $table->id();
           
            $table->year('tahun');

            $table->string('nama_penandatangan')->nullable();
            $table->string('npwp_penandatangan')->nullable();
            
            $table->tinyInteger('awal_terima_gaji')->nullable();
            $table->tinyInteger('akhir_terima_gaji')->nullable();
            
            $table->decimal('tarif_ptkp', 14, 4)->nullable();
            
            $table->decimal('persen_pkp_1', 14, 4)->nullable();
            $table->decimal('batas_pkp_1', 14, 4)->nullable();
            
            $table->decimal('persen_pkp_2', 14, 4)->nullable();
            $table->decimal('batas_pkp_2', 14, 4)->nullable();
            
            $table->decimal('persen_pkp_3', 14, 4)->nullable();
            $table->decimal('batas_pkp_3', 14, 4)->nullable();
            
            $table->decimal('persen_pkp_4', 14, 4)->nullable();
            $table->decimal('batas_pkp_4', 14, 4)->nullable();
            
            $table->decimal('persen_pkp_5', 14, 4)->nullable();
            $table->decimal('batas_pkp_5', 14, 4)->nullable();
            
            $table->decimal('gaji_pokok_setahun', 14, 4)->nullable();
            $table->decimal('tunjangan_pph', 14, 4)->nullable();
            $table->decimal('tunjangan_lain', 14, 4)->nullable();
            $table->decimal('honorium', 14, 4)->nullable();
            $table->decimal('premi_asuransi', 14, 4)->nullable();
            $table->decimal('natura_obyek', 14, 4)->nullable();
            $table->decimal('penghasilan_tak_teratur', 14, 4)->nullable();

            $table->decimal('iuran_pensiun', 14, 4)->nullable();
            $table->decimal('biaya_jabatan_satu', 11, 4)->nullable();
            $table->decimal('biaya_jabatan_dua', 11, 4)->nullable();
            
            $table->decimal('penghasilan_netto_0', 11, 4)->nullable();
            
            $table->decimal('pph_0', 11, 4)->nullable();
            $table->decimal('pph_1', 11, 4)->nullable();
            
            $table->boolean('is_saved')->default(false);

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
        Schema::dropIfExists('perhitungan_pajaks');
    }
};
