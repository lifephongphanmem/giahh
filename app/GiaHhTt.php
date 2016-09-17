<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaHhTt extends Model
{
    protected $table = 'giahhtt';
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
