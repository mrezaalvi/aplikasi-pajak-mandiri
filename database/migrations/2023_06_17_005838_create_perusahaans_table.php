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
        Schema::create('perusahaans', function (Blueprint $table) {
            $table->id();
            $table->string('npwp_perusahaan',30)->unique();
            $table->string('nama_perusahaan',150)->unique();
            $table->string('alamat_perusahaan')->nullable();
            $table->string('no_telp',30);
            $table->string('npwp_penandatangan');
            $table->string('nama_penandatangan');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->foreignId('kabupaten_kota_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreignId('kpp_pajak_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaans');
    }
};
