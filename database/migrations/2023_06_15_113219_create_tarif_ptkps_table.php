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
        Schema::create('status_ptkps', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 10)->unique();
            $table->enum('status_kawin', ['kawin','tidak kawin']);
            $table->boolean('gbg_penghasilan');
            $table->unsignedTinyInteger('jmlh_tanggungan');
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['status_kawin','gbg_penghasilan', 'jmlh_tanggungan']);
        });

        Schema::create('tarif_ptkps', function (Blueprint $table) {
            $table->id();
            $table->year('tahun_berlaku')->unique();
            $table->string('keterangan')->nullable();
            $table->decimal('tarif_penghasilan', $precision=14, $scale=4)->default(0);
            $table->decimal('tarif_tanggungan', $precision=14, $scale=4)->default(0);
            $table->timestamps();
            $table->index(['id', 'tahun_berlaku']);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarif_ptkps');
        Schema::dropIfExists('status_ptkps');
    }
};
