<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TarifPkp extends Model
{
    use HasFactory;

    protected $fillable = [
        'index',
        'batas_min',
        'batas_maks',
        'persen_tarif',
        'persen_tarif',
    ];

    protected $append = ['batas_maks'];

    
    public function batasMaks(): Attribute
    {
        // $batasMaks = TarifPkp::where('index', $this->index+1)->first()->batas;
        return Attribute::make(
            get: fn() => (TarifPkp::where('index', $this->index+1)->first())?
                TarifPkp::where('index', $this->index+1)->first()->batas_min:"",
        );
    }

    public function batasMin(): Attribute
    {
        return new Attribute(
            get: fn ($value) => number_format($value, 2, ",", "."),
        );
    }
}
