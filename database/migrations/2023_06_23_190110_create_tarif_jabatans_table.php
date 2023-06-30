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
        Schema::create('tarif_jabatans', function (Blueprint $table) {
            $table->id();
            $table->decimal('batas_maks', $precision=14, $scale=4);
            $table->unsignedTinyInteger('persen_tarif');
            $table->boolean('gunakan')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarif_jabatans');
    }
};
