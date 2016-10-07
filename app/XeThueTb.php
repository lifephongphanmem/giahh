<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class XeThueTb extends Model
{
    protected $table = 'xethuetb';
    protected $filltable = [
        'id',
        'maloai',
        'maso',
        'tenhieu',
        'thongsokt',
        'dungtich',
        'nuocsx',
        'gia',
        'ghichu'
    ];
}
