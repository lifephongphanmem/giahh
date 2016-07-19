<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhomxnk extends Model
{
    protected $table = 'nhomxnk';
    protected $filltable = [
        'id',
        'manhom',
        'tennhom',
        'sapxep',
        'theodoi'
    ];
}
