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
          'kamar' => $row[3],
          'kejahatan' => $row[4],
          'status_wbp' => $row[5],
          'button' => $row[6],
          'status' => $row[7], 
        ]);
    }
}
