<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HsGiaHhTt extends Model
{
    protected $table = 'hsgiahhtt';
    protected $fillable = [
        'id',
        'mahs',
        'mathoidiem',
        'thitruong',
        'tgnhap',
        'maloaigia',
        'maloaihh',
        'nam',
        'thang',
        'quy',
        'mahuyen',
        'trangthai',
        'phanloai',
        'filedk',
        'filedk1',
        'filedk2',
        'filedk3',
        'filedk4'
    ];
}
