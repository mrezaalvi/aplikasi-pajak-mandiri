<?php

namespace App\Models;

use Akaunting\Money\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TarifPtkp extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'tahun_berlaku',
        'keterangan',
        'tarif_penghasilan',
        'tarif_tanggungan',
    ];

    // protected $casts = [
    //     'tarif_penghasilan' => MoneyCast::class,
    //     'tarif_tanggungan' => MoneyCast::class,
    // ];

    public function tarifPenghasilan(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => number_format($value, 2, ",", "."),
        );
    }

    public function tarifTanggungan(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => number_format($value, 2, ",", "."),
        );
    }
}
