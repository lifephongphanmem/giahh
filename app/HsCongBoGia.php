<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HsCongBoGia extends Model
{
    protected $table = 'hscongbogia';
    protected $filltable = [
        'id',
        'sohs',
        'plhs',
        'sovbdn',
        'sotbkl',
        'vontx',
        'vondt',
        'nguonvon',
        'ngaynhap',
        'donvidn',
        'diadiemcongbo',
        'thang',
        'quy',
        'nam',
        'mahuyen',
        'mahs',
        'trangthai',
        'phanloai',
        'filedk',
        'filedk1',
        'filedk2',
        'filedk3',
        'filedk4'
    ];
}
