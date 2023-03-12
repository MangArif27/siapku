<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BackupWBP extends Model
{
    protected $table = 'data_wbp';
    protected $fillable = ['no_induk','nama', 'kamar', 'kejahatan', 'status_wbp', 'button', 'status'];
}
