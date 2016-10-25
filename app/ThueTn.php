<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThueTn extends Model
{
    protected $table = 'thuetn';
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
