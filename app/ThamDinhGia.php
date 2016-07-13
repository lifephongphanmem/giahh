<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThamDinhGia extends Model
{
    protected $table = 'thamdinhgia';
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
