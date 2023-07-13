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
      'potongan_atribut' => $row[7],
      'potongan_arisan_dwp' => $row[8],
      'potongan_arisan_pipas' => $row[9],
      'potongan_bjb' => $row[10],
      'potongan_simpanan_wajib' => $row[11],
      'potongan_koperasi' => $row[12],
      'kode' => $row[13],
    ]);
  }
}
