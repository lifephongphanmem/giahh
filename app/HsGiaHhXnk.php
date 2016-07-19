<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HsGiaHhXnk extends Model
{
    protected $table = 'hsgiahhxnk';
    protected $filltable = [
        'id',
        'mathoidiem',
        'thitruong',
        'tgnhap',
        'maloaigia',
        'mahs',
        'nam',
        'thang',
        'quy',
        'mahuyen'
    ];
}
