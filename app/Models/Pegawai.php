<?php

namespace App\Models;

use App\Models\Negara;
use App\Models\Jabatan;
use App\Models\StatusPtkp;
use Illuminate\Support\Str;
use App\Models\KabupatenKota;
use App\Models\PenghasilanPegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nip',
        'nama',
        'nik',
        'npwp',
        'jenis_kelamin',
        'status_pegawai',
        'tanggal_masuk',
        'tanggal_keluar',
        'alamat',
        'keterangan_evaluasi',
        'status_ptkp_id',
        'kabupaten_kota_id',
        'jabatan_id',
        'negara_id',
    ];

    public function nip(): Attribute
    {
        return Attribute::make(
            set: fn($value)=>($value)?$value:Str::padLeft(intval(Pegawai::all(['nip'])->last()->nip)+1, 6,'0'),
        );
    }

    public function npwp(): Attribute
    {
        return Attribute::make(
            set: fn($value)=>($value)?$value:"000000000000000",
        );
    }

    public function nik(): Attribute
    {
        return Attribute::make(
            set: fn($value)=>($value)?$value:"000000000000000",
        );
    }

    public function nama(): Attribute
    {
        return Attribute::make(
            get: fn($value)=>Str::title($value),
            set: fn($value)=>Str::lower($value)
        );
    }

    protected function statusPegawai(): Attribute
    {
        return Attribute::make(
            get: fn($value)=>Str::title($value),
        );
    }
    /**
     * Get the KabupatenKota that owns the Pegawai
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kabupatenKota(): BelongsTo
    {
        return $this->belongsTo(KabupatenKota::class);
    }
    
    /**
     * Get the StatusPtkp that owns the Pegawai
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusPtkp(): BelongsTo
    {
        // belongsTo(StatusPtkp::class, 'foreign_key', 'other_key')
        return $this->belongsTo(StatusPtkp::class);
    }
    
    /**
     * Get the Jabatan that owns the Pegawai
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jabatan(): BelongsTo
    {
        // belongsTo(Jabatan::class, 'foreign_key', 'other_key')
        return $this->belongsTo(Jabatan::class);
    }

    /**
     * Get the Negara that owns the Pegawai
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function negara(): BelongsTo
    {
        // belongsTo(Jabatan::class, 'foreign_key', 'other_key')
        return $this->belongsTo(pengahasilanPegawaia::class);
    }

    /**
     * Get all of the penghasilanPegawaisfor the Pegawai
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penghasilanPegawais(): HasMany
    {
        return $this->hasMany(PenghasilanPegawai::class);
    }
}
