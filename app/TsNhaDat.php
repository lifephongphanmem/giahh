<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TsNhaDat extends Model
{
    protected $table = 'tsnhadat';
    protected $fillable = [
        'id',
        'mahuyen',
        'ngaynhap',
        'nam',
        'thang',
        'quy',
        'mahs'
    ];
}
