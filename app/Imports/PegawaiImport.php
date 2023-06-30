<?php

namespace App\Imports;

use App\Models\Negara;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\StatusPtkp;
use Illuminate\Support\Str;
use App\Models\KabupatenKota;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class PegawaiImport implements ToModel, WithHeadingRow, WithChunkReading, SkipsOnFailure
{
    use Importable, SkipsFailures;
    
    public function __construct()
    {
        // $this->StatusPtkp::all(['id', 'kode'])->pluck('id','kode');
        // $this->KabupatenKota::all(['id', 'nama'])->pluck('id','nama');
        // $this->Jabatan::all(['id', 'nama_jabatan'])->pluck('id','nama_jabatan');
        // $this->Negara::all(['id', 'nama'])->pluck('id','nama');
    }
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $statusPtkp = StatusPtkp::where('kode',$row['status_ptkp'])->first();
        $kabupatenKota = KabupatenKota::where('nama', 'like', '%'.$row['kabupaten_kota'].'%')->first();
        $jabatan = Jabatan::where('nama_jabatan', Str::of($row['jabatan'])->title())->first();
        $negara = Negara::where('nama', $row['negara'])->first();

        return new Pegawai([
            'npwp'                  => (($row['npwp'])?$row['npwp']:'0000000000000000'),
            'nama'                  => $row['nama'],
            'jenis_kelamin'         => Str::lower($row['jenis_kelamin']),
            'status_ptkp_id'        => $statusPtkp->id,
            'status_pegawai'        => Str::lower($row['status_pegawai']),
            'alamat'                => $row['alamat'],
            'keterangan_evaluasi'   => Str::of($row['keterangan_evaluasi'])
                                        ->lower()
                                        ->replace(' ',''),
            'kabupaten_kota_id'     => $kabupatenKota->id,
            'jabatan_id'            => $jabatan->id,       
            'negara_id'             => $negara->id,    
        ]);
    }

    public function chunkSize(): int
    {
        return 5000;
    }
}
