<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TsOtoKhac extends Model
{
    protected $table = 'tsotokhac';
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
