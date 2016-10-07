<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaThueTb extends Model
{
    protected $table = 'giathuetb';
    protected $filltable = [
        'id',
        'maloai',
        'mahs',
        'soqd',
        'ngaynhap',
        'thang',
        'quy',
        'nam',
        'trangthai',
        'mahs'
    ];
}
