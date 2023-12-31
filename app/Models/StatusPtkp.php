<?php

namespace App\Models;

use App\Models\Pegawai;
use App\Traits\HasLocaleCurrency;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatusPtkp extends Model
{
    use HasFactory, SoftDeletes, HasLocaleCurrency;

    protected $fillable = [
        'kode',
        'status_kawin',
        'penghasilan_digabung',
        'jumlah_tanggungan',
    ];
    
    protected $appends = ['keterangan', 'tarifPtkp'];

    // protected function kode():Attribute{
    //     return Attribute::make(
    //         get: fn() => (
    //             (($this->status_kawin == "kawin")?"K/":"TK/") .
    //             (($this->penghasilan_digabung)?"I/":"") . 
    //             $this->jumlah_tanggungan
    //         ),
    //     );
    // }
    
    // public function penghasilanDigabung(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => ($value)?"Ya":"Tidak",
    //         // set: fn ($value) => ($value == "Ya")? true: false,
    //     );
    // }

    protected function keterangan():Attribute{
        return Attribute::make(
            get: fn() => 
                "Status Perkawinan : " . (($this->status_kawin == "kawin")?"Kawin":"Tidak Kawin") .
                ", Penghasilan Digabung : " . (($this->penghasilan_digabung)?"Ya":" Tidak") . 
                ", Jumlah Tanggungan : " . $this->jumlah_tanggungan,
            
        );
    }

    protected function tarifPtkp(): Attribute{
        $tarifPtkp = DB::table('tarif_ptkps')->orderBy('tahun_berlaku', 'desc')->first();
        return Attribute::make(
            get: fn() => 
            $this->setLocaleCurrencyFormat(((($this->penghasilan_digabung)?2:1) * $tarifPtkp->tarif_penghasilan)  +  
                (($this->jumlah_tanggungan + (($this->status_kawin == "kawin")? 1 : 0)) * $tarifPtkp->tarif_tanggungan)),
                
        );
    }

    /**
     * Get all of the comments for the StatusPtkp
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pegawais(): HasMany
    {
        return $this->hasMany(Pegawai::class);
    }
}
