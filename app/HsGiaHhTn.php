<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HsGiaHhTn extends Model
{
    protected $table = 'hsgiahhtn';
    protected $filltable = [
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
        'mahuyen'
    ];
}
