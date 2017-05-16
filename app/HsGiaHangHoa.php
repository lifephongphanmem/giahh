<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HsGiaHangHoa extends Model
{
    protected $table = 'hsgiahanghoa';
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
        'masopnhom',
        'hoso',
        'masopnhom',
        'filedk',
        'filedk1',
        'filedk2',
        'filedk3',
        'filedk4'
    ];
}
