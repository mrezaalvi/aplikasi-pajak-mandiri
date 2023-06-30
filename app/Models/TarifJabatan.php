<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TarifJabatan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'batas_maks',
        'persen_tarif',
    ];

    protected function getCurrency($value){
        if(is_null($value)){
            $value = 0;
        }
        if(!is_numeric($value))
            $value = floatval(Str::replace(',','.',Str::replace('.','',$value)));
        return $value;
    }

    public function batasMaks(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $this->getCurrency($value),
            get: fn ($value) => number_format($value, 2, ",", "."),
        );
    }


}
