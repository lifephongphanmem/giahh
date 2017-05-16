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
        'mahuyen',
        'trangthai',
        'hoso',
        'filedk',
        'filedk1',
        'filedk2',
        'filedk3',
        'filedk4'
    ];
}
