<?php

namespace App\Models;

use App\Models\Regency;
use App\Models\KppPajak;
use App\Models\KabupatenKota;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perusahaan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_perusahaan',
        'npwp_perusahaan',
        'alamat_perusahaan',
        'no_telp',
        'npwp_penandatangan',
        'nama_penandatangan',
        'kabupaten_kota_id',
        'kpp_pajak_id',
    ];

    /**
     * Get the kabupaten or kota that owns the Perusahaan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kabupatenKota(): BelongsTo
    {
        return $this->belongsTo(KabupatenKota::class);
    }

    /**
     * Get the kpp pajak that owns the Perusahaan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kppPajak(): BelongsTo
    {
        return $this->belongsTo(KppPajak::class);
    }
}