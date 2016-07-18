<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhomTn extends Model
{
    protected $table = 'nhomtn';
    protected $filltable = [
        'id',
        'manhom',
        'tennhom',
        'theodoi'
    ];
}
