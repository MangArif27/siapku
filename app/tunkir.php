<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class tunkir extends Model
{
  protected $table = 'data_tunkir';
  protected $fillable = ['nip', 'rekening_tunkir', 'nama_rekening', 'tunker', 'penerimaan_bulan', 'penerimaan_tahun', 'potongan_atribut', 'potongan_arisan_dwp', 'potongan_arisan_pipas', 'potongan_bjb', 'potongan_simpanan_wajib', 'potongan_koperasi', 'kode'];
}
