<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmLoaiHh extends Model
{
    protected $table = 'dmloaihh';
    protected $filltable = [
        'id',
        'maloaihh',
        'tenloaihh',
        'gc'
    ];
}
