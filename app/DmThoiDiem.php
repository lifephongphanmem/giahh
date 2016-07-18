<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmThoiDiem extends Model
{
    protected $table = 'dmthoidiem';
    protected $filltable = [
        'id',
        'mathoidiem',
        'tenthoidiem',
        'tungay',
        'denngay',
        'nhom',
        'plbc'
    ];
}
