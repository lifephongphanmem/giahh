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
        'masopnhom'
    ];
}
