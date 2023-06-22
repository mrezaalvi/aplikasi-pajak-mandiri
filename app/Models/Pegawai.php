<?php

namespace App\Models;

use App\Models\Negara;
use App\Models\Jabatan;
use App\Models\StatusPtkp;
use App\Models\KabupatenKota;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nip',
        'npwp',
        'nama',
        'jenis_kelamin',
        'status_pegawai',
        'alamat',
        'keterangan_evaluasi',
        'status_ptkp_id',
        'kabupaten_kota_id',
        'jabatan_id',
        'negara_id',
    ];


    protected function statusPegawai(): Attribute{
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
        return $this->belongsTo(Negara::class);
    }
}
