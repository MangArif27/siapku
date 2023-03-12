<?php

namespace App\Imports;

use App\tunkir;
use Maatwebsite\Excel\Concerns\ToModel;

class upload_tunkir implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new tunkir([
          'nip' => $row[1],
          'rekening_tunkir' => $row[2],
          'nama_rekening' => $row[3],
          'tunker' => $row[4],
          'penerimaan_bulan' => $row[5],
          'penerimaan_tahun' => $row[6],
          'potongan_dw' => $row[7],
          'potongan_koperasi' => $row[8],
          'dana_sosial' => $row[9],
          'sumbangan_olahraga' => $row[10],
          'potongan_bank' => $row[11],
          'potongan_absen' => $row[12],
          'potongan_jurnal' => $row[13],
          'kode' => $row[14],
        ]);
    }
}
