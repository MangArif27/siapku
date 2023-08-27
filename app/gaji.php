<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class gaji extends Model
{
  protected $table = 'data_gaji';
  protected $fillable = [
    'nip', 'rekening_gaji', 'nama_rekening', 'gaji_pokok', 'penerimaan_bulan', 'penerimaan_tahun', 'tunjangan_pasangan', 'tunjangan_anak', 'tunjangan_umum', 'tunjangan_ta_umum', 'tunjangan_papua', 'tunjangan_terpencil', 'tunjangan_struktur', 'tunjangan_fungsi', 'tunjangan_lain',
    'tunjangan_beras', 'iwp', 'bpjs', 'potongan_pph', 'sewa_rumah', 'tunggakan', 'utang', 'potongan_lain', 'taperum', 'kode'
  ];
}
