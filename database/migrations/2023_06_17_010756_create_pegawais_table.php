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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 30);
            $table->string('nama', 150);
            $table->string('nik', 30);
            $table->string('npwp', 30)->nullable();
            $table->enum('jenis_kelamin',['laki-laki', 'perempuan']);
            $table->enum('status_pegawai', ['tetap', 'tidak tetap']);
            $table->date('tanggal_masuk')->nullable();
            $table->date('tanggal_keluar')->nullable();
            $table->string('alamat')->nullable();
            $table->enum('keterangan_evaluasi', ['normal/aktif','meninggal_dunia','keluar'])
                ->default('normal/aktif');
            $table->timestamps();
            $table->softDeletes();

            // status ptkp ref ke tabel status_ptkp
            $table->foreignId('status_ptkp_id')
                ->nullable()
                ->constrained();
            
            // alamat (kota) ref ke tabel  (kota)
            $table->foreignId('kabupaten_kota_id')
                ->nullable()
                ->constrained();

            // jabatan ref ke tabel jabatan
            $table->foreignId('jabatan_id')
                ->nullable()
                ->constrained();

            // kewarganegraan dan kode negara ref ke tabel  (negara)
            $table->foreignId('negara_id')
                ->nullable()
                ->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
