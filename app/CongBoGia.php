<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CongBoGia extends Model
{
    protected $table = 'congbogia';
    protected $filltable = [
        'id',
        'mats',
        'tents',
        'dacdiempl',
        'thongsokt',
        'nguongoc',
        'dvt',
        'sl',
        'giadenghi',
        'giatritstd',
        'gc',
        'mahs'
    ];
}
