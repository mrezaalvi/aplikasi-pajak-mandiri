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
            $table->unsignedBigInteger('nip');
            $table->string('nama', 150);
            $table->string('nik', 30)
                ->unique()
                ->default('000000000000000');
            $table->string('npwp', 30)
                ->default('000000000000000');;
            $table->enum('status_pegawai', ['tetap', 'tidak tetap'])
                ->default('tidak tetap');
            $table->enum('jenis_kelamin',['laki-laki', 'perempuan'])
                ->default('laki-laki');
            $table->string('bulan_awal_terima_gaji')->nullable();
            $table->string('bulan_akhir_terima_gaji')->nullable();
            $table->string('alamat');
            $table->enum('keterangan_evaluasi', ['normal/aktif','meninggal_dunia','keluar'])
                ->default('normal/aktif');
            $table->timestamps();
            
            // status ptkp ref ke tabel status_ptkp
            $table->foreignId('status_ptkp_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('restrict');
            
            // alamat (kota) ref ke tabel  (kota)
            $table->foreignId('kabupaten_kota_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('restrict');

            // jabatan ref ke tabel jabatan
            $table->foreignId('jabatan_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('restrict');

            // kewarganegraan dan kode negara ref ke tabel  (negara)
            $table->foreignId('negara_id')
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
        Schema::dropIfExists('pegawais');
    }
};
