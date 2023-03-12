<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class galery extends Model
{
  protected $table = 'galery';
  protected $fillable = ['kode','nama_barang','harga','file'];
}
