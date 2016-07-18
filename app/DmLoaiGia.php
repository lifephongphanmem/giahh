<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmLoaiGia extends Model
{
    protected $table = 'dmloaigia';
    protected $filltable = [
        'id',
        'maloaigia',
        'tenloaigia',
        'sapxep',
        'gc'
    ];
}
