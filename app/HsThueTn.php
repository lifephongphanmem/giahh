<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HsThueTn extends Model
{
    protected $table = 'hsthuetn';
    protected $fillable = [
        'id',
        'mahs',
        'mathoidiem',
        'thitruong',
        'tgnhap',
        'maloaigia',
        'maloaihh',
        'phanloai',
        'nam',
        'thang',
        'quy',
        'mahuyen',
        'trangthai',
        'hoso',
        'filedk',
        'filedk1',
        'filedk2',
        'filedk3',
        'filedk4'
    ];
}
