<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaThueTbCtDf extends Model
{
    protected $table = 'giathuetbctdf';
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
        'mahuyen'
    ];
}
