<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class tunkir extends Model
{
  protected $table = 'data_tunkir';
  protected $fillable = ['nip','rekening_tunkir','nama_rekening','tunker','penerimaan_bulan','penerimaan_tahun','potongan_dw','potongan_koperasi','dana_sosial','sumbangan_olahraga','potongan_bank','potongan_absen','potongan_jurnal','kode'];
}
