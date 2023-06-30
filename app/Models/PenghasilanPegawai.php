<?php

namespace App\Models;

use App\Traits\HasLocaleCurrency;
use App\Models\Pegawai;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PenghasilanPegawai extends Model
{
    use HasFactory, HasLocaleCurrency;

    protected $fillable = [
        'tahun',
        'pegawai_id',
        'bulan_awal_terima_gaji',
        'bulan_akhir_terima_gaji',
        'gaji_pokok_setahun',
        'tunjangan_pph',
        'tunjangan_lain',
        'honorium',
        'premi_asuransi',
        'natura_obyek',
        'penghasilan_tak_teratur',
        'iuran_pensiun',
        'biaya_jabatan_satu',
        'biaya_jabatan_dua',
    ];

    protected $appends = ['penghasilan_teratur', 'pegawai_nama'];

    public function hitungPenghasilanTeratur()
    {
        $gajiDisetahunkan = $this->setIntCurrencyFormat($this->gaji_pokok_setahun);
        $tunjanganPph = $this->setIntCurrencyFormat($this->tunjangan_pph);
        $tunjanganLain = $this->setIntCurrencyFormat($this->tunjangan_lain);
        $honorarium = $this->setIntCurrencyFormat($this->honorium);
        $premiAsuransi = $this->setIntCurrencyFormat($this->premi_asuransi);
        $naturaObyek = $this->setIntCurrencyFormat($this->natura_obyek);

        return $gajiDisetahunkan + $tunjanganPph + $tunjanganLain + $honorarium + $premiAsuransi + $naturaObyek;
    }

    public function penghasilanTeratur(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->setLocaleCurrencyFormat($this->hitungPenghasilanTeratur()),
        );
    }
    
    protected function getBiayaJabatan(int $number=1)
    {
        $statusPegawai = Pegawai::find($this->pegawai_id)->status_pegawai;
        
        if($statusPegawai == 'tidak tetap')
            return 0.00;
        
        $tarifJabatan = TarifJabatan::where('gunakan', true)->first();
        $batasMaks = $this->setIntCurrencyFormat($tarifJabatan->batas_maks);
        $penghasilanTakTeratur = $this->setIntCurrencyFormat($this->penghasilan_tak_teratur);
        $totalPenghasilanBrutto = ($this->hitungPenghasilanTeratur() + $penghasilanTakTeratur);
        $biayaJabatan = $totalPenghasilanBrutto *($tarifJabatan->persen_tarif/100);
        $biayaJabatan1 = $this->hitungPenghasilanTeratur()*($tarifJabatan->persen_tarif/100);
    
        if($number == 2){
            $biayaJabatan2 = $biayaJabatan1 + ($penghasilanTakTeratur *           $tarifJabatan->persen_tarif/100);
            return ($biayaJabatan2>$batasMaks)?($batasMaks-$biayaJabatan1):($penghasilanTakTeratur * $tarifJabatan->persen_tarif/100);
        }

        return ($biayaJabatan>$batasMaks)?6000000:$biayaJabatan1;
    }

    protected function getCurrency($value){
        if(is_null($value)){
            $value = 0;
        }
        if(!is_numeric($value))
            $value = floatval(Str::replace(',','.',Str::replace('.','',$value)));
        return $value;
    }

    public function pegawaiNama(): Attribute
    {
        return Attribute::make(
            get: fn () => Pegawai::where('id', $this->pegawai_id)->first()->nama,
        );
    }

    public function bulanAwalTerimaGaji(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => ($value)?$value:'januari',
        );
    }

    public function bulanAkhirTerimaGaji(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => ($value)?$value:'desember',
        );
    }

    public function gajiPokokSetahun(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $this->setIntCurrencyFormat($value),
            get: fn ($value) => $this->setLocaleCurrencyFormat($value,2),
        );
    }
    
    public function tunjanganPph(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $this->setIntCurrencyFormat($value),
            get: fn ($value) => $this->setLocaleCurrencyFormat($value,2,",","."),
        );
    }
    
    public function tunjanganLain(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $this->setIntCurrencyFormat($value),
            get: fn ($value) => $this->setLocaleCurrencyFormat($value,2,",","."),
        );
    }
    
    public function honorium(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $this->setIntCurrencyFormat($value),
            get: fn ($value) => $this->setLocaleCurrencyFormat($value,2,",","."),
        );
    }
    
    public function premiAsuransi(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $this->setIntCurrencyFormat($value),
            get: fn ($value) => $this->setLocaleCurrencyFormat($value,2,",","."),
        );
    }
    
    public function naturaObyek(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $this->setIntCurrencyFormat($value),
            get: fn ($value) => $this->setLocaleCurrencyFormat($value,2,",","."),
        );
    }
    
    public function penghasilanTakTeratur(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $this->setIntCurrencyFormat($value),
            get: fn ($value) => $this->setLocaleCurrencyFormat($value,2,",","."),
        );
    }

    public function iuranPensiun(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $this->setIntCurrencyFormat($value),
            get: fn ($value) => $this->setLocaleCurrencyFormat($value,2,",","."),
        );
    }
    
    public function biayaJabatanSatu(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $this->getBiayaJabatan(),
            get: fn ($value) => $this->setLocaleCurrencyFormat($value,2,",","."),
        );
    }
    
    public function biayaJabatanDua(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $this->getBiayaJabatan(2),
            get: fn ($value) => $this->setLocaleCurrencyFormat($value,2,",","."),
        );
    }
    
    /**
     * Get the pegawai that owns the PenghasilanPegawai
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class);
    }
}
