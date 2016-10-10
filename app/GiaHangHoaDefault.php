<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaHangHoaDefault extends Model
{
    protected $table = 'giahanghoadefault';
    protected $fillable = [
        'id',
        'mahh',
        'masopnhom',
        'maloaihh',
        'maloaigiamaloaigia',
        'thitruong',
        'thoigian',
        'mathoidiem',
        'giatu',
        'giaden',
        'soluong',
        'nguontin',
        'mahuyen',
        'gc'
    ];
}
