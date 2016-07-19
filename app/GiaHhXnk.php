<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaHhXnk extends Model
{
    protected $table = 'giahhxnk';
    protected $filltable = [
        'id',
        'mahh',
        'masoloai',
        'maloaihh',
        'maloaigia',
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
