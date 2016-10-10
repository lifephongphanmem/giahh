<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaHangHoa extends Model
{
    protected $table = 'giahanghoa';
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
        'mahs',
        'gc'
    ];
}
