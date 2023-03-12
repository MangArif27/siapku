<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class gaji extends Model
{
  protected $table = 'data_gaji';
  protected $fillable = ['nip','rekening_gaji','nama_rekening','gaji_pokok','penerimaan_bulan','penerimaan_tahun','potongan_dw','potongan_bank','potongan_koperasi','dana_sosial','sumbangan_olahraga','rumah_dinas','potongan_bank2','pmi','harkop','adm_bank','kode'];
}
