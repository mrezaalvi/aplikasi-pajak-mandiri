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
            $table->year('tahun');
            $table->decimal('gaji', 14, 4);
            $table->decimal('tunjangan_pph', 14, 4);
            $table->decimal('tunjangan_lain', 14, 4);
            $table->decimal('honorium', 14, 4);
            $table->decimal('premi_asuransi', 14, 4);
            $table->decimal('natura_obyek', 14, 4);
            $table->timestamps();
            // status ptkp ref ke tabel status_ptkp
            $table->foreignId('pegawai_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('restrict');
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
