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
        Schema::create('tarif_pkps', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('index')->unique();
            $table->decimal('batas_min', $precision=14, $scale=4);
            $table->unsignedTinyInteger('persen_tarif');
            $table->boolean('gunakan')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarif_pkps');
    }
};
