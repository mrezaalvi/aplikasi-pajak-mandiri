<?php

namespace App\Models;

use App\Models\Provinsi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KabupatenKota extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['kode', 'nama', 'provinsi_id'];

    /**
     * Get the provinsi that owns the KabupatenKota
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class);
    }
}
