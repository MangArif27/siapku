<?php

namespace App\Imports;

use App\gaji;
use Maatwebsite\Excel\Concerns\ToModel;

class upload_gaji implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new gaji([
          'nip' => $row[1],
          'rekening_gaji' => $row[2],
          'nama_rekening' => $row[3],
          'gaji_pokok' => $row[4],
          'penerimaan_bulan' => $row[5],
          'penerimaan_tahun' => $row[6],
          'potongan_dw' => $row[7],
          'potongan_bank' => $row[8],
          'potongan_koperasi' => $row[9],
          'dana_sosial' => $row[10],
          'sumbangan_olahraga' => $row[11],
          'rumah_dinas' => $row[12],
          'potongan_bank2' => $row[13],
          'pmi' => $row[14],
          'harkop' => $row[15],
          'adm_bank' => $row[16],
          'kode' => $row[17],
        ]);
    }
}
