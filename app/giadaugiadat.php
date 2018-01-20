<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class giadaugiadat extends Model
{
    protected $table = 'giadaugiadat';
    protected $fillable = [
        'id',
        'mahs',
        'maso',
        'tenthuadat',
        'ngaynhap',
        'giagoc',
        'giadaugia',
        'trangthai',
        'thang',
        'quy',
        'nam',
        'mahuyen'
    ];
}
