<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaThueTbCt extends Model
{
    protected $table = 'giathuetbct';
    protected $filltable = [
        'id',
        'maloai',
        'maso',
        'tenhieu',
        'thongsokt',
        'dungtich',
        'nuocsx',
        'giaht',
        'giamoi',
        'mahs'
    ];
}
