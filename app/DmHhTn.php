<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DmHhTn extends Model
{
    protected $table = 'dmhhtn';
    protected $filltable = [
        'id',
        'mahh',
        'masopnhom',
        'masp',
        'tenhh',
        'dacdiemkt',
        'dvt',
        'nsx',
        'gc',
        'thoidiem',
        'sapxep',
        'theodoi'
    ];
}
