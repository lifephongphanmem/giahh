<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaHhTnDefault extends Model
{
    protected $table = 'giahhtndefault';
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
        'mahuyen',
        'gc'
    ];
}
