<?php

namespace App\Models;

use App\Models\Pegawai;
use App\Models\TarifPkp;
use App\Models\StatusPtkp;
use App\Traits\HasLocaleCurrency;
use App\Models\PenghasilanPegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PerhitunganPajak extends Model
{
    use HasFactory, HasLocaleCurrency;
    
    protected $fillable = [
        'tahun',
        'pegawai_id',
        'nama_penandatangan',
        'npwp_penandatangan',    
        'awal_terima_gaji',
        'akhir_terima_gaji',
        'tarif_ptkp',
        'persen_pkp_1',
        'batas_pkp_1',
        'persen_pkp_2',
        'batas_pkp_2',
        'persen_pkp_3',
        'batas_pkp_3',
        'persen_pkp_4',
        'batas_pkp_4',
        'persen_pkp_5',
        'batas_pkp_5',
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
        'penghasilan_netto_0',
        'pph_0',
        'pph_1',
        'is_saved',
    ];

    protected $appends = [
        'pegawai_nama',
        'penghasilan_brutto',
        'total_pengurangan',
        'penghasilan_netto',
        'penghasilan_kena_pajak',
        'status_ptkp',
        'tarif_ptkp',
        'pph_terutang',
    ];
    
    public function hitungPenghasilanBrutto(){
        $gajiPokokSetahun = $this->setIntCurrencyFormat($this->gaji_pokok_setahun);
        $tunjanganPPh = $this->setIntCurrencyFormat($this->tunjangan_pph); 
        $tunjanganLain = $this->setIntCurrencyFormat($this->tunjangan_lain);
        $honorium = $this->setIntCurrencyFormat($this->honorium);
        $premiAsuransi = $this->setIntCurrencyFormat($this->premi_asuransi);
        $naturaObyek = $this->setIntCurrencyFormat($this->natura_obyek);
        $penghasilanTakTeratur = $this->setIntCurrencyFormat($this->penghasilan_tak_teratur);

        return $gajiPokokSetahun + $tunjanganPPh + $tunjanganLain + $honorium + $premiAsuransi + $naturaObyek + $penghasilanTakTeratur;;
    }
    
    public function penghasilanBrutto(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->setLocaleCurrencyFormat($this->hitungPenghasilanBrutto()),
        );
    }

    public function hitungTotalPengurangan(){
        $iuranPensiun = $this->setIntCurrencyFormat($this->iuran_pensiun);
        $biayaJabatanSatu = $this->setIntCurrencyFormat($this->biaya_jabatan_satu);
        $biayaJabatanDua = $this->setIntCurrencyFormat($this->biaya_jabatan_dua);

        return $iuranPensiun + $biayaJabatanSatu + $biayaJabatanDua;
    }

    public function totalPengurangan(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->setLocaleCurrencyFormat($this->hitungTotalPengurangan()),
        );
    }

    public function hitungPenghasilanNetto(){
        return $this->hitungPenghasilanBrutto() - $this->hitungTotalPengurangan();
    }

    public function penghasilanNetto(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->setLocaleCurrencyFormat($this->hitungPenghasilanNetto()),
        );
    }

    protected function pegawaiNama(): Attribute{
        return Attribute::make(
            get: fn() => Pegawai::find($this->pegawai_id)->nama,
        );
    }

    protected function tahun():Attribute
    {
        return Attribute::make(
            get: fn($value) => ($value),
        );
    }

    protected function namaPenandatangan():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:Perusahaan::find(1)->nama_penandatangan,
        );
    }

    protected function npwpPenandatangan():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:Perusahaan::find(1)->npwp_penandatangan,
        );
    }

    protected function awalTerimaGaji():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:PenghasilanPegawai::where('pegawai_id', $this->pegawai_id)->first()->bulan_awal_terima_gaji,
        );
    }

    protected function akhirTerimaGaji():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:PenghasilanPegawai::where('pegawai_id', $this->pegawai_id)->first()->bulan_akhir_terima_gaji,
        );
    }

    public function statusPtkp(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => (!is_null($value))?value:StatusPtkp::find(Pegawai::find($this->pegawai_id)->status_ptkp_id)->kode,
            set: fn ($value) => $value,
        );
    }

    protected function tarifPtkp():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?value:StatusPtkp::find(Pegawai::find($this->pegawai_id)->status_ptkp_id)->tarif_ptkp,
        );
    }

    protected function hitungPenghasilanKenaPajak()
    {
        $tarifPtkp = $this->setIntCurrencyFormat($this->tarifPtkp);
        $penghasilanKenaPajak = $this->hitungPenghasilanNetto() - $tarifPtkp;

        return ($penghasilanKenaPajak>=0)?$penghasilanKenaPajak:0;
    }

    protected function penghasilanKenaPajak(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->setLocaleCurrencyFormat($this->hitungPenghasilanKenaPajak()),
            set: fn ($value) => $this->setIntCurrencyFormat($value),
        );
    }

    protected function hitungPphTerhutang(): float
    {
        $penghasilanKenaPajak = $this->hitungPenghasilanKenaPajak();
        $tarifPkp = TarifPkp::select('index', 'batas_min', 'persen_tarif')->where('gunakan', true)->orderby('index')->get();
        
        $pphTerutang = 0.00;

        foreach($tarifPkp as $tarif){ 
            $batasMin = $this->setIntCurrencyFormat($tarif->batas_min);
            $persenTarif = $this->setIntCurrencyFormat($tarif->persen_tarif);
            if(($penghasilanKenaPajak-=$batasMin)>$batasMin){
                $pphTerutang += ($penghasilanKenaPajak*$persenTarif)/100;
            }
        }
        
        return $pphTerutang;
    }

    public function pphTerutang(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->setLocaleCurrencyFormat($this->hitungPphTerhutang()),
            set: fn ($value) => $this->setIntCurrencyFormat($value),
        );
    }
    
    protected function persenPkp1():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:0.00,
        );
    }

    protected function batasPkp1():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:0.00,
        );
    }

    protected function persenPkp2():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:0.00,
        );
    }

    protected function batasPkp2():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:0.00,
        );
    }

    protected function persenPkp3():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:0.00,
        );
    }

    protected function batasPkp3():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:0.00,
        );
    }

    protected function persenPkp4():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:0.00,
        );
    }

    protected function batasPkp4():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:0.00,
        );
    }

    protected function persenPkp5():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:0.00,
        );
    }

    protected function batasPkp5():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:0.00,
        );
    }

    protected function gajiPokokSetahun():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:PenghasilanPegawai::where('pegawai_id', $this->pegawai_id)->first()->gaji_pokok_setahun,
        );
    }

    protected function tunjanganPph():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:PenghasilanPegawai::where('pegawai_id', $this->pegawai_id)->first()->tunjangan_pph,
        );
    }

    protected function tunjanganLain():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:PenghasilanPegawai::where('pegawai_id', $this->pegawai_id)->first()->tunjangan_lain,
        );
    }

    protected function honorium():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:PenghasilanPegawai::where('pegawai_id', $this->pegawai_id)->first()->honorium,
        );
    }

    protected function premiAsuransi():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:PenghasilanPegawai::where('pegawai_id', $this->pegawai_id)->first()->honorium,
        );
    }

    protected function naturaObyek():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:PenghasilanPegawai::where('pegawai_id', $this->pegawai_id)->first()->natura_obyek,
        );
    }

    protected function penghasilanTakTeratur():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:PenghasilanPegawai::where('pegawai_id', $this->pegawai_id)->first()->penghasilan_tak_teratur,
        );
    }
    
    protected function iuranPensiun():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:0.00,
        );
    }
    
    protected function biayaJabatanSatu():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:PenghasilanPegawai::where('pegawai_id', $this->pegawai_id)->first()->biaya_jabatan_satu,
        );
    }

    protected function biayaJabatanDua():Attribute
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:PenghasilanPegawai::where('pegawai_id', $this->pegawai_id)->first()->biaya_jabatan_dua,
        );
    }

    protected function penghasilanNetto0():Attribute 
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:0.00,
        );
    }

    protected function pph0():Attribute 
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:0.00,
        );
    }

    protected function pph1():Attribute 
    {
        return Attribute::make(
            get: fn($value) => (!is_null($value))?$value:0.00,
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
