<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PNhomxnk extends Model
{
    protected $table = 'pnhomxnk';
    protected $filltable = [
        'id',
        'manhom',
        'mapnhom',
        'tenpnhom',
        'masopnhom',
        'anhien',
        'sapxep',
        'theodoi'
    ];
}
