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
      'tunjangan_pasangan' => $row[7],
      'tunjangan_anak' => $row[8],
      'tunjangan_umum' => $row[9],
      'tunjangan_ta_umum' => $row[10],
      'tunjangan_papua' => $row[11],
      'tunjangan_terpencil' => $row[12],
      'tunjangan_struktur' => $row[13],
      'tunjangan_fungsi' => $row[14],
      'tunjangan_lain' => $row[15],
      'tunjangan_beras' => $row[16],
      'iwp' => $row[17],
      'bpjs' => $row[18],
      'potongan_pph' => $row[19],
      'sewa_rumah' => $row[20],
      'tunggakan' => $row[21],
      'utang' => $row[22],
      'potongan_lain' => $row[23],
      'taperum' => $row[24],
      'kode' => $row[25],
    ]);
  }
}
