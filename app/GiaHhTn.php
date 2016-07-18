<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaHhTn extends Model
{
    protected $table = 'giahhtn';
    protected $filltable = [
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
