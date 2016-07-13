<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralConfigs extends Model
{
    protected $table = 'general-configs';
    protected $filltable = [
        'id',
        'madv',
        'donvi',
        'diachi',
        'thutruong',
        'ketoan',
        'nguoilapbieu',
        'namhethong'
    ];
}
