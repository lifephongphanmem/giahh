<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PNhomTn extends Model
{
    protected $table = 'pnhomtn';
    protected $filltable = [
        'id',
        'manhom',
        'mapnhom',
        'tenpnhom',
        'masopnhom',
        'theodoi',
        'sapxep'
    ];
}
