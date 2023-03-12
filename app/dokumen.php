<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dokumen extends Model
{
  protected $table = 'dokumen';
  protected $fillable = ['nama_file','link'];
}
