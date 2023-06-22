<?php

namespace Database\Seeders;

use App\Models\ObjekPajak;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ObjekPajakSeeder extends Seeder
{
    /**
    * Run the database seeds.
    */
    public function run(): void
    {
        $refObjekPajak = [
            [
                "kode" => "21-100-01",
                "jenis" => "Upah Pegawai Tetap"
            ],
            [
                "kode" => "21-100-02",
                "jenis" => "Upah Penerima Pensiun Berkala"
            ],
            [
                "kode" => "21-100-03",
                "jenis" => "Upah Pegawai Tidak Tetap atau Tenaga Kerja Lepas"
            ],
            [
                "kode" => "21-100-04",
                "jenis" => "Imbalan Kepada Distributor Multi Level Marketing (MLM)"
            ],
            [
                "kode" => "21-100-05",
                "jenis" => "Imbalan Kepada Petugas Dinas Luar Asuransi"
            ],
            [
                "kode" => "21-100-06",
                "jenis" => "Imbalan Kepada Penjaja Barang Dagangan"
            ],
            [
                "kode" => "21-100-07",
                "jenis" => "Imbalan Kepada Tenaga Ahli"
            ],
            [
                "kode" => "21-100-08",
                "jenis" => "Imbalan Kepada Bukan Pegawai yang Menerima Penghasilan yang Bersifat Berkesinambungan"
            ],
            [
                "kode" => "21-100-09",
                "jenis" => "Imbalan Kepada Bukan Pegawai yang Menerima Penghasilan yang Tidak Bersifat Berkesinambungan"
            ],
            [
                "kode" => "21-100-10",
                "jenis" => "Honorarium atau Imbalan Kepada Anggota Dewan Komisaris atau Dewan Pengawas yang tidak Merangkap sebagai Pegawai Tetap"
            ],
            [
                "kode" => "21-100-11",
                "jenis" => "Jasa Produksi, Tantiem, Bonus atau Imbalan Kepada Mantan Pegawai"
            ],
            [
                "kode" => "21-100-12",
                "jenis" => "Penarikan Dana Pensiun oleh Pegawai"
            ],
            [
                "kode" => "21-100-13",
                "jenis" => "Imbalan Kepada Peserta Kegiatan"
            ],
            [
                "kode" => "21-100-99",
                "jenis" => "Objek PPh Pasal 21 Tidak Final Lainnya"
            ],
            [
                "kode" => "21-401-01",
                "jenis" => "Uang Pesangon yang Dibayarkan Sekaligus"
            ],
            [
                "kode" => "21-401-02",
                "jenis" => "Uang Manfaat Pensiun, Tunjangan Hari Tua, atau Jaminan Hari Tua yang Dibayarkan Sekaligus"
            ],
            [
                "kode" => "21-402-01",
                "jenis" => "Honor atau Imbalan Lain yang Dibebankan kepada APBN atau APBD yang Diterima oleh PNS, Anggota TNI/POLRI, Pejabat Negara dan Pensiunannya"
            ],
            [
                "kode" => "21-499-99",
                "jenis" => "Objek PPh Pasal 21 Final Lainnya"
            ],
            [
                "kode" => "27-100-99",
                "jenis" => "Imbalan sehubungan dengan jasa, pekerjaan dan kegiatan, hadiah dan penghargaan, pensiun dan pembayaran berkala lainnya yang dipotong PPh Pasal 26"
                ]
            ];

            foreach($refObjekPajak as $objekPajak){
                ObjekPajak::firstOrCreate([
                    'kode' => $objekPajak['kode'],
                    'jenis' => $objekPajak['jenis'],
                ]);
            }
        }
    }
