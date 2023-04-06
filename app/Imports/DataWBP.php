<?php

namespace App\Imports;

use App\BackupWBP;
use Maatwebsite\Excel\Concerns\ToModel;

class DataWBP implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new BackupWBP([
      'no_induk' => $row[1],
      'nama' => $row[2],
      'kejahatan' => $row[3],
      'tanggal_ditahan' => $row[4],
      'tanggal_ekspirasi' => $row[5],
      'pidana' => $row[6],
      'kamar' => $row[7],
      'kegiatan_pembinaan' => $row[8],
      'skor_pembinaan' => $row[9],
      'status_wbp' =>  $row[10],
      'nik_wbp' =>  $row[11],
      'status' => $row[12],
      'button' => $row[13],
    ]);
  }
}
